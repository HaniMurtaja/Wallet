<?php
namespace App\Http\Controllers;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Account;


class ClientAuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getClientLogin()
    {
        
        if (auth()->guard('client')->user()) return redirect()->route('dashboard');
        return view('clients/login');
    }
    public function clientAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('client')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            \Session::put('success','Successfully Logged In');
            return redirect()->route('home');
        }else{
            \Session::put('error','Incorrect Credentials');
            return redirect()->route('login');
            
        }
    }
    public function getClientRegister()
    {
        if (auth()->guard('client')->user()) return redirect()->route('dashboard');
        return view('clients/register');
    }

    public function generate_string($strength = 16) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return $random_string;
    }

    public function clientRegister(Request $request)
    {
        $this->validate($request, [
             'name' => 'required|string|max:255',
            'contact'=>'required', 
            'email' => 'required|string|email|max:255|unique:users',
            'phonefield' => 'phone', 'phonefield_country' => 'required_with:phonefield', 'phonefield' => 'phone:custom_country_field', 'custom_country_field' => 'required_with:phonefield',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'date_format:Y-m-d|before:today',
            'avatar' => 'image',
        ]);
     
        // $client = Client::create(request(['names', 'contact','email', 'password']));
       $client = new Client();
        $client->names = $request->names;
        $client->contact=$request->contact;
        $client->email = $request->email;
        $client->password=$request->password;
        $client->phonefield=$request->phonefield;
        $client->birthdate=$request->birthdate;
        $client->image=$request->image;
        $all = $request->all();
        $year = $all['birthday_year'];
        $month = $all['birthday_month'];
        $day = $all['birthday_day'];
        $date = Carbon::createFromFormat('Y-m-d', $year.'-'.$month.'-'.$day);

        $request->request->add(['birth_day' => $date->format('Y-m-d')]);
      //  $client->secret_key = $secret_key;
        $client->save();
        $account = new Account();
        $account->client_id=$client->id;
        $account->balance=0.00;
        $account->save();
        
        auth()->login($client);
        \Session::put('success','Successfylly Registered');
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('login');
    }

}
