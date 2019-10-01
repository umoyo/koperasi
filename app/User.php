<?php

namespace App;
use Illuminate\Support\Facades\Cache;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function dataIdentitas()
    {
          return $this->hasOne('App\Identitas');
     } 

     public function dataIdentitasAll()
     {
           return $this->hasMany('App\Identitas');
      } 
 
     public function dataPesanan()
     {
           return $this->hasMany('App\Pesanan');
      }  

      public function Beli()
      {
            return $this->hasMany('App\Beli');
       }   

       public function dataBeli()
       {
             return $this->hasMany('App\DataBeli');
        }    
   
        public function dataBaca()
        {
              return $this->hasOne('App\Baca');
         }    
    

        public function isOnline()
        {
              return Cache::has('user-online-'.$this->id);
          }

}
