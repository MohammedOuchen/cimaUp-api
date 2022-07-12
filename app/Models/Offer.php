<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;


        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'date',
        'day',
        'room_id',
        'episode_id',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
