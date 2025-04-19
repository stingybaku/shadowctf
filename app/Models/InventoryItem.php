<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    //
    protected $fillable = [
        'character_id',
        'name',
        'type',
        'description',
        'quantity',
    ];

    public function character() {
        return $this->belongsTo(Character::class);
    }
}
