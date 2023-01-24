<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jar extends Model
{
    protected $fillable = [
        'name',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(JarImage::class);
    }

    public function flush(): void
    {
        $this->images->each->delete();
    }
}
