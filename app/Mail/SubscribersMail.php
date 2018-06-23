<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribersMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $subject;
     public $messages;

    public function __construct($messages,$subject)
    {
        //$this->messages = $messages;
        //$this->subject = $subject;
        $this->subject = $subject;
        $this->messages = $messages;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public $total = 30;
    public function build(Request $request)
    {
      $address = 'ecom_kajandi@gmail.com';

      return $this->view('backend.subscriber.mail_templates.newsletter')
         ->from($address, $name)
        // ->cc($address, $name)
         //->bcc($address, $name)
         //->content($message)
         ->replyTo($address, $name);
         //->subject($subject);
    }
}
