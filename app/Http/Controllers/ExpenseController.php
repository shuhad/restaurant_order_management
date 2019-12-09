<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Expense;
use App\Category;
use App\Http\Requests\ExpenseStoreRequest;
use App\Http\Requests\ExpenseUpdateRequest;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;
use Illuminate\Http\Request;

class ExpenseController extends Controller {

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
			$expense = Expense::all();
			return view('expense.index')->with('expense', $expense);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::orderBy('categoryName', 'asc')->lists('categoryName', 'id'); 
		return view('expense.create')-> with('categories',$categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ExpenseStoreRequest $request)
	{
	            // store
	            $expense = new Expense;
	            $expense->title = Input::get('title');
	            $expense->price = Input::get('price');
	            $expense->categoryID = Input::get('categoryID');
	            $expense->save();
	            
	            Session::flash('message', 'You have successfully added expense');
	            return Redirect::to('expense');
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
		$categories = Category::lists('categoryName', 'id');
		$expense = Expense::find($id);
        return view('expense.edit')
            ->with('expense', $expense)
            ->with('categories', $categories);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
			
			$rules = array(
			'title' => 'required',
			'price' => 'required',
			
			);
			$validator = Validator::make(Input::all(), $rules);
			if ($validator->fails()) 
			{
				 return Redirect::to('expense/' . $id . '/edit')
				->withErrors($validator);
			} else {
	            $expense = Expense::find($id);
	            $expense->title = Input::get('title');
	            $expense->price = Input::get('price');
	            $expense->categoryID = Input::get('categoryID');
	            $expense->save();
	            // redirect
	            Session::flash('message', 'You have successfully updated expense');
	            return Redirect::to('expense');
	        }
	    
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
				
			try 
			{
				$expense = Expense::find($id);
		        $expense->delete();
		        // redirect
		        Session::flash('message', 'You have successfully deleted expense');
		        return Redirect::to('expense');
	    	}
	    	catch(\Illuminate\Database\QueryException $e)
    		{
        		Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
        		Session::flash('alert-class', 'alert-danger');
		        return Redirect::to('expense');	
	    	}
	   
	}

}
