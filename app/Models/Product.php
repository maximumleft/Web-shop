<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $guarded = false;

    const PUBLISHED = 1;
    const NOT_PUBLISHED = 0;

    public static function getPublished()
    {
        return [
            self::PUBLISHED => 'Опубликован',
            self::NOT_PUBLISHED => 'Не опубликован',
        ];
    }

    public function getPublishedTitleAttribute()
    {
        return self::getPublished()[$this->is_published];
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tags');
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_products');
    }
}
