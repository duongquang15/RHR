<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Level;
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
        // $a=$data[0]->level->level_name;die($a);
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
        $job=Job::all();
        $level=Level::all();
        $data = Candidate::where('id', $id)->get();
      
        return view('candidatemanagement.detail_candidate',compact('data','level','job'));
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
        $data = Candidate::query()->where('id',$id)->get();
        return view('candidatemanagement.view_candidate', compact('data'));
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
        $candidate->update($request->all());
        return redirect()->route('candidate.index')->with('success', 'Cập nhật ứng viên thành công');
    }

    public function updateStatus(Request $request, Candidate $candidate,$id)
    {
        $candidate->find($id)->update([
            'status' => $request->status
        ]);
        // return redirect()->route('candidate.detailcandidate')->with('success', 'Cập nhật trạng thái thành công');
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
