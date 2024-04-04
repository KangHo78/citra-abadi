<?php

namespace App\Mail;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class orderInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $cart,$order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart,$order)
    {
        //
        $this->cart = $cart;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user.email');
    }
}
