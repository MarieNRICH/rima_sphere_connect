<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_name',
        'number_of_member',
        'material',
        'ffck_licence_number',
        'member_ship_price',
        'activity_contribution_rate',
    ];

    // Plural name cause a user can post multiple pictures
    // cardinality 0,n
    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    // Plural name cause a user can post multiple users
    // cardinality 1,n
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
