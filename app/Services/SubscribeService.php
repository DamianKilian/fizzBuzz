<?php

namespace App\Services;

use App\Jobs\Publish;
use App\Models\Person;

class SubscribeService
{
    public static function publish(string $subMessage)
    {
        $persons = Person::where('email_sub', true)->orWhere('sms_sub', true)->get();
        foreach ($persons as $person) {
            Publish::dispatch($person, $subMessage)->onQueue('subscription');
        }
    }
}
