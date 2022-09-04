<?php

namespace App\Http\Controllers;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function restaurantPosLogin($token){
        try {
        $varifyUser = Login::where('login_token', $token)->first();
        if($varifyUser->login_token === $token){
            return response([
                'status' => true,
                'user' => $varifyUser,
                'message' => 'user verified successfully.'
            ]);
        }
        }catch (\Exception $exception) {
            report($exception);

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
    public function userPosLogout($id){
        try {
        $varifyUser = Login::where('id', $id)->first();
        if($varifyUser->id == $id){
            Login::where('id','=' ,$id)->update(['login_token' => 'NULL']);
            return response([
                'status' => true,
                'message' => 'Restaurant POS User Logout Successfully.'
            ]);
        }
        }catch (\Exception $exception) {
            report($exception);

            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
    /* public function userLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = Login::where('email','=',$email)->first();

        if($user AND Hash::check($password, $user->password)){

            $apikey = Str::random(40);
            Login::where('email', $request->email)->update(['remember_token' => "$apikey"]);

            return response()->json([
                'data' =>[
                    'isUserAuthenticated' => true,
                    'user' => $user,
                    'api_key' => $apikey,
                    'message' => 'User Login successfully.',
                ]
            ]);
        }else{
            return response()->json([
                'data' =>[
                    'isUserAuthenticated' => false,
                    'message' => 'Your are not a valid user !',
                ]
            ]);
        }


    } */
}
