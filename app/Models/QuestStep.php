<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestStep extends Model
{
    //
    protected $fillable = [
        'quest_id',
        'title',
        'description',
        'challenge_id',
        'step_order',
    ];

    public function quest() {
        return $this->belongsTo(Quest::class);
    }

    public function challenge() {
        return $this->belongsTo(Challenge::class);
    }
    
}
