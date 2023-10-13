<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{

    protected $fillable = [
        'title',
        'start',
        'end',
    ];

    use HasFactory;
}
