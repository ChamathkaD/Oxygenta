<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDeclineMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order_id)
    {
        //
        $this->user = $user;
        $this->order_id = $order_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user['email'])
            ->subject('Your Order has been deleted')
            ->markdown('emails.orders.decline');
    }
}
