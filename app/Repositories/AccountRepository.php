<?php
namespace Akuntansi\Repositories;

use Akuntansi\Models\Account;
use Akuntansi\Models\Category;
use Akuntansi\Models\Company;
use Akuntansi\Models\JournalHistory;

class AccountRepository
{
    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company->find(session('perusahaan_aktif'));
    }

    public function listAccount()
    {
        return Category::join('groups','categories.id', '=', 'groups.category_id')
            ->join('accounts', function($join){
                $join->on('groups.id', '=', 'accounts.group_id')
                    ->where('company_id','=',$this->company->id);
            })->select('accounts.id','accounts.code','categories.name as category_name',
                'groups.name as group_name','accounts.name as account_name')
            ->get();
    }

    public function fullJournalHistory()
    {
        return Category::join('groups','categories.id', '=', 'groups.category_id')
            ->join('accounts', 'groups.id', '=', 'accounts.group_id')
            ->join('journal_histories', function($join){
                $join->on('journal_histories.account_id', '=', 'accounts.id')
                    ->on('accounts.company_id', '=', 'journal_histories.company_id')
                    ->where('journal_histories.company_id','=',$this->company->id)
                    ->where('journal_histories.month','=',$this->company->month_period)
                    ->where('journal_histories.year','=',$this->company->year_period);
            })
            ->select('journal_histories.id',
                'journal_histories.company_id',
                'journal_histories.month',
                'journal_histories.year',
                'accounts.code',
                'accounts.name',
                'categories.debit_credit',
                'categories.balance_income',
                'journal_histories.beginning_balance',
                'journal_histories.debit',
                'journal_histories.credit',
                'journal_histories.ending_balance')
            ->get();
    }

    public function journalHistory(){
        return JournalHistory::where('company_id',$this->company->id)
            ->where('month',$this->company->month_period)
            ->where('year',$this->company->year_period);
    }

    public function beginningBalance()
    {
        $exist = $this->journalHistory()->count();

        if($exist){
            return $this->fulljournalHistory();
        }

        $accounts = Account::where('company_id', $this->company->id)->get();

        foreach ($accounts as $account) {
            JournalHistory::create([
                'company_id' => $this->company->id,
                'account_id' => $account->id,
                'month' => $this->company->month_period,
                'year' => $this->company->year_period,
            ]);
        }

        return $this->fulljournalHistory();
    }
}