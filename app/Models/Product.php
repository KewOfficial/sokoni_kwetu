<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Image;
use App\Models\Review;

class Product extends Model
{
    protected $table = 'products'; // Set the table name explicitly
    protected $primaryKey = 'id'; // Set the primary key explicitly

    protected $fillable = ['name', 'description', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Define an accessor to get the first image URL
    public function getImageUrlAttribute()
    {
        $firstImage = $this->images->first();
        if ($firstImage) {
            return $firstImage->url;
        }
        return 'default_image.jpg';
    }
}
