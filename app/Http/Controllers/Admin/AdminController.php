<?php
namespace App\Http\Controllers\Admin;

// JWT Framework
use Jose\Component\Core\AlgorithmManager;
use Jose\Component\Signature\Algorithm\ES256;
use Jose\Component\Signature\Algorithm\HS256;
use Jose\Component\Core\JWK;
use Jose\Component\Signature\JWSBuilder;
use Jose\Component\Signature\Serializer\CompactSerializer;
use Jose\Component\KeyManagement\JWKFactory;
use Jose\Component\Signature\JWSVerifierFactory;
use Jose\Component\Signature\Serializer\JWSSerializerManager;
use Jose\Component\Signature\JWSVerifier;
use Jose\Component\Signature\JWSLoader;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Candidates;
use App\Models\Election;
use App\Models\Position;
use App\Models\Department;
use App\Models\TableKey;
use App\Models\Application_Form;
use App\Models\VoteHistory;
use App\Models\VoteTransaction;
use App\Models\Winner;
use Illuminate\Support\Facades\DB;
use phpseclib3\Crypt\EC;
use Illuminate\Support\Str;

// jsonwebtoken
class AdminController extends Controller
{
    //


    function __construct() {
        $this->candidates = new Candidates;
        $this->election = new Election;
        $this->key = new TableKey;
        $this->winner = new Winner;
    }


