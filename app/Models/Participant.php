<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property-read string $name
 * @package App\Models
 */

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'room_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}