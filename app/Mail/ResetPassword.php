<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $code;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code, $user)
    {
        $this->code = $code;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('blood_bank@example.com', $this->user)
            ->markdown('emails.auth.reset',['code' => $this->code, 'user' => $this->user])
            ->subject('BloodBank Confirmation')
            ->with([
                'name' => 'New BloodBank User',
                'content' => 'This is your code: '.$this->code,
                'link' => '/inboxes/'
            ]);
    }
}
