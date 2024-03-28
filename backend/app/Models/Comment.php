<?php

namespace App\Models;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'image',
        'tags',
        'activity_id',
        'user_id',

    ];

    // Singular name cause a there only one comment in relation 
    // cardinality 1,1
    public function activity()
    {
        return $this->hasOne(Activity::class);
    }

    //Function name ijn singular bcs only one user in relation
    // cardinality 1,1
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
