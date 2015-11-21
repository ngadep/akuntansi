<?php

namespace Akuntansi\Models;

use Akuntansi\User;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    /**
     * journalDetail many to many relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journalDetails()
    {
        return $this->hasMany(JournalDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
