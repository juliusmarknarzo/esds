<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Users extends Model
{
    protected $fillable = [
        'username',
        'password'
    ];

    public $timestamps = false;
}
