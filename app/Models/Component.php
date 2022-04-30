<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Component extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['properties', 'slug', 'title', 'description', 'image'];
    protected $fillable = ['author', 'parent_id'];
}
