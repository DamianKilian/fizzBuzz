<?php

namespace App\Jobs;

use App\Models\Person;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class Publish implements ShouldQueue
{
    use Queueable;

    protected $person;
    protected $subMessage;

    /**
     * Create a new job instance.
     */
    public function __construct(
        Person $person,
        string $subMessage,
    ) {
        $this->person = $person->withoutRelations();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->person->sms_sub) {
            $this->sendSmsSub();
        } elseif ($this->person->email_sub) {
            $this->sendEmailSub();
        }
    }

    public function sendEmailSub()
    {
        // kod
    }
    public function sendSmsSub()
    {
        // kod
    }
}
