<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view("index",compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        return view("ragistration");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'confirm_email'=>'same:email',
            'phone'=>'required|numeric|digits:10|unique:users,phone',
            'confirm_phone'=>'same:phone',
            'password'=>'required|min:6',
            'confirm_password' => 'same:password'
            
        ],[
            'email.unique'=>"This email is already Ragistered",
            'phone.unique'=>"This number is already Ragistered"
        ]
        );
       
        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
            ]);

            return redirect()->route('user.index');

    }
        

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }

    public function login(){
        return view('/login');
    }

    public function checkLogin(Request $request){
          
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt( $credentials)){
            $request->session()->regenerate();

            return redirect()->route('user.index');
        }else{
            return back()->withErrors([
                'email' => 'Invalid Username and password'
            ]);
        }

    }
}
