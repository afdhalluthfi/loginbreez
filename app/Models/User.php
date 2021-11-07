<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline () {
        $following =$this->follower->pluck('id');
        return status::whereIn('user_id',$following)
                                                ->orWhere('user_id',$this->id)
                                                ->latest()
                                                ->get();
    }
    public function status()
    {
        return $this->hasMany(status::class);
    }

    public function insertBody($string)
    {
        $this->status()->create([
            'body'=>$string,
            'identyfier'=>Str::slug(Str::random(31).$this->id)
        ]);
    }

    public function follower () 
    {
        return $this->belongsToMany(User::class,'follow','user_id','follow_user_id')->withTimestamps();
    }


    // helper

    public function following (User $user) 
    {
        return $this->follower()->save($user);
    }
    public function gravatar ($size =100) 
    {   $default='mm';
        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size;
        return $grav_url;
    }
}
