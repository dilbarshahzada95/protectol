<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SaveItLaterEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $url)
    {
        $this->username = $username;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.save_it_later')
            ->subject('Save It for Later - Email Notification');
    }
}
