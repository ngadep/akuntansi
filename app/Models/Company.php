<?php

namespace Akuntansi\Models;

use Akuntansi\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * call users many to many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
