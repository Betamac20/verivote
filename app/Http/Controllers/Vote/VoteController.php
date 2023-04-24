<?php

namespace App\Http\Controllers\Vote;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VoteHistory;
use App\Models\VoteTransaction;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class VoteController extends Controller
{

    function __construct() {
        $this->vote = new VoteHistory;
        $this->add_vote = new VoteTransaction;
    }

    public function vote(Request $request){
        // print('hello');

       $department = $request->department;
       $candidate_role = $request->candidate_role;
       $id_number = $request->id_number;

       $add_votehistory = [
                
        'id_number' => $request->id_number,
        'name' => $request->name,
        'position' => $request->position,
        'candidate_name' => $request->candidate_name,
        'candidate_id_number' => $request->candidate_id_number,
        'election_id' => $request->election_id,
        'department' => $request->department,
        'candidate_role' => $request->candidate_role,
        
        ];

       $this->vote->add_votehistory($add_votehistory);

       return redirect('vote-now/position/'.$department.'/'.$id_number.'/'.$candidate_role)
       ->with('success', 'Successfuly voted!');
        // print($id_number."<br>".$name."<br>".$position."<br>".$candidate_name."<br>".$candidate_id_number."<br>".$election_id."<br>".$department."<br>".$candidate_role);

    }

    public function store_vote(Request $request) {

        $id_number = $request->id_number;
        $candidate_role = $request->candidate_role;
        $iat = (strtotime(date("Y-m-d H:i:s")));

        $voters_info = DB::table('vote_histories')
        ->select('id_number', 'name', 'department', 'election_id')
        ->where('id_number', $id_number)
        ->groupBy('id_number')
        ->get();

        $voters_name = collect($voters_info[0])->get('name');
        $voters_department = collect($voters_info[0])->get('department');
        $voters_election_id = collect($voters_info[0])->get('election_id');
        
        $selected_candidate = DB::table('vote_histories')
        ->select('candidate_id_number', 'candidate_name', 'position' , 'candidate_role')
        ->where('id_number', $id_number)
        ->get();

        // Payload
        $payload = ([
            'iat' => $iat,
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
        $token = json_encode($decoded);

        $sign = openssl_sign($data, $signature, $private_key, env('OPENSSL_ALGO'));

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

        $add_vote = [
            'token' => $jwt,
            'status' => $result,
            'id_number' => $id_number,
            'name' => $voters_name,
            'department' => $voters_department,
            'election_id' => $voters_election_id,
            'candidate_role' => $candidate_role,
            ];
        
        $this->add_vote->add_vote($add_vote);

        return redirect('vote-now/'.$voters_department.'/'.$candidate_role)
        ->with('success', 'Successfuly voted!');

    }

}
