<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailableJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mail_to;
    public $mail_object;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $object)
    {
        $this->mail_to = $mail;
        $this->mail_object = $object;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Mail::send(‘mail’, $data, function($message) use ($to_name, $to_email) {
//            $message->to($to_email, $to_name)
//                ->subject('Laravel Test Mail');
//            $message->from('SENDER_EMAIL_ADDRESS','Test Mail');
//        });
        Mail::to($this->mail_to)->send($this->mail_object);
    }
}
