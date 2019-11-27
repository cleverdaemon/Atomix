<?php

namespace Atomix;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Overtrue\LaravelFollow\Traits\CanLike;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'first_name', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function atoms()
    {
        return $this->hasMany('Atomix\Atom');
    }
    
    public function getName()
    {
        if ($this->first_name && $this->last_name)
        {
            return "{$this->first_name} {$this->last_name}";
        }

        if ($this->first_name)
        {
            return $this->first_name;
        }

        return null;
    }
    
    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->name;
    }
    
    public function getFirstNameOrUsername()
    {
        return $this->first_name ?: $this->name;
    }
    
    public function getAvatarUrl()
    {
        return "http://www.gravatar.com/avatar/" . md5($this->email) . "?d=mm&amp;size=40";
    }
}
