<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'uid'; // Define the primary key

    public $incrementing = false;  // If 'uid' is not auto-incrementing
    protected $keyType = 'string'; // If 'uid' is a string

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uid',
        'name',
        'profileImage',
        'role',
        'fname',
        'lname',
        'slug',
        'phone',
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

    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function rolee()
    {
        return $this->hasOne(Role::class, 'slug', 'role');
    }
    public function customeraddress()
    {
        return $this->hasMany(Customeraddress::class, 'customerUid', 'uid');
    }

    public function influencerproduct()
    {
        return $this->hasMany(Product::class, 'influencerUid', 'uid');
    }
    public function influencerimgmedia()
    {
        return $this->hasMany(Influencermedia::class, 'influencerUid', 'uid')->where('type', 'Image')->orderBy('sequence', 'ASC');
    }

    public function influencervideomedia()
    {
        return $this->hasMany(Influencermedia::class, 'influencerUid', 'uid')->where('type', 'Video')->orderBy('sequence', 'ASC');
    }

    public function influencermedia()
    {
        return $this->hasMany(Influencermedia::class, 'influencerUid', 'uid')->orderBy('sequence', 'ASC');
    }
}
