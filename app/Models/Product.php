<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Filterable;

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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getImageUrlAttribute(){
        return url('storage/' . $this->preview_image);
    }
    public function getSecondImageUrlAttribute(){
        return url('storage/' . $this->second_image);
    }
}
