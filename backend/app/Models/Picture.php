<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Section;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'picture_name',
        'description',
        'section_id',
        'event_id',
        'activity_id',
    ];

    //Function name in singular bcs only one section in relation
    // cardinality 1,1
    public function section()
    {
        return $this->hasOne(Section::class);
    }

    //Function name in singular bcs only one event in relation
    // cardinality 1,1
    public function event()
    {
        return $this->hasOne(Event::class);
    }

    //Function name in singular bcs only one activity in relation
    // cardinality 1,1
    public function activity()
    {
        return $this->hasOne(Activity::class);
    }
}
