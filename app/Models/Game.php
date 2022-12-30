<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'furigana', 'hard_id', 'maker_id', 'clear', 'grade', 'notes', 'updated_at', 'created_at'];

    public function hard()
    {
        return $this->belongsTo(Hard::class);
    }

    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }
}
