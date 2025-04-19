<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    public function steps() {
        return $this->hasMany(QuestStep::class)->orderBy('step_order');
    }
    
}
