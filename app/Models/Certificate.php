<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar', 'title_en',
        'description_ar', 'description_en',
        'image', 'issuer', 'issued_at',
        'is_active', 'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'issued_at' => 'date',
    ];

    public function getTitleAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
