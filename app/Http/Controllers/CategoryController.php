<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Auth, \Redirect, \Validator, \Input, \Session, \Hash;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('categoryName', 'asc')->get();
            return view('category.index')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
                $category = new Category;
                $category->categoryName = Input::get('name');
                
                $category->save();
                
                Session::flash('message', 'You have successfully added Category');
                return Redirect::to('expense-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
            return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $rules = array(
            'name' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) 
            {
                 return Redirect::to('category/' . $id . '/edit')
                ->withErrors($validator);
            } else {
                $category = Category::find($id);
                $category->categoryName = Input::get('name');
                
                $category->save();
                // redirect
                Session::flash('message', 'You have successfully updated Category');
                return Redirect::to('expense-category');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
                $category = Category::find($id);
                $category->delete();
                // redirect
                Session::flash('message', 'You have successfully deleted Category');
                return Redirect::to('expense-category');
           
    }
}
