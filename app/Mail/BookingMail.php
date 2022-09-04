<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    public Booking $reserved;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserved)
    {
        $this->reserved = $reserved;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking Confirmation')->view('mail.reservation-mail');
    }
}
