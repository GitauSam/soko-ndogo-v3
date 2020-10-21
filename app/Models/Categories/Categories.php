<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name'
    ];

    public function categoryTypes() {
        return $this->hasMany('App\Models\Categories\CategoryTypes', 'category_id');
    }
}
