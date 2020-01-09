<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $blogData;
    public function __construct($blogData)
    {
        $this->blogData = $blogData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from('interns@cytonn.test')
                    ->view('views.mail')
                    ->with([
                        'blogName' => $this->blogData->name,
                        'blogTitle' => $this->blogData->title
                    ]);
    }
}

