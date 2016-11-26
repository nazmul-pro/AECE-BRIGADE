<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Eloquent\Status;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Purifier;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function login()
    {
        return view('index');
    }

    public function index()

    {

        
        if (Input::has('follow_status')) {
            $status = Input::get('follow_status');

            $selectedStatus = Status::find($status);
            $checkFollower = \App\Eloquent\Followers::where('users_id',Auth::user()->id)
                           ->where('follower',Auth::user()->name)
                           ->where('status_id',$status)
                           ->first();
            if(is_null($checkFollower)){
               $selectedStatus->followers()->create([
            
            'users_id' => Auth::user()->id,
            'follower' => Auth::user()->name,
            'state'    =>'Follow'        

            ]); 
               Flash::success('You Follow This Post.');
            }
            else{
                $checkFollower->delete();
                Flash::success('You UnFollow This Post.');
            }


           //return Redirect::route('home', array('check' => $checkFollower));
         return redirect()->route('home');
        }

        if (Input::has('status-text')) {
            $text =Input::get('status-text');
            $title = e(Input::get('title'));

            $userStatus = new Status();
            $userStatus->status_text = $text;
            $userStatus->title = $title;
            $userStatus->users_id = Auth::user()->id;
            $userStatus->p_name = Auth::user()->name;
            // $userStatus->postNotifications()->create([
            // 'where' => 'AECE',
            // 'n_name' => Auth::user()->name,
            // 'what' =>'Posted'
            

            // ]);
            $userStatus->save();

           

            $userStatus->postNotifications()->create([
            'where' => 'AECE',
            'n_name' => Auth::user()->name,
            'what' =>'Posted',
            'status_id' => 1
            

            ]);
            $userStatus->save();

            Flash::success('Your Status has been Updated.');
            return redirect()->route('home');
        }
        

        
    

        if (Input::has('post_comment')) {
           $status = Input::get('post_comment'); 
           $poster_name = Input::get('poster_name'); 
           $commentBox = Input::get('comment_text');
           $selectedStatus = Status::find($status);

           $selectedStatus->comments()->create([
            'comment_text' => $commentBox,
            'user_id' => Auth::user()->id,
            'c_name' => Auth::user()->name,
            'status_id' => $status

            ]);
           //$userStatus = new Status();
          // $userStatus = Status::find($status);
           //$p_name = DB::table('users_status')->select('p_name')->where('id', '=', $status)->get();
           $selectedStatus->postNotifications()->create([
            'where' => 'AECE',
            'n_name' => Auth::user()->name,
            'what' =>'Commented',
            
            'p_name' =>  $poster_name

            ]);
            Flash::message('Your Comment has been posted.');
            return redirect()->route('home');
           
            


        }
        return view('home',['top_15_posts' => Status::orderBy('created_at', 'DESC')->get()->take(150)]);
        //return view('home',['top_15_posts' => Status::where('users_id', '=', Auth::user()->id)->get()]);
        
        //dd(Auth::user());
        
    }
    public function notifications(){

        //$show = \App\Eloquent\PostNotifications::all();
       // $select = \App\Eloquent\PostNotifications::all();
       // return view('notifications',  compact('show','select'));



        return view('notifications',['top_15_noti' => Status::all()->take(15)]);
    }
    public function show($id){
            //$fullPost = \App\Eloquent\Status::findOrFail($id);
             //view('layouts.app-internal.full_status_layout', compact('fullPost'));
            return view('layouts.app-internal.full_status_layout', [
            
            //'user'   => \App\Eloquent\User::select('name')->where('name',Auth::user()->name)->get(),
            'followers'   => \App\Eloquent\Followers::select('status_id')->where('follower',Auth::user()->name)->get(),
            'status_id'   => \App\Eloquent\Status::select('id')->get(),
            'comments' => \App\Eloquent\StatusComments::where('status_id', $id)->get(),
            'status' => \App\Eloquent\Status::findOrFail($id)


            ]);
    }
public function postAction($id){
            if (Input::has('follow_status')) {
            $status = Input::get('follow_status');

            $selectedStatus = Status::find($status);
            $checkFollower = \App\Eloquent\Followers::where('users_id',Auth::user()->id)
                           ->where('follower',Auth::user()->name)
                           ->where('status_id',$status)
                           ->first();
            if(is_null($checkFollower)){
               $selectedStatus->followers()->create([
            
            'users_id' => Auth::user()->id,
            'follower' => Auth::user()->name,
            'state'    =>'Follow'        

            ]); 
               Flash::success('You Follow This Post.');
            }
            else{
                $checkFollower->delete();
                Flash::success('You UnFollow This Post.');
            }
            return Redirect::back();
          }


            if (Input::has('post_comment')) {
           $status = Input::get('post_comment'); 
           $poster_name = Input::get('poster_name'); 
           $commentBox = Input::get('comment_text');
           $selectedStatus = Status::find($status);

           $selectedStatus->comments()->create([
            'comment_text' => $commentBox,
            'user_id' => Auth::user()->id,
            'c_name' => Auth::user()->name,
            'avatar' => Auth::user()->avatar,
            'status_id' => $status

            ]);
           //$userStatus = new Status();
          // $userStatus = Status::find($status);
           //$p_name = DB::table('users_status')->select('p_name')->where('id', '=', $status)->get();
           $selectedStatus->postNotifications()->create([
            'where' => 'AECE',
            'n_name' => Auth::user()->name,
            'what' =>'Commented',
            
            'p_name' =>  $poster_name

            ]);
            //Flash::message('Your Comment has been posted.');
            //return redirect()->route('postView.show')->with('id',$id);
            return Redirect::back();
          }
    }
    public function destroy($id)
    {
        $delete = Status::FindOrFail($id);
        $delete->delete();

        // redirect
        Flash::message('Your Status has been deleted.');
        return Redirect::to('home');
    }
        public function edit($id)
    {
         $status = Status::findOrFail($id);
         if($status->users_id == Auth::user()->id){

            return view('layouts.app-internal.full_status_edit_layout',compact('status'));
         }
         else
          return "no you are not";

        
    }
    public function update(Request $request, $id)
    {
      
        if (Input::has('status-text')) {
            $title = e(Input::get('title'));
            $status_text = Input::get('status-text');
 
            DB::table('users_status')
            ->where('id', $id)
            ->update(['title' => $title,'status_text' => $status_text]);

            
            
            Flash::message('Your Status has been Updated.');


        return Redirect::route('postView.show',$id);
    // $test1 = '<script src=http://www.example.com/malicious-code.js></script>';
    // $test = Purifier::clean($test1);
    // return $test;
       } 
    }



}
