<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory, UUID;

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('alert_message', 'query_string', 'display');
    }
}
