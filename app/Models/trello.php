<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trello extends Model
{
    use HasFactory;
    protected $fillable = ['apikey', 'token'];
}
