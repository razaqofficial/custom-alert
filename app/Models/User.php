<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rules()
    {
        return $this->belongsToMany(Rule::class)
            ->withPivot('alert_message', 'query_string', 'display');
    }

    public function showOnRules()
    {
        return $this->belongsToMany(Rule::class)
            ->wherePivot('display', 1)
            ->withPivot('alert_message', 'query_string', 'display');
    }
}
