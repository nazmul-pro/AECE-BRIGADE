<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Eloquent\AddCV;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs   = \App\Eloquent\AddCV::select('id','title','details')->where('users_id',Auth::user()->id)->get();

        return view('layouts.app-internal.member', compact('cvs'));
    }
    public function cv()
    {
        // if (Input::has('details')) {
        //     $title = e(Input::get('title'));
        //     $details = e(Input::get('details'));

        //     $usersCV = new AddCV();
        //     // $userCV->tilte = $tilte;
        //     // $userCV->users_id = Auth::user()->id;
        //     // $userCV->p_name = Auth::user()->name;
        //     $usersCV->create([
        //         'users_id' => Auth::user()->id,
        //         'users_name' => Auth::user()->name,
        //         'title' => $title,
        //         'details' =>$details          
            

        //     ]);
            
        //     Flash::success('Your CV has been Updated.');
        //      return redirect()->route('member-cv');
        // }

        // $cvs   = \App\Eloquent\AddCV::all();

        // return view('layouts.app-internal.member', compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "hmm";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Input::has('details')) {
            $title = e(Input::get('title'));
            $details = e(Input::get('details'));

            $usersCV = new AddCV();
            // $userCV->tilte = $tilte;
            // $userCV->users_id = Auth::user()->id;
            // $userCV->p_name = Auth::user()->name;
            $usersCV->create([
                'users_id' => Auth::user()->id,
                'users_name' => Auth::user()->name,
                'title' => $title,
                'details' =>$details          
            

            ]);
            
            Flash::message('Your CV info has been Added.');
            return Redirect::to('resume');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "bal";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cvs = AddCV::findOrFail($id);

        return view('layouts.app-internal.cvEdit',compact('cvs'));
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
        if (Input::has('details')) {
            $title = e(Input::get('title'));
            $details = e(Input::get('details'));

            $usersCV = new AddCV();
            // $userCV->tilte = $tilte;
            // $userCV->users_id = Auth::user()->id;
            // $userCV->p_name = Auth::user()->name;
           
            DB::table('users_cv')
            ->where('id', $id)
            ->update(['title' => $title,'details' => $details]);
            

            
            
            Flash::message('Your CV info has been Updated.');
            return Redirect::to('resume');
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
        $delete = AddCV::FindOrFail($id);
        $delete->delete();

        // redirect
        Flash::message('Your CV info has been deleted.');
        return Redirect::to('resume');
    }
    public function viewResume($id){
               $cvs   = \App\Eloquent\AddCV::select('id','title','details')->where('users_id',$id)->get();
               $users = \App\Eloquent\User::select('id','name','email','avatar')->where('id',$id)->get();
               //return "ok";
        return view('layouts.app-internal.member-resume')->with(compact('cvs', 'users'));

    }
    public function members(){
        return view('layouts.app-internal.members');
    }
}
