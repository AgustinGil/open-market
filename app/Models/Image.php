<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Image extends Model
{
    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
