<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name','location','description','image'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
