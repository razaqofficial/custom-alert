<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('alert_message', 'query_string', 'display');
    }
}
