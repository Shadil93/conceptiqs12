<?php

namespace App\Http\Controllers\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Models\Configuration\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\portfolio;

class LoginController extends Controller
{
    public function dashboard()
    {
    return view('configuration.dashboard');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function profile()
    {
        return view('configuration.profile');
    }

    public function __construct()
    {

        if (Auth::check()) {
            return Redirect::to('admin/dashboard')->send();
        }
    }

    public function showLoginForm()
    {
        
        if (Auth::check()) {

            return Redirect::to('dashboard')->send();
        } else {
            return view('login');
        }
    }
    

    public function Adminlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if ((Auth::attempt(["username" => $request->username, "password" => $request->password, 'status' => 1]))) {


            $auth = true;

            if (Auth::user()->role == 1) {
                return response()->json(["status" => true, "redirect_location" => url("/dashboard")]);
            }
        } else {
               //return redirect()->back()->with('message', 'Invalid credentials! Please Enter valid Password');
            return response()->json([
                'status' => true,
                'message' => 'Username or password incorrect'
            ], 500);
        }
        
    }  
    

    public function logout()
    {
      
        Auth::logout();
        Session::flush();

        return redirect('login');
    }

    


    public function register(){
        return view('configuration.register');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        //    dd($request->all());
        if (!(Hash::check($request->get('oldPassword'), Auth::user()->password))) {

            // The passwords mismatches
            return response()->json([
                'error' => ' password Error.', "status" => false,
                'message' => 'Old password incorrect'

            ], 500);
        } else {

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('newPassword'));
            $user->save();

            return response()->json(["status" => true, "redirect_location" => url("admin/profile")]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileUpdate(Request $request)
    {

        $message = "You Have Made No Changes To Save";
        $status = false;
    

        $id = $request->emp_id ;
        $user = User::find(Auth::user()->id);

         if($request->hasFile('image'))
         {

 
        $destination='admin/profilepic/'.$user->image;
            if(file::exists($destination))
                {

            file::delete($destination);

                }

             $file=$request->file('image');
             $extension=$file->getClientOriginalExtension();
             $filename=time().'.'.$extension;
             $file->move('admin/profilepic/',$filename);
             $user->image=$filename;
            }
         
            $user->save();


            if ($user->wasChanged()) {
                $message = "You Have Successfully Updated";
                $status = true;
                }


            return response()->json( [
            'status' => $status,
            'message' => $message,
           'image'=>$user->image
        ]);
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
