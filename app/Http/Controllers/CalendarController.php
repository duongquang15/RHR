<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Candidate;
use App\Models\Job;
use App\Models\Level;
use App\Models\Meeting;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index()
    {
        $level=Level::all();
        $job=Job::all();
        $data = Calendar::orderBy('created_at', 'DESC')->get();
        $candidates = Candidate::all();
       
        return view('calendarmanagement.list_calendar', compact('data','job','level','candidates'));
    }

    public function detailCalendar()
    {
        $data = Calendar::orderBy('created_at', 'DESC')->get();
        $events = array();
        $bookings = Calendar::all();
        foreach($bookings as $booking) {
            $events[] = [
                'id'   => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_time,
                'end' => $booking->end_time,
            ];
        }
        return view('calendarmanagement.calendar', compact('events','data'));

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
        Calendar::create($request->all());
        return redirect()->route('calendar.index')->with('success', 'Thêm mới ứng viên thành công');
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
        $meeting=Meeting::all();
        $data = Calendar::query()->where('id',$id)->get();
        return view('calendarmanagement.view_calendar', compact('data','meeting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calendar $calendar)
    {
       
        $param = [
            'title' => $request->title,
            'meeting_id' => $request->meeting_id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,

        ];
        $calendar->update($param);
        return redirect()->route('calendar.index')->with('success', 'Cập nhật lịch thành công');
    }

    // public function updateStatus(Request $request, Candidate $candidate,$id)
    // {
    //     $candidate->find($id)->update([
    //         'status' => $request->status
    //     ]);
    //     return redirect('/detailcandidate'. '/' . $id);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return redirect()->route('calendar.index')->with('success', 'Xóa lịch ứng viên thành công');
    }

}
