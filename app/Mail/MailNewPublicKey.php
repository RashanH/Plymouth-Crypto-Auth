<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNewPublicKey extends Mailable
{
    use Queueable, SerializesModels;
    protected $public_key;
    protected $product_name;
    protected $product_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($public_key, $product_name, $product_id)
    {
        $this->public_key = $public_key;
        $this->product_name = $product_name;
        $this->product_id = $product_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_public_key')
        ->subject($this->product_name . ' - Public Key')
        ->with([
            'public_key' => $this->public_key,
            'product_name' => $this->product_name,
            'product_id' => $this->product_id
        ]);
    }
}
