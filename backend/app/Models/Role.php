<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];

    //Plural name  bcs role can have several users
    // cardinality 1,n
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
