<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //RELATIONSHIP
    public function jiris(): HasMany
    {
        return $this->hasMany(Jiri::class);
    }

    public function pastJiris(): HasMany
    {
        return $this->hasMany(Jiri::class)->where('starting_at', '<', now())->orderBy('starting_at', 'desc');
    }

    public function upcomingJiris(): HasMany
    {
        return $this->hasMany(Jiri::class)->where('starting_at', '>=', now())->orderBy('starting_at');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class)->orderBy('name');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class)->orderBy('name');
    }
}
