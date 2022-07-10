<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Episode extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'type',
        'subtitle',
        'description',
        'categories',
        'duration',
        'evaluation',
        'serial_number',
        'season_number',
    ];

    public function getFirstMediaUrlAttribute()
    {
        return $this->getFirstMediaUrl('images_episodes');
    }
}
