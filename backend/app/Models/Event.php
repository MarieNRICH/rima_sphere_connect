<?php

namespace App\Models;

use App\Models\User;
use App\Models\Picture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'event_date',
        'place_address',
        'start_at',
        'end_at',
        'description',
        'status',
        'duration',
        'volunteer',
        'participant',
    ];

    // Plural name cause a user can have multiple pictures
    // cardinality 0,n
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    // Plural name cause a user can have multiple users
    // cardinality 1,n
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
