<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(fn ($category) => $category->slug = Str::slug($category->name));
    }
}
