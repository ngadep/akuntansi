<?php

namespace Akuntansi\Http\Controllers;

use Illuminate\Http\Request;
use Akuntansi\Http\Controllers\Controller;
use Akuntansi\Repositories\AccountRepository;
use Akuntansi\Http\Requests;
use Akuntansi\Models;

class AccountController extends Controller {

	protected $accounts;
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct(AccountRepository $accounts)
    {
        $this->middleware('auth');
		$this->middleware('company');
		$this->accounts = $accounts;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('accounts.index',[
			'accounts'=> $this->accounts
                ->listAccount()
		]);
    }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $groups = Models\Group::all();
        $data =[
            'header'=>'Buat Perkiraan Baru',
            'method'=>'POST',
            'action'=>'/accounts',
            'groups'=>$groups,
        ];

		return view('accounts.edit',$data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
        $this->validate($request,[
            'code'=>'required|max:10',
            'name'=>'required|max:255',
        ]);

        $request->user()->accounts()->create([
            'company_id'    => $request->session()->get('perusahaan_aktif'),
            'group_id'      => $request->group_id,
            'code'          => $request->code,
            'name'          => $request->name,
        ]);

        return redirect('/accounts');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $account = Models\Account::find($id);
        $groups = Models\Group::all();
        $data =[
            'account'=>$account,
            'header'=>'Edit Nama Perkiraan',
            'method'=>'POST',
            'hidden'=>method_field('PUT'),
            'action'=>'/accounts/'.$id,
            'groups'=>$groups,
            'disable'=>'disabled',
        ];

        return view('accounts.edit',$data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$account =Models\Account::find($id);
        $account->name = $request->name;
        $account->save();
        return redirect('/accounts');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$account =Models\Account::find($id);
		$account->delete();
		return redirect('/accounts');
	}


}
