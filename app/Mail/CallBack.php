<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallBack extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.callback')
            ->from("agent@cruiselines.pro", $this->name)
            ->with([
                'name' => $this->name,
                'phone' => $this->phone
            ])
            ->subject('Заявка на беплатный звонок');
    }
}
