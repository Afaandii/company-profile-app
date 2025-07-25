<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
    ];

    //untuk mencari data berdasarkan slug bukan id jadi bisa menggunakna method ini selain route models binding.
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}