<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'status', 'time'];
    protected $casts = [
        'status' => 'integer',
        'time' => 'datetime:Y-m-d H:i:s',
    ];
}
