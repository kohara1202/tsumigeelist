<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hard extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'furigana', 'hard_id', 'maker_id', 'clear', 'grade', 'notes', 'updated_at', 'created_at'];
}
