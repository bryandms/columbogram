<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $appends = ['contact_name', 'contact_image'];

    public function getContactNameAttribute()
    {
        return $this->contact()->first(['name'])->name;
    }

    public function getContactImageAttribute()
    {
        return '/users/' . $this->contact()->first(['image'])->image;
    }

    public function contact()
    {
        return $this->belongsTo(User::class);
    }
}
