<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Level;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level=Level::all();
        $job=Job::all();
        $data = Candidate::orderBy('created_at', 'ASC')->get();
        return view('candidatemanagement.list_candidate', compact('data','job','level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job=Job::all();
        $level=Level::all();
        $data = Candidate::all();
        return view('candidatemanagement.add_new_candidate',compact('data','level','job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Candidate::create($request->all());
        return redirect()->route('candidate.index')->with('success', 'Thêm mới ứng viên thành công');
    }

    public function detailCandidate(Request $request, Candidate $candidate, $id)
    {
        $meeting= Meeting::all();
        $job=Job::all();
        $level=Level::all();
        $data = Candidate::where('id', $id)->get();
      
        return view('candidatemanagement.detail_candidate',compact('data','level','job','meeting'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::all();
        $job = Job::all();
        $data = Candidate::query()->where('id',$id)->get();
        return view('candidatemanagement.view_candidate', compact('data','level','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $param=[
            'candidate_name' => $request->candidate_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'sent_date_cv' => $request->sent_date_cv,
            'school' => $request->school,
            'cv' => $request->cv,
            'note' => $request->note,
            'skill' => $request->skill,
            'experience' => $request->experience,
            'current_salary' => $request->current_salary,
            'desired_salary' => $request->desired_salary,
            'job_id' => $request->job_id,
            'level_id' => $request->level_id,
        ];
        $candidate->update($param);
        return redirect()->route('candidate.index')->with('success', 'Cập nhật ứng viên thành công');
    }

    public function updateStatus(Request $request, Candidate $candidate,$id)
    {
        $candidate->find($id)->update([
            'status' => $request->status
        ]);
        return redirect('/detailcandidate'. '/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        return redirect()->route('candidate.index')->with('success', 'Xóa ứng viên thành công');
    }
}
