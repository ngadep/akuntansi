<?php

namespace Akuntansi\Http\Controllers;

use Akuntansi\Repositories\JournalRepositoy;
use Illuminate\Http\Request;

use Akuntansi\Http\Requests;
use Akuntansi\Http\Controllers\Controller;

class JournalController extends Controller
{

    protected $journal;

    public function __construct(JournalRepositoy $journal)
    {
        $this->middleware('auth');
        $this->middleware('company');
        $this->journal = $journal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $company = $this->journal->getCompany();

        $month = $company->month_period;
        $year = $company->year_period;
        $period = date("F Y",mktime(0,0,0,$month,1,$year));
        $jurnal = $this->journal->listJournal()->paginate(10);

        return view('journals.index',[
            'period'=> $period,
            'journals'=>$jurnal,
        ]);
    }

    /**
     * todo: display detail journal
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $data = $this->journal->detailJournal($id);
        return response()->json($data);
    }

    public function getNew()
    {

    }

    /**
     * todo: save new journal
     *
     * @param Request $request
     */
    public function postIndex(Request $request)
    {

    }
}
