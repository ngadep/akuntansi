<?php

namespace Akuntansi\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
