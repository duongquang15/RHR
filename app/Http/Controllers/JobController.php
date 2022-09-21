<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\User;
use App\Models\Group;
use App\Models\Calendar;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Level;
use App\Models\Meeting;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $block =Block::all();
        $group = Group::all();
        $calendar = Calendar::all();
        $data = Job::orderBy('created_at', 'ASC')->get();
        return view('jobmanagement.list_job', compact('data', 'calendar', 'group',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $candiate=Candidate::all();
        $group = Group::all();
        $level = Level::all();
        $user = User::orderBy('name', 'ASC')->select('id', 'name')->get();
        $job = Job::all();
        return view('jobmanagement.add_new_job', compact('user', 'level', 'job','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        Job::create([
            'name' => $request->name,
            'level_id' => $request->level_id,
            'request_date' => '2022-09-24',
            'onboard_date' => $request->onboard_date,
            'amount' => $request->amount,
            'priority' => $request->priority,
            'group_id' => $request->group_id,
            'skill' => $request->skill,
            'salary' => $request->salary,
            'note' => $request->note,
            'status' => '1',
            'user_id' => auth()->id(),
        ]); 
        // ($request->only('name','level_id','request_date','onboard_date','amount','priority','group_id','skill','salary','note'));
        return redirect()->route('job.index')->with('success', 'Thêm mới job thành công');
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
        $data = Job::query()->where('id', $id)->with('level')->get();
        $level = Level::query()->where('id', $id)->with('level')->get();
        return view('jobmanagement.view_job', compact('data','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('job.index')->with('success', 'Cập nhật job thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('job.index')->with('success', 'Xóa job thành công');
    }
}
