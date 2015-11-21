<?php

namespace Akuntansi\Models;

use Akuntansi\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $guarded=['_token'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function journalDetails()
    {
        return $this->hasMany(JournalDetail::class);
    }

    public function journalHistories()
    {
        return $this->hasMany(JournalHistory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
