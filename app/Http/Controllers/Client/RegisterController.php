<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerifyOtpRequest;
use App\Mail\OtpMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create(){
        return view('client.register.create');
    }

    public function sendMail(Request $request){


        $this->validate($request,[
            'email'=>['required','email']
        ]);


        $otp=random_int(11111,99999);

         $user=null;
         $userQuery=User::query()->where('email',$request->get('email'));
         if($userQuery->exists()){
             $user=$userQuery->first();
             $user->update([
                 'password'=>bcrypt($otp)
             ])           ;
         }
         else{
             $user=User::query()->create([
                 'email'=>$request->get('email'),
                 'role_id'=>Role::findByTitle('user')->id,
                 'password'=>bcrypt($otp),
             ]);
         }


        //send otp by email to user
        Mail::to($user->email)->send(new OtpMail($otp));


        return redirect(route('client.register.otp',$user));
    }

    public function otp(User $user){
        return view('client.register.otp',[
            'user'=>$user
        ]);

    }


    public function verifyOtp(VerifyOtpRequest $request,User $user){
        if(!HASH::check($request->get('otp'),$user->password)){
            return back()->withErrors(['otp'=>'کد اشتباه است']);
        }
        else{ auth()->login($user);
            return redirect(route('client.index'));
    }}

    public function logout(){
        auth()->logout();
        return redirect(route('client.index'));
    }
}
