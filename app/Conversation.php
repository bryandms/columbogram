<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $appends = ['contact_name'];

    public function getContactNameAttribute()
    {
        return $this->contact()->first(['name'])->name;
    }

    public function contact()
    {
        return $this->belongsTo(User::class);
    }
}
