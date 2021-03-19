<?php

namespace App\Mail;

use App\Models\admin\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use DateTime;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bookingId;
    public $payment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingId)
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $payment = Payment::with("booking","booking.room.roomType","customer");

        $payment = $payment->where("booking_id",$this->bookingId)->first();
        $total = Arr::pluck($payment->booking->room,"roomType");
        $total = Arr::pluck($total,'price');
        $date1 = new DateTime($payment->booking->check_in_date);
        $date2 = new DateTime($payment->booking->check_out_date);
        $int = $date1->diff($date2);
        $days = $int->format("%a");
        $payment['days'] = $days;
        $payment['total'] = array_sum($total) * $days;
        $this->payment = $payment;
        return $this->view('admin.payment.showMail')->subject("From email:","chhounsophanon@overlook.com");
    }
}
