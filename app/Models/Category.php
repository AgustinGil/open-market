<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CateogryFactory> */
    use HasFactory;

    public function parent(): HasOne
    {
        return $this->hasOne(Category::class, 'parent_id', 'id');
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
