<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Eloquent\Status;
use App\Eloquent\User;
use App\Eloquent\UploadDoc;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs   = \App\Eloquent\UploadDoc::all();

        return view('layouts.app-internal.uploadFile', compact('docs'));

    }
    public function showFileUpload(Request $request)
    {
        if (Input::hasFile('image')){
            $title = Input::get('title');
            $file = $request -> file('image');
            $fileArray = array('image' => $file);
            $rules = array(
                'image' => 'mimes:pdf,docx|required|max:10000' // max 10000kb
             );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()){
                Flash::success('Please Select A Valid File(pdf,docx only).');

            }
            else{
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileReName = 'acb_'.time().rand(11111, 99999) . '_'.rand(11111, 99999).'.'.$extension;
                $destinationPath = 'assets/uFiles';
                $file->move($destinationPath,$fileReName);
                $fileUploader = new UploadDoc();
                $fileUploader->create([
            
                    'user_id' => Auth::user()->id,
                    'username' => Auth::user()->name,
                    'title'    =>   $title ,
                    'o_name' =>    $fileName,
                    'r_name' =>    $fileReName

                    ]); 
                       Flash::success('Your Document has been Posted.');
                    }
                    
            }

        else{
            Flash::success('No File Selected.');
        }

        //return view('layouts.app-internal.uploadFile');
        return Redirect::back();



        
        // $file = $request -> file('image');
        // echo 'File Name:'.$file->getClientOriginalName();
        // echo '<br>';

        // echo 'File Ext:'.$file->getClientOriginalExtension();
        // echo '<br>';

        // echo 'File Path:'.$file->getRealPath();
        // echo '<br>';

        // echo 'File Size:'.$file->getSize();
        // echo '<br>';

        // echo 'File Type:'.$file->getMimeType();
        // echo '<br>';
        // $extension = $file->getClientOriginalExtension();
        // $fileName = $file->getClientOriginalName();
        // $fileReName = 'acb_'.time().rand(11111, 99999) . '_'.rand(11111, 99999).'.'.$extension;
        // $destinationPath = 'assets/uFiles';
        // $file->move($destinationPath,$fileReName);


        // $destinationPath = 'assets/uFiles'; // upload path
        // $name = $file->getClientOriginalName(); // getting original name
        // $extension = $file->getClientOriginalExtension(); // getting fileextension
        // $fileName = time().rand(11111, 99999) . '.' . $extension; // renaming image
        
        // $file->move($destinationPath.'/'.$fileName); // uploading file to given path

        // $file = Input::file('photo');

        // // Build the input for validation
        // $fileArray = array('image' => $file);

        // // Tell the validator that this file should be an image
        // $rules = array(
        //   'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        // );

        // // Now pass the input and rules into the validator
        // $validator = Validator::make($fileArray, $rules);

        // // Check to see if validation fails or passes
        // if ($validator->fails())
        // {
        //       // Redirect or return json to frontend with a helpful message to inform the user 
        //       // that the provided file was not an adequate type
        //       return response()->json(['error' => $validator->errors()->getMessages()], 400);
        // } else
        // {
        //     // Store the File Now
        //     // read image from temporary file
        //     Image::make($file)->resize(300, 200)->save('foo.jpg');
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
    public function profile()
    {
        $docs   = \App\Eloquent\UploadDoc::all();

        return view('layouts.app-internal.profile',array('user' => Auth::user()));

    }
    public function updateProfile(Request $request)
    {
        if (Input::hasFile('avatar')){
            //$title = Input::get('title');
            $file = $request -> file('avatar');
            $fileArray = array('avatar' => $file);
            $rules = array(
                'avatar' => 'mimes:jpeg,jpg,png,gif|required|max:3000' // max 10000kb
             );
            $validator = Validator::make($fileArray, $rules);
            if ($validator->fails()){
                Flash::success('Please Select A Valid Image(jpeg,png only and 3MB max).');

            }
            else{
                $extension = $file->getClientOriginalExtension();
                $fileName = $file->getClientOriginalName();
                $fileReName = 'acb_'.time().rand(11111, 99999) . '_'.rand(11111, 99999).'.'.$extension;
                $destinationPath = 'assets/avatars';
                $file->move($destinationPath,$fileReName);

                $id = $request->input('user_id');
                $user = User::find($id);
                $user->avatar = $fileReName;
                $user->save();
 
                Flash::success('Welcome To New Avatar ');
                    }
                    
            }

        else{
            Flash::success('No File Selected.');
        }
        return Redirect::back();
        
    }





}
