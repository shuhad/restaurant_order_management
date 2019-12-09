<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Supplier;
use App\Receiving;
use \Auth, \Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceivingReportController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$suppliers = Supplier::lists('company_name', 'id');

			$receivingsReport = Receiving::all()->where('created_at', '=', date('Y-m-d'))->sortByDesc("id");
			return view('report.receiving')->with('receivingReport', $receivingsReport)
			->with('suppliers',$suppliers);
	}

	public function receivingsearched(Request $request)
	{
		$suppliers = Supplier::lists('company_name', 'id');
		//dd($request);
		$fromdate=$request['fromdate'];
		$todate=$request['todate'];
		$suppliername=$request['supplier'];
		//$thequery="SELECT * FROM sales WHERE created_at BETWEEN '" . $fromdate . "' AND  '" . $todate . "' ORDER by id DESC";
		$receivingsReport = Receiving::whereBetween('created_at', array($fromdate, $todate))
			->orWhere('supplier_id','=', $suppliername)
			->get()
			->sortByDesc("id");
        return view('report.receiving')->with('receivingReport', $receivingsReport)
        ->with('suppliers',$suppliers);
	}

	public function clearreceived()
	{
		
		$deleteID=$_GET['id'];
		DB::table('receivings')->delete($deleteID);

		
        $suppliers = Supplier::lists('company_name', 'id');

			$receivingsReport = Receiving::all()->where('created_at', '=', date('Y-m-d'))->sortByDesc("id");
			return view('report.receiving')->with('receivingReport', $receivingsReport)
			->with('suppliers',$suppliers);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
