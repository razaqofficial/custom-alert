<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Rule extends Model
{
    use HasFactory, UUID;

    protected $casts = [
      'display' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeShowOn(Builder $query)
    {
        return $query->where('display', true);
    }
}
