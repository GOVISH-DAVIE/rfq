<?php

namespace App\Mail;

use App\Models\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Quotation $quote)
    {
        //
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name')->with('item' , $this->quote);
    }
}
