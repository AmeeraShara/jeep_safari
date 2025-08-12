<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'years_of_experience',
        'password',
        'joined_date',
        'primary_park',
        'license_number',
        'vehicle',
        'language',
        'status'
    ];

    protected $hidden = ['password'];
}
