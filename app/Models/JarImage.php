<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class JarImage extends Model
{
    protected $fillable = [
        'path',
    ];

    protected static function booting()
    {
        static::deleted(function (JarImage $image) {
            Storage::disk('public')->delete($image->path);
        });
    }

    public function jar(): BelongsTo
    {
        return $this->belongsTo(Jar::class);
    }

    protected function url(): Attribute
    {
        return Attribute::get(
            fn () => Storage::disk('public')->url($this->path)
        );
    }
}
