<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompare extends Model
{
    use HasFactory;

    protected $table = 'user_compare';

    protected $fillable = ['word_1', 'word_2', 'result_percentage'];
}
