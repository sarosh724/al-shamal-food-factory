<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, Sluggable;

    public function images(){
        return $this->hasMany(ServiceImage::class, 'service_id');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title_english']
            ]
        ];
    }
}
