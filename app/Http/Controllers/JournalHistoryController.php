<?php

namespace Akuntansi\Http\Controllers;

use Akuntansi\Models\JournalHistory;
use Akuntansi\Repositories\AccountRepository;
use Illuminate\Http\Request;
use Akuntansi\Http\Requests;
use Akuntansi\Http\Controllers\Controller;

class JournalHistoryController extends Controller
{
    protected $accounts;

    public function __construct(AccountRepository $accounts)
    {
        $this->middleware('auth');
        $this->middleware('company');
        $this->accounts = $accounts;
    }

    public function beginningBalance(Request $request)
    {
        $balance = collect($this->accounts->beginningBalance());

        $month = $balance->first()->month;
        $year = $balance->first()->year;
        $period = date("d F Y",mktime(0,0,0,$month,1,$year));

        $balanceIncome = $balance->groupBy('balance_income');

        $balance = $balanceIncome->get('balance');
        $balaceDC = $balance->groupBy('debit_credit');
        $balanceDebit = $balaceDC->get('debit');
        $balanceCredit = $balaceDC->get('credit');

        $income =$balanceIncome->get('income');
        $incomeDC = $income->groupBy('debit_credit');

        return view('accounts.begin',[
            'period'=>$period,
            'balanceDebits'=>$balanceDebit,
            'balanceCredits'=>$balanceCredit,
        ]);

    }

    public function postBeginningBalance(Request $request)
    {
        $values = $request->input('value');
        $value = ($request->input('name')== 'debit') ? $values : -$values;

        $journalHistory = JournalHistory::find($request->input('pk'));
        $journalHistory->beginning_balance = $value;
        $journalHistory->save();

        return response('{"success":"true"}',200);
    }

}
