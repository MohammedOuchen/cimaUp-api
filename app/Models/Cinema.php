<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Cinema extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'active',
        'country',
        'city',
        'post_code',
        'additional_address',
        'address',
        'active',
        'user_id',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }


    public function getFirstMediaUrlAttribute()
    {
        return $this->getFirstMediaUrl('images_cinemas');
    }
}
