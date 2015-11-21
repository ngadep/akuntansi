<?php

namespace Akuntansi\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function accounts()
    {
        return $this->hasManyThrough(Account::class,Group::class);
    }
}
