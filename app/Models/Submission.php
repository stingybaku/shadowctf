<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    //
    protected $fillable = [
        'character_id',
        'challenge_id',
        'submitted_flag',
        'is_correct',
    ];

    public function character() {
        return $this->belongsTo(Character::class);
    }

    public function challenge() {
        return $this->belongsTo(Challenge::class);
    }
}
