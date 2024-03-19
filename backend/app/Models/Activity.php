<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_name',
        'description',
        'activity_date',
        'start_at',
        'end_at',
        'duration',
        'place_address',
        'challengers_number',
        'difficulty',
    ];

    // Plural name cause a activity can display multiple pictures
    // cardinality 0,n
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    // Plural name cause a activity can get multiple comments
    // cardinality 0,n
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Plural name cause a activity can have several users
    // cardinality 1,n
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
