<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable // Extend Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}







/*
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Crypt;




class Customer extends Model
{
    protected $fillable = ['name', 'email', 'phone','password'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    /*
    public static function decryptPassword($encryptedPassword)
    {
        return Crypt::decryptString($encryptedPassword);
    }
}
$hashedPassword = bcrypt($plainTextPassword);
*/