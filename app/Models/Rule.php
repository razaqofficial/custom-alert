<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rule extends Model
{
    use HasFactory, UUID;

    protected $casts = [
        'display' => 'boolean'
    ];

    public function alert()
    {
        return $this->belongsTo(Alert::class);
    }

    public function scopeShowOn(Builder $query)
    {
        return $query->where('display', true);
    }
}
