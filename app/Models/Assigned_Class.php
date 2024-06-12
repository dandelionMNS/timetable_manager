<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assigned_class extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "location",
        "subject",
        "day",
        "time_start",
        "time_end",
    ];
}
