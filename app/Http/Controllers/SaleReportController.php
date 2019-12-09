<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use \Auth, \Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SaleReportController extends Controller {

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
		
			$salesReport = Sale::all()->where('created_at', '=', date('Y-m-d'))->sortByDesc("id");
			return view('report.sale')->with('saleReport', $salesReport);
	}

	public function searched(Request $request)
	{
		//dd($request);
		$fromdate=$request['fromdate'];
		$todate=$request['todate'];
		//$thequery="SELECT * FROM sales WHERE created_at BETWEEN '" . $fromdate . "' AND  '" . $todate . "' ORDER by id DESC";
		$salesReport = Sale::whereBetween('created_at', array($fromdate, $todate))->get()->sortByDesc("id");
        return view('report.sale')->with('saleReport', $salesReport);
	}

	public function deletesale()
	{
		
		$deleteID=$_GET['id'];
		DB::table('sales')->delete($deleteID);

		
        $salesReport = Sale::all()->where('created_at', '=', date('Y-m-d'))->sortByDesc("id");
			return view('report.sale')->with('saleReport', $salesReport);
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
