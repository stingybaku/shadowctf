<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name',
        'class',
        'level',
        'experience',
        'hp',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function inventory() {
        return $this->hasMany(InventoryItem::class);
    }
    
}
