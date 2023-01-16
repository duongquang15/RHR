<?php

namespace App\Http\Controllers;

use App\Mail\OfferMail;
use App\Mail\SendMail;
use App\Models\Calendar;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function sendMail($id, $calendarId){
        $candidate=Candidate::find($id);
        $candidateMail = $candidate->email;
        $calendar = Calendar::find($calendarId);
        $mailable = new SendMail($candidate, $calendar);
        Mail::to($candidateMail)->send($mailable);
        return true;
        
    }

    public function offerMail($id){
        $candidate=Candidate::find($id);
        $candidateMail = $candidate->email;
        $mailable = new OfferMail($candidate);
        Mail::to($candidateMail)->send($mailable);
        return true;
    }

    public function addCalendar($id, Request $request)
    {
        $candidate = Candidate::find($id);
        $candidateStatus = $candidate->status;
        $candidate->update([
            'status' => $candidateStatus + 1
        ]);
        $calendar = new Calendar();
        
        $calendar->title = $request->title;
        $calendar->start_time = $request->start_time;
        $calendar->    end_time = $request->end_time;
        $calendar->meeting_id = $request->meeting_id;
        $calendar->user_id = auth()->user()->id;
        $calendar->candidate_id = $id;
        $calendar->save();
        $calendarId = $calendar->id;
        $this->sendMail($id, $calendarId);

        return redirect()->route('candidate.detailcandidate', [$id]);
    }

    public function offerCandidate($id, Request $request){
        $candidate = Candidate::find($id);
        $candidate->update([
            'desired_salary' => $request->desired_salary
        ]);
        $this->offerMail($id);

        return redirect()->route('candidate.detailcandidate', [$id]);
    }
}
