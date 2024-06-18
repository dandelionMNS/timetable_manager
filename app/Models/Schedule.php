<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "subject_id",
        "instructor_id",
        "course_id",
        "location_id",
        "day_id",
        "start_id",
        "end_id",
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function location()
    {
        return $this->belongsTo(Classroom::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
    public function start()
    {
        return $this->belongsTo(TimeSlot::class);
    }
    public function end()
    {
        return $this->belongsTo(TimeSlot::class);
    }
}
