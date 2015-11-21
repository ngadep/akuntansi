<?php

namespace Akuntansi\Models;

use Illuminate\Database\Eloquent\Model;

class JournalHistory extends Model
{

    protected $fillable =['company_id','account_id','month','year'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
