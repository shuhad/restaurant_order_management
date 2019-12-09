<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Category;
use \Auth, \Redirect;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller {

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
			$categories = Category::lists('categoryName', 'id');
			$expenseReport = Expense::all()->where('created_at', '=', date('Y-m-d'))->sortByDesc("id");
			return view('report.expense')->with('expenseReport', $expenseReport)
			->with('categories',$categories);
	}

	public function expensesearched(Request $request)
	{
		//dd($request);
		$categories = Category::lists('categoryName', 'id');
		$fromdate=$request['fromdate'];
		$todate=$request['todate'];
		$categoryname=$request['categories'];
		//$thequery="SELECT * FROM sales WHERE created_at BETWEEN '" . $fromdate . "' AND  '" . $todate . "' ORDER by id DESC";
		$expenseReport = Expense::whereBetween('created_at', array($fromdate, $todate))
		->orWhere('categoryID', $categoryname)
		
		->get()->sortByDesc("id");
        return view('report.expense')->with('expenseReport', $expenseReport)
        ->with('categories',$categories);
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