    public function home()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::where('candidate_role', 'student')
                       ->orWhere('candidate_role', 'professor')
                       ->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.users.index', compact('users'));
    }

    public function positions()
    {
        $positions = Position::groupBy('department')->orderBy('updated_at', 'desc')->paginate(5);
        
        return view('admin.positions.index', compact('positions'));
    }

    public function add_position()
    {
        $departments = Department::all();
        return view('admin.positions.add_position', compact('departments'));
    }

    public function view_position($department) {
        // print($department);
        $positions = Position::where('department', $department)->paginate(5);
        return view('admin.positions.view_position', compact('positions'));
        
    }

    public function store_position(Request $request)
    {

        $department = [
            'department' => $request->department,

        ];

        foreach($request->inputs as $key => $value) {
            Position::create($value+$department);
        }
        
        return redirect('positions/add_position')
        ->with('success', 'Position added successfuly!');

        // return view('admin.positions.add_position');
    }

    public function election()
    {
        $elections = Election::orderBy('updated_at', 'desc')->paginate(4);
        return view('admin.election.index', compact('elections'));
    }

    public function result()
    {

        $winners = Winner::groupBy('department')->get()->paginate(5);
        $election_id = collect($winners[0])->get('election_id');
        
        $winners = Election::where('id', $election_id)->get()->paginate(5);

        return view('admin.result.index', compact('winners'));
    }

    public function result_winners($department)
    {

        $winners = Winner::where('department', $department)->get()->paginate(5);
        return view('admin.result.result-winners', compact('winners'));
    }

    public function student_result()
    {
        $result = VoteTransaction::count();
        $election_department = Election::where('candidate_role', "student")->where('status', "Expired")->get();
        return view('admin.result.student', compact('election_department'));
    }

    public function student_get_result(Request $request)
    {
        $election_id = $request->election_id;
        // echo $election_id;

        $student_result = VoteHistory::select('position', 'candidate_name', 'election_id', 'department')
                                    ->where('election_id', $election_id)
                                    ->selectRaw('count(candidate_id_number) as Total_Votes')
                                    ->groupBy('candidate_id_number')
                                    ->orderBy('position')
                                    ->get();

        $winners = VoteHistory::select('*')
                                ->selectRaw('count(candidate_id_number) as Total_Votes')
                                ->where('election_id', $election_id)
                                ->groupBy('candidate_id_number')
                                ->orderBy('Total_Votes', 'desc')
                                ->limit(2)
                                ->get();

                                    
        // return view('admin.result.student', compact('student_result'));
        return view('admin.result.student-result')
                        ->with( compact('student_result', 'winners'))
                        ->with('success', 'Candidate approved application!');

    }


    public function student_winner(Request $request) {

        $election_id  = $request->election_id;

        if (DB::table('winners')->where('election_id', $election_id)->exists()) {
            // exist

            return redirect('/result/student')
            ->with('error', 'Candidates already on the list of winners!');
   
        }
        else
        {


        $winners = VoteHistory::select('*')
                                ->selectRaw('count(candidate_id_number) as Total_Votes')
                                ->where('election_id', $election_id)
                                ->groupBy('candidate_id_number')
                                ->orderBy('Total_Votes', 'desc')
                                ->limit(2)
                                ->get();

        $length = $winners->count();        

        for ($i = 0; $i < $length; $i++) {

            $election_id = collect($winners[$i])->get('election_id');
            $candidate_id_number = collect($winners[$i])->get('candidate_id_number');
            $candidate_name = collect($winners[$i])->get('candidate_name');
            $position = collect($winners[$i])->get('position');
            $department = collect($winners[$i])->get('department');
            $candidate_role = collect($winners[$i])->get('candidate_role');
            

            $add_winner = [
                
                'election_id' => $election_id,
                'candidate_id_number' => $candidate_id_number,
                'candidate_name' => $candidate_name,
                'position' => $position,
                'department' => $department,
                'candidate_role' => $candidate_role,
                
            ];
            
            
            $this->winner->add_winner($add_winner);
             
        }    
        
        return redirect('/result/student')
        ->with('success', 'Candidates added on the list of winners!');
    }
    }


    public function professor_result()
    {
        $result = VoteTransaction::count();
        $election_department = Election::where('candidate_role', "professor")->where('status', "Expired")->get();
        return view('admin.result.professor', compact('election_department'));
    }

    public function candidates()
    {
        $status = "Pending";
        // $candidates = $this->candidates->getCandidateList();
        // where('candidate_role', 'Student')-> 
        $app_forms = Application_Form::where('status', $status)->orderBy('created_at', 'asc')->paginate(5);
        $candidates = Candidates::orderBy('updated_at', 'desc')->paginate(4);
        return view('admin.candidates.index', compact('candidates', 'app_forms'));
    }

    public function review_candidate($id_number)
    {
        $app_forms = Application_Form::where('id_number', $id_number)->get();
        return view('admin.candidates.update_status', compact('app_forms'));
    }

    public function approve_status(Request $request)
    {
        $id_number = $request->id_number;
        $status = "Approved";        
        
        Application_Form::where('id_number', $id_number)
                         ->update(['status' => $status]);

        $status = "Pending";
        $app_forms = Application_Form::where('status', $status)->groupBy('department')->orderBy('updated_at', 'desc')->paginate(5);
        return redirect('/candidates')
        ->with( compact('app_forms'))
        ->with('approved', 'Candidate approved application!');
    }

    public function denied_status(Request $request)
    {
        $id_number = $request->id_number;
        $status = "Denied";        
        
        Application_Form::where('id_number', $id_number)
                         ->update(['status' => $status]);

        $status = "Pending";
        $app_forms = Application_Form::where('status', $status)->groupBy('department')->orderBy('updated_at', 'desc')->paginate(5);
        return redirect('/candidates')
        ->with( compact('app_forms'))
        ->with('denied', 'Candidate denied application!');
    }

    public function approve_application()
    {
        $status = "Approved";
        $app_forms = Application_Form::where('status', $status)->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.candidates.approve_status', compact('app_forms'));
    }

    public function denied_application()
    {
        $status = "Denied";
        $app_forms = Application_Form::where('status', $status)->orderBy('updated_at', 'desc')->paginate(5);
        return view('admin.candidates.denied_status', compact('app_forms'));
    }

    public function search_candidates()
    {
        // $search_candidates = User::all()->where('id_number', 'K1143179');
        return view('admin.candidates.search_candidates');

    }

    public function add_candidates(Request $request) 
    {


        $request->validate([
            'id_number' => ['required', 'string', 'max:255', 'exists:'.User::class, 'unique:'.Candidates::class ],
        ]);

        $id_number = $request->id_number;
        
        $search_candidates = User::where('id_number', $id_number)->get();
        $candidate_role = collect($search_candidates[0])->get('candidate_role');
        $department = collect($search_candidates[0])->get('department');
        $positions = Position::where('department', $department)->get();

        return view('admin.candidates.add_candidates', compact('search_candidates', 'positions'));

    }


    public function store_candidate(Request $request)
    {

        $candidates = Candidates::all();
        $id_number = $request->id_number;
        $department = $request->department;
        $candidate_role = $request->candidate_role;

        if (DB::table('elections')->where('department', $department)->where('candidate_role', $candidate_role)->exists()) {
            // exist
            if (DB::table('candidates')->where('id_number', $id_number)->exists()) {

                return redirect('candidates/search_candidates')
                ->with('error', 'Candidate already added!');
            }
            else
            {
            
            $collection = Election::where('department', $department)->where('candidate_role', $candidate_role)->get('id');
            $election_id = collect($collection[0])->get('id');
            // print($collection);
    
            if ($request->candidate_type == "Independent") {
                $partylist = "None";
            }
            else
            {
                $partylist = $request->partylist;
            }
    
            $store_candidate = [
                
                'id_number' => $request->id_number,
                'name' => $request->name,
                'department' => $request->department,
                'position' => $request->position,
                'candidate_role' => $request->candidate_role,
                'candidate_type' => $request->candidate_type,
                'partylist' => $partylist,
                'election_id' => $election_id,
                
            ];
    
            
            $this->candidates->store_candidate($store_candidate);
            return redirect('candidates/search_candidates')
                    ->with( compact('candidates'))
                    ->with('success', 'Candidate added successfuly!');
            }
        }
        else
        {
            // does not exist
            return redirect('candidates/search_candidates')
            ->with('error', 'No election for '.$department.'.');
        }

    }


    public function filling_of_candidacy() {
        return view('admin.election.filling_candidacy');
    }



    public function set_election() {
        return view('admin.election.set_election');
    }



    public function add_election(Request $request) {

        // print($request->election_title."<br>".$request->department."<br>".$request->candidate_role."<br>".$request->election_start_date." ".$request->election_start_time."<br>".$request->election_end_date." ".$request->election_end_time);
        $department = $request->department;
        $candidate_role = $request->candidate_role;

        if(DB::table('elections')->where('department', $department)->where('candidate_role', $candidate_role)->exists()) {
            return redirect('election/set-election')
            ->with('error', 'The selected department is already exist!');
        }

        else {

            
            $add_election = [
                
                'election_title' => $request->election_title,
                'department' => $request->department,
                'candidate_role' => $request->candidate_role,
                'election_start_date' => $request->election_start_date." ".$request->election_start_time,
                'election_end_date' => $request->election_end_date." ".$request->election_end_time
                
            ];
            
            
            $this->election->add_election($add_election);
            return redirect('election/set-election')
            ->with('success', 'Election added successfuly!');
            
        }
    }


    public function gen_keys() {

        $voters_info = DB::table('vote_histories')
        ->select('id_number', 'name', 'department', 'election_id')
        ->where('id_number', "K1143179")
        ->groupBy('id_number')
        ->get();


        $selected_candidate = DB::table('vote_histories')
        ->select('candidate_id_number', 'candidate_name', 'position' , 'candidate_role')
        ->where('id_number', "K1143179")
        ->get();


    // Payload
    $payload = ([
        'iat' => 1680715471,
        // 'exp' => 1680719071,
        'iss' => env('APP_NAME'),
        'voters_info' => $voters_info,
        'selected_candidate' => $selected_candidate,
    ]);
    $data = json_encode($payload);


    // calling pub and pri to path
    $private_key = openssl_pkey_get_private(file_get_contents(storage_path('keys\private.pem')));
    $public_key = openssl_pkey_get_public(file_get_contents(storage_path('keys\public.pem')));
    // $msg = "Hello";

    $jwt = JWT::encode($payload, $private_key, 'ES256');
         
    $decoded = JWT::decode($jwt, new Key($public_key, 'ES256'));
    $dec = json_encode($decoded);
    
    openssl_sign($data, $signature, $private_key, env('OPENSSL_ALGO'));
    $result = openssl_verify($data, $signature, $public_key, env('OPENSSL_ALGO'));

    if ($result === 1) {
        $result = env('RESULT_TRUE');
    }
    else if ($result === 0) {
        $result = env('RESULT_FALSE');
    }
    else
    {
        $result = env('RESULT_FALSE');
    }
        return view('test', compact('dec', 'jwt','result', 'signature'));

    }


}


