<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read string $name
 * @property-read int $room_id
 * @property-read Carbon $revealed_at
 * @property-read Carbon $completed_at
 * @package App\models
 */

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeCompleted(Builder $query)
    {
        $query->whereNotNull('compleated_at');
    }
    public function scopeUncompleted(Builder $query)
    {
        $query->whereNull('compleated_at');
    }
    public function complete()
    {
        $this->forceFill([
            'compleated_at' => now(),
        ])->save();
    }

    public function uncomplete()
    {
        $this->forceFill([
            'compleated_at' => null,
        ])->save();
    }

    public function isCompleted()
    {
        return !! $this->compleated_at;
    }
    public function isRevealed()
    {
        return !! $this->revealed_at;
    }
}
