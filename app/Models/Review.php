<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id', 'username', 'email', 'rating',
        'visit_date', 'companions', 'title', 'comment',
        'agreement', 'photos'
    ];

    protected $casts = [
        'agreement' => 'boolean',
        'photos' => 'array', // handle JSON as array
        'visit_date' => 'date',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}

