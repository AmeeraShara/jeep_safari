<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customers';


    protected $fillable = [
        'customer_name', 'email', 'phone_number', 'date_of_birth', 'address',
        'nationality', 'passport_number', 'emergency_contact_name', 'emergency_contact_number',
        'password', 'role', 'status', 'special_preference_notes'
    ];

    protected $hidden = ['password'];

    
}
