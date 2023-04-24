<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidates;
use App\Models\User;
use App\Models\Application_Form;
use App\Models\VoteHistory;
use App\Models\VoteTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    function __construct() {
        $this->application_form = new Application_Form;
    }

    public function dashboard() 
    {
        
        $candidates = Candidates::all();
        return view('dashboard', compact('candidates'));

    }

    public function application_form($id_number, $department)
    {
        $application_form = Application_Form::all()->where('id_number', $id_number)->where('department', $department);
        return view('form.application_form', compact('application_form'));
    }

    public function store_form(Request $request) {
        
        
        
        $request->validate([
            'id_photo' => 'required|mimes:png,jpg|max:2048',
            'first_semester_grade' => 'required|mimes:pdf,docx|max:2048',
            'second_semester_grade' => 'required|mimes:pdf,docx|max:2048'
        ]);

        $candidate_role = $request->candidate_role;
        $id_photo = $request->id_photo;
        $position = $request->position;
        $id_number = $request->id_number;
        $name = $request->name;
        $birthday = $request->birthday;
        $placeofBirth = $request->placeofBirth;
        $gender = $request->gender;
        $year_level = $request->year_level;
        $section = $request->section;
        $department = $request->department;
        $email = $request->email;
        $last_grade = $request->last_grade;
        $essay_question = $request->essay_question;
        $first_semester_grade = $request->first_semester_grade;
        $second_semester_grade = $request->second_semester_grade;
        $status = "Pending";

        $id_photo_name = $id_number.'.'.$request->id_photo->extension();
        $first_semester_grade_name = $id_number.'_1st_sem_grade.'.$request->first_semester_grade->extension();
        $second_semester_grade_name = $id_number.'_2nd_sem_grade.'.$request->second_semester_grade->extension();

        $request->id_photo->move(public_path('images'), $id_photo_name);
        $request->first_semester_grade->move(public_path('grades'), $first_semester_grade_name);
        $request->second_semester_grade->move(public_path('grades'), $second_semester_grade_name);

        $collection = DB::table('elections')->where('department', $department)->where('candidate_role', $candidate_role)->get();
        $election_id = collect($collection[0])->get('id');
        

        $store_form = [
            'id_number' => $id_number,
            'id_photo' => $id_photo_name,
            'position' => $position,
            'name' => $name,
            'birthday' => $birthday,
            'placeofBirth' => $placeofBirth,
            'gender' => $gender,
            'year_level' => $year_level,
            'section' => $section,
            'department' => $department,
            'email' => $email,
            'last_grade' => $last_grade,
            'essay_question' => $essay_question,
            'first_semester_grade' => $first_semester_grade_name,
            'second_semester_grade' => $second_semester_grade_name,
            'status' => $status,
            'election_id' => $election_id,
            'candidate_role' => $candidate_role,
        ];

        
        $application_form = Application_Form::all();

        $this->application_form->store_form($store_form);
        return redirect('/profile')
                ->with( compact('application_form'))
                ->with('success', 'Application submitted!');

    }

    public function votenow($department, $candidate_role) 
    {

        // print($department);
        $has_election = DB::table('application_forms')
                                ->select('department')
                                ->where('department', $department)
                                ->where('candidate_role', $candidate_role)
                                ->groupBy('department')
                                ->exists();

        $departments = DB::table('elections')
                                ->where('department', $department)
                                ->where('candidate_role', $candidate_role)
                                ->groupBy('department')
                                ->get();

        $has_department = DB::table('departments')
                                ->select('department_name')
                                ->where('id', $department)
                                ->exists();

        if($has_election){
            $has_election = "true";
        }
        else {
            $has_election = "false";
        }

        if($has_department){
            $has_department = "true";
        }
        else {
            $has_department = "false";
        }

        // print($has_department);

        return view('user.votenow.index', compact('has_election', 'departments'));

    }

    public function start_vote($department, $id_number, $candidate_role) 
    {
        $dept = $department;
        $id_num = $id_number;
        $can_role = $candidate_role;

        $student_department = DB::table('elections')
                                ->where('department', $dept)
                                ->where('candidate_role', 'student')
                                ->groupBy('department')
                                ->get();
        $professor_department = DB::table('elections')
                                ->where('department', $dept)
                                ->where('candidate_role', 'professor')
                                ->groupBy('department')
                                ->get();

        $department_view = DB::table('application_forms')
                                ->select('department')
                                ->where('department', $dept)
                                ->where('candidate_role', $can_role)
                                ->groupBy('department')
                                ->exists();

        $position_view = DB::table('application_forms')
                            ->where('department', $dept)
                            ->where('candidate_role', $can_role)
                            ->groupBy('position')
                            ->get();

        $collection = DB::table('positions')
                            ->select('num_vote_per_position')
                            ->get();
                            
        $cast_button = collect($collection)->sum('num_vote_per_position');


        if ($department_view) {
                $dept_view = "true";
            }
            else
            {
                $dept_view = "false";
            }
                                
        // print($cast_button);
        return view('user.votenow.start_vote', compact('student_department', 'professor_department', 'dept_view', 'position_view', 'cast_button'));

    }

    public function cast_vote($department, $id_number, $candidate_role) {

        $dept = $department;
        $id_num = $id_number;
        $can_role = $candidate_role;

        $student_department = DB::table('elections')
                                ->where('department', $dept)
                                ->where('candidate_role', 'student')
                                ->groupBy('department')
                                ->get();
        $professor_department = DB::table('elections')
                                ->where('department', $dept)
                                ->where('candidate_role', 'professor')
                                ->groupBy('department')
                                ->get();

        $department_view = DB::table('application_forms')
                                ->select('department')
                                ->where('department', $dept)
                                ->where('candidate_role', $can_role)
                                ->groupBy('department')
                                ->exists();

        $position_view = DB::table('application_forms')
                            ->where('department', $dept)
                            ->where('candidate_role', $can_role)
                            ->groupBy('position')
                            ->get();


        $vote_histories = DB::table('vote_histories')
                            ->where('department', $dept)
                            ->where('candidate_role', $can_role)
                            ->where('id_number', $id_num)
                            ->get();

        if ($department_view) {
                $dept_view = "true";
            }
            else
            {
                $dept_view = "false";
            }

        
        return view('user.votenow.cast_vote', compact('vote_histories', 'student_department', 'professor_department', 'dept_view', 'position_view', 'id_num'));
    }


    public function ballot($id_number) 
    {        
        $candidates = Candidates::all();
        $vote_transaction = VoteTransaction::where('id_number', $id_number)->get();
        $vote_history = VoteHistory::where('id_number', $id_number)->get();
        
        return view('user.ballot.index', compact('candidates', 'vote_history', 'vote_transaction'));
    }

    public function select_candidate($position, $candidate_role, $election_id) 
    {        
        // print($pos = $position."<br>".$dept = $department."<br>".$role = $candidate_role);

        $candidates = DB::table('application_forms')
                        ->where('position', $position)
                        ->where('candidate_role', $candidate_role)
                        ->where('election_id', $election_id)
                        ->get();

        $approved_candidates = DB::table('application_forms')
                        ->where('position', $position)
                        ->where('candidate_role', $candidate_role)
                        ->where('election_id', $election_id)
                        ->get();

        $candidates_view = DB::table('application_forms')
                        ->where('position', $position)
                        ->where('candidate_role', $candidate_role)
                        ->where('election_id', $election_id)
                        ->exists();

        if ($candidates_view) {
           $candidatesview = "true";
        }
        else
        {
            $candidatesview = "false";
        }
        

        return view('user.votenow.select_candidate', compact('candidates', 'candidatesview'));
    }


}
