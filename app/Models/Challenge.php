<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'flag',
        'experience_reward',
    ];

    public function questSteps() {
        return $this->hasMany(QuestStep::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }
}
