<?php

namespace App\Mail;

use App\Models\Calendar;
use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $candidate;
    private $calendar;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Candidate $candidate, Calendar $calendar)
    {
        $this->candidate=$candidate;
        $this->calendar=$calendar;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Thư mời phỏng vấn')
        ->view('mail.sendmail')->with([
            'candidate'=>$this->candidate,
            'calendar'=>$this->calendar
        ]);
    }
}
