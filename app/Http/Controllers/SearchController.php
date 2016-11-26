<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquent\Status;
use App\Eloquent\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Purifier;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Input::has('search')){
            $query = e(Input::get('search'));
            // return $query;
            $result1 = Status::select('id','title','p_name','created_at')->where('title','LIKE','%'.$query.'%')->orWhere('p_name','LIKE','%'.$query.'%')->orderBy('created_at', 'DESC')->get();
            $result2 = User::select('id','name','avatar','email','created_at')->where('name','LIKE','%'.$query.'%')->get();
            $test = 'ok';

            return view('layouts.app-internal.search-result',compact('result1','test','result2'));


       }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
