<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'tel',
        'sms_sub',
        'email_sub',
    ];
}
