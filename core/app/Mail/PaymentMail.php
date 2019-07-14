<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $payment;
    protected $email;

    public function __construct($payment)
    {
        $this->payment = $payment;
        // $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('payment::emails.main')
        ->subject('Regarding the payment of '.$this->payment->service->name.' under '.$this->payment->service_source.' | Team Cybertech')
        ->with([
            'payment'=>$this->payment,
            // 'email'=>$this->email,
        ]);
    }
}
