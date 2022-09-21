<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Job;
use App\Models\Level;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $job=Job::get()->count();
        $level=Level::get()->count();
        $candidate=Candidate::get()->count();
        $candidates=Candidate::paginate(3);
        // dd($candidates);
        // dd($candidates);
        return view('home',compact('job','level','candidate','candidates'));
    }
    public function changepass(){
        return view('usermanagement.change_password');
    }
    function changepassword(Request $request){
        // $request->validate([
        //     'current_password' => ['required', new MatchOldPassword],
        //     'new_password' => ['required'],
        //     'new_confirm_password' => ['same:new_password'],
        // ]);

        $request->validate([
            'current_password' =>'required|string|min:6|max:10',
            'new_password' => 'required|string|min:6|max:10|same:new_confirm_password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{3,10}$/',
            'new_confirm_password' => 'required|string|min:8',
        ],[
            'required'=>'Chưa nhập :attribute',
            'min'=>'Nhập sai :attribute',
            'max'=>'Nhập sai :attribute',
            'same'=>'Nhập sai :attribute',
            'regex'=>'Nhập sai :attribute',
        ],
        [
            'current_password'=>'Old pass',
            'new_password'=>'New pass',
            'new_confirm_password'=>'Confirm pass',
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        // Toastr::success('User change successfully :)','Success');
        return redirect()->route('home')->with('status', 'Reset password thành công');
    }
}
