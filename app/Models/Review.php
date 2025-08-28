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
        'visit_date' => 'date',
    ];

    // Accessor to convert comma-separated string back to array
    public function getPhotosAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    // Mutator to convert array to comma-separated string (optional but good practice)
    public function setPhotosAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['photos'] = implode(',', $value);
        } else {
            $this->attributes['photos'] = $value;
        }
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}