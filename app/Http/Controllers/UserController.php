<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserController extends Controller
{
       /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $users = User::all();
 
       return $users;
   }
 
   /**
    * Store a newly created resource in storage.
    *
    */
   public function store(Request $request)
   {
       $userData = $request->all();
       $user = User::create($userData);
 
       return $user;
   }

   protected function signup(Request $data)
   {
       return User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
           'phone' => $data['phone'],
           'country' => $data['country'],
           'city' => $data['city'],
           'postcode' => $data['postcode'],
           'address' => $data['address'],
       ]);
   }

    public function signin()
    {
        $credentials = request(['email', 'password']);
 
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
 
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
