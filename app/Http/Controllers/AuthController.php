<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller 
{
    public function __construct()
    {
       // $this->middleware('guest')->except('logout');
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'], 'deleted_at' => null)))
        {
            $user_phone = is_numeric($request->input('username'));
            $userdata = '';
            if($user_phone) {
                $userdata = DB::table('users')->where('mobile',$request->input('username'))->first();
            }else {
                $userdata = DB::table('users')->where('email',$request->input('username'))->first();
            }
            if($userdata != null) {
                $this->setSessionData($request, $userdata);
                return response()->json(['status' => 200, 'data' => $userdata]);
            }
        }else{
            return response()->json(['status' => 500, 'msg' => 'Username or password does not match.']);
        }

    
    }

    public function register(registerRequest $req){
        $last_inserted_id = DB::table('users')
                            ->insertGetId(array(
                                'name' => $req->name,
                                'email' => $req->email,
                                'phone' => $req->phone,
                                'password' => bcrypt($req->password)
                            ));
            if($last_inserted_id) {
                if(DB::table('users_groups')->insert(array(
                    'user_id' => $last_inserted_id,
                    'group_id' => 2
                ))) {
                    return response()->json(['status' => 200, 'msg' => 'Your account created successfully']);
                }else {
                    return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
                }
            }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        session()->flush();
        return redirect('/');
        // return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    private function setSessionData($request, $data) {
        $userdata = json_decode(json_encode($data, true));
        $request->session()->put('user_id', $userdata->id);
        $request->session()->put('user_role', $userdata->role);
        $request->session()->put('first_name', $userdata->first_name);
        $request->session()->put('last_name', $userdata->last_name);
        $request->session()->put('contact_no', $userdata->mobile);
    }
}
