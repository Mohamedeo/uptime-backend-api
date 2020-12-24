<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    public function getKey(): string
    {
        return static::class;
    }
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function monitors() {
        return $this->hasMany(Monitor::class);
    }

    public function monitorEvents() {
        return $this->hasMany(MonitorEvent::class);
    }

    public function uptimeEventCounts() {
        return $this->hasMany(MonitorUptimeEventCount::class);
    }

    public function channels() {
        return $this->hasMany(Channel::class);
    }
}
