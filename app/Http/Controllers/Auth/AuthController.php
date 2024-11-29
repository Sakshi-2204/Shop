<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

use App\Models\User;

use Hash;



class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */



     public function registration()

     {

         return view('auth.registration');

     }

     public function postRegistration(Request $request)

     {

        $validator = Validator::make($request->all(), [
            'name' => 'required',

            'email' => 'required|email|unique:users',

            'phone_number'=>'required|numeric|digits:10|unique:users',

            'password' => 'required|min:6',

            'user_type' => 'required',
        ]);

        // dd( $validator, $request);

        // if ($validator->fails()) {
        //     // return response()->json(['status'=>'success','errors' => $validator->errors()], 422);
        //     return response()->json(['status'=>'error','message' => 'Validation Error', 'errors' => $validator->errors()], 201);
        // }


        $user = User::create([

         'name' => $request->name,

         'email' => $request->email,

         'phone_number' => $request->phone_number,

         'password' => Hash::make($request->password),

         'user_type'=> $request->role == 'admin' ? 1: 2
        ]);

if ($user->user_type == '1') {

    return view("login")->withSuccess('Welcome Admin');

  } else if ($user->user_type == '2') {

    return view("dash.dashboard")->withSuccess('welcome User');

  } else {


return ['result'=>"register failed"];
  }
     }




    public function index()

    {
        if(Auth::user()){
            return redirect('/dashboard');

        }

        return view('auth.login');

    }



    /**

     * Write code on Method

     *

     * @return response()

     */





    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

            // 'user_type' => 'required|in:admin,user'

        ]);

        $loginField = $request->get('email');
        $password = $request->get('password');
        // $role = $request->get('user_type');

        $credentials = [];
        if (is_numeric($loginField)) {
            $credentials = ['phone_number' => $loginField, 'password' => $password ];
        } else {
            $credentials = ['email' => $loginField, 'password' => $password ];
        }



        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')

                        ->withSuccess('You have Successfully loggedin');

        }


         return redirect("login")->withErrors(['login' => 'Oops! You have entered invalid credentials']);

    }

    /**

     * Write code on Method

     *

     * @return response()

     */



    /**

     * Write code on Method

     *

     * @return response()

     */

     public function dashboard()

    {

        if(Auth::check()){

            return view('dashboard');

        }



        return redirect("login")->withSuccess('Opps! You do not have access');

    }


    public function adminDashboard()
    {
        return view('dash.admin', [
            'users' => DB::table('users')->simplePaginate(7)
        ])->with('i', (request()->input('page', 1) - 1) * 5);



        // return view('dash.admin',compact('users'))

        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    /**

     * Write code on Method

     *

     * @return response()

     */





    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();



        return Redirect('login');

    }

}
