<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\ContactUsMail;
use Mail;


class ContactUs extends Model
{
    // use HasFactory;

    protected $fillable = ['name', 'email', 'message'];


    public static function boot() {
  
        parent::boot();
  
        static::created(function ($item) {
                
            $itForcesMail = "hello@itforces.lt";
            Mail::to($itForcesMail)->send(new ContactUsMail($item));
        });
    }
}
