<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar', 'name_en',
        'position_ar', 'position_en',
        'bio_ar', 'bio_en',
        'image', 'linkedin', 'twitter', 'email',
        'is_active', 'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getNameAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getPositionAttribute(): string
    {
        return app()->getLocale() === 'ar' ? $this->position_ar : $this->position_en;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
