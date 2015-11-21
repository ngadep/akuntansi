<?php

namespace Akuntansi\Models;

use Illuminate\Database\Eloquent\Model;

class JournalDetail extends Model
{
    public function journal(){
        return $this->belongsTo(Journal::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
