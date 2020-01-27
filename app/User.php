<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'korisnik';
    protected $primaryKey = 'korisnik_id';

    public $timestamps = false;

    protected $fillable = ['ime','prezime','adresa','telefon','username','email','password'];
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function usertype(){
        return $this->belongsTo('App\Usertype','vrsta_korisnik_id');
    }


    public function pacijents(){
        return $this->hasMany('App\Pacijent','korisnik_id');
    }

    public function card(){
        return $this->hasOne('App\Card');
    }
}
