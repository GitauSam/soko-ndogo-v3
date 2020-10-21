<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTypes extends Model
{
    use HasFactory;

    protected $table = 'category_types';

    protected $fillable = [
        'category_id',
        'category_type_name'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Categories\Categories');
    }
}
