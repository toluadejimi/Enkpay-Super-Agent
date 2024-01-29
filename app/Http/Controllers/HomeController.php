<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use App\Models\Charge;
use App\Models\Device;
use App\Models\SoldLog;
use App\Models\Category;
use App\Models\Instance;
use App\Models\Terminal;
use App\Models\SuperAgent;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\ManualPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{


    public function home(request $request)
    {

        $under_code = SuperAgent::where('user_id', Auth::id())->first()->register_under_id;
        $super_agent_id = SuperAgent::where('user_id', Auth::id())->first()->id;

        $today = Carbon::today();
        $month = Carbon::now()->month;


        $data['customers'] = User::where('register_under_id', $under_code)->count();
        $data['transactions'] = Transaction::latest()->where('register_under_id', $under_code)->paginate('50');
        $data['total_in_transaction'] = Transaction::where([
                'register_under_id' => $under_code,
                'status' => 1,
            ])->sum('credit');


        $data['total_in_month_transaction'] = Transaction::where([
                'register_under_id' => $under_code,
                'created_at' => $today,
                'status' => 1,

        ])->sum('credit');



        $data['total_out_month_transaction'] = Transaction::where([
                'register_under_id' => $under_code,
                'created_at' => $today,
                'status' => 1,
            ])->sum('debit');


        $data['total_out_transaction'] = Transaction::where([
                'register_under_id' => $under_code,
                'status' => 1,
        ])->sum('debit');



        return view('home', $data);
    }


    public function add_new_customer(request $request)
    {
        return view('add-new-customer');
    }


    public function add_new(request $request)
    {

        $ck_email = User::where('email', $request->email)->first()->email ?? null;
        $ck_phone = User::where('phone', $request->phone)->first()->email ?? null;
        $ck_status = User::where('phone', $request->phone)->first()->status ?? null;
        $ck_status = User::where('email', $request->email)->first()->status ?? null;
        $sup = SuperAgent::where('user_id', Auth::id())->first();


        if ($ck_email == $request->email && $ck_status == 2) {

            return back()->with('error', 'User Already Exist');
        }

        if ($ck_email == $request->phone && $ck_status == 2) {

            return back()->with('error', 'User Already Exist');
        }



        if ($ck_email == $request->email && $ck_status == 0) {

            return back()->with('error', 'User Already Exist, Account needs verification');
        }

        if ($ck_email == $request->phone && $ck_status == 0) {

            return back()->with('error', 'User Already Exist, Account needs verification');
        }


        $password = "123456";
        $pin = "1234";



        $create = new User();
        $create->first_name = $request->first_name;
        $create->phone = $request->phone;
        $create->last_name = $request->last_name;
        $create->dob = $request->dob;
        $create->gender = $request->gender;
        $create->email = $request->email;
        $create->street = $request->street;
        $create->hos_no = $request->hos_no;
        $create->address_line1 = $request->address_line1;
        $create->city = $request->city;
        $create->state = $request->state;
        $create->lga = $request->lga;
        $create->lga = $request->lga;
        $create->register_under_id = $sup->register_under_id;
        $create->password = bcrypt($password);
        $create->pin = bcrypt($pin);
        $create->save();

        return redirect('all-customers')->with('message', 'User created successfully');
    }







    public function index(request $request)
    {


        return view('welcome');
    }



    public function email_verification(request $request)
    {

        $email = User::where('email', $request->email)->first()->email ?? null;
        $status = User::where('email', $request->email)->first()->status ?? null;
        $sms_code = random_int(1000, 9999);



        if ($email == $request->email && $status == 2) {
            return back()->with('error', 'Email has already been taken');
        }




        $update_code = User::where('email', $request->email)
            ->update([
                'code' => $sms_code,
            ]);

        $data = array(
            'fromsender' => 'noreply@enkpay.com', 'EnkPay',
            'subject' => "One Time Password",
            'toreceiver' => $request->email,
            'sms_code' => $sms_code,
        );

        Mail::send('emails.registration.otpcode', ["data1" => $data], function ($message) use ($data) {
            $message->from($data['fromsender']);
            $message->to($data['toreceiver']);
            $message->subject($data['subject']);
        });


        if ($email != $request->email) {

            $usr = new User();
            $usr->email = $request->email;
            $usr->code = $sms_code;
            $usr->save();
        }

        $data['email'] = $request->email;

        return view('step2', $data);
    }








    public function code(Request $request)
    {

        $code = $request->one . $request->two . $request->three . $request->four;

        $email = $request->email;
        $code = $code;
        $get_code = User::where('email', $email)->first()->code ?? null;

        if ($code == $get_code) {

            $update = User::where('email', $email)
                ->update([
                    'is_email_verified' => 1,
                    'status' => 2,
                ]);

            return view('step3', compact('email'));
        } else {

            return back()->with('error', 'Invalid Otp');
        }
    }

    public function set_password(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|confirmed|',
        ]);

        $data = $request->all();

        $user = User::where('email', $request->email)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user2 = User::where('email', $request->email)->first();

        Auth::login($user2);


        return redirect('step4');
    }



    public function step_2(Request $request)
    {


        return view('step2');
    }
    public function step_3(Request $request)
    {


        return view('step3');
    }


    public function step_4(Request $request)
    {

        $data['devices'] = Device::where('user_id', Auth::id())->get();

        return view('step4', $data);
    }



    public function set_device(Request $request)
    {

        $dev = new  Device();
        $dev->device = $request->device;
        $dev->user_id = Auth::id();
        $dev->watt = $request->watt;
        $dev->save();


        $data['devices'] =  Device::where('user_id', Auth::id())->get();


        return back()->with('message', 'Device Added Successfully');
    }

    public function device(Request $request)
    {

        $data['device'] = Device::where('id', $request->device_id)->first();
        $device = Device::where('id', $request->device_id)->first();
        $data['activity'] = Instance::latest()->where('device_id', $request->device_id)->where('user_id', Auth::id())->take('5')->get();

        $time = Instance::where('device_id', $request->device_id)->whereDate('created_at', Carbon::today())->first() ?? null;


        $dateTime = Carbon::parse($time->created_at ?? null);
        $data['hour'] = $dateTime->hour ?? null;

        $getsec = Instance::where('device_id', $request->device_id)->sum('oh_hour') ?? null;
        $data['totalActive'] = $getsec / 3660;

        $ctime = Instance::where('device_id', $request->device_id)->whereDate('created_at', Carbon::today())->sum('oh_hour') ?? null;
        $aatime = $ctime / 3660 ?? null;




        $data['dailyConsumption'] = $device->watt / 1000 * ($aatime) ?? null;



        return view('device', $data);
    }



    public function device_delete(Request $request)
    {

        Device::where('id', $request->id)->delete();


        return redirect('step4')->with('error', 'Device Deleted Successfully');
    }



    public function update_on(request $request)
    {

        Device::where('id', $request->id)->update(['status' => 1]);

        $in = new Instance();
        $in->user_id = Auth::id();
        $in->device_id = $request->id;
        $in->status = 1;
        $in->save();


        return back()->with('message', 'Device on successfully');
    }



    public function update_off(request $request)
    {

        Device::where('id', $request->id)->update(['status' => 0]);

        $get_last_on = Instance::latest()->where('device_id', $request->id)->where('status', 1)->first()->created_at ?? null;
        $now = Carbon::now();
        $startDate = Carbon::parse($get_last_on);
        $endDate = Carbon::parse($now);
        $hour1 = $startDate->hour;
        $hour2 = $endDate->hour;

        $secondsDifference = $startDate->diffInSeconds($endDate);



        $in = new Instance();
        $in->user_id = Auth::id();
        $in->device_id = $request->id;
        $in->status = 0;
        $in->oh_hour = $secondsDifference;
        $in->save();

        return back()->with('error', 'Device off successfully');
    }

















    public function verify_email_otp(Request $request)
    {

        try {

            $user_id = Auth::id() ?? null;



            return response()->json([
                'status' => $this->failed,
                'message' => 'Invalid code, try again',
            ], 500);

            if ($code == $get_auth_code && $user_id == Auth::id()) {

                $update = User::where('id', $user_id)
                    ->update([

                        'is_email_verified' => 1,
                        'status' => 1,

                    ]);

                return response()->json([
                    'status' => $this->success,
                    'message' => 'OTP Code verified successfully',
                ], 200);
            }

            return response()->json([
                'status' => $this->failed,
                'message' => 'Invalid code, try again',
            ], 500);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }


    public function welcome_index(request $request)
    {

        $data['user'] = Auth::id() ?? null;
        $data['fbaged'] = Category::where('id', 1)->get();
        $data['insta_cat'] = Category::where('id', 2)->get();
        $data['ot'] = Category::where('id', 3)->get();
        $data['tw'] = Category::where('id', 5)->get();
        $data['rd'] = Category::where('id', 6)->get();
        $data['ml'] = Category::where('id', 7)->get();
        $data['gv'] = Category::where('id', 8)->get();
        $data['in'] = Category::where('id', 9)->get();
        $data['tk'] = Category::where('id', 12)->get();
        $data['ln'] = Category::where('id', 13)->get();
        $data['pv'] = Category::where('id', 14)->get();
        $data['oth'] = Category::where('id', 15)->get();
        $data['swr'] = Category::where('id', 16)->get();
        $data['snap'] = Category::where('id', 17)->get();
        $data['strem'] = Category::where('id', 18)->get();
        $data['resell'] = Category::where('id', 19)->get();
        $data['special'] = Category::where('id', 20)->get();










        $data['fbaged_items'] = Item::where('cat_id', 1)->take(5)->get();
        $data['insta_items'] = Item::where('cat_id', 2)->take(5)->get();
        $data['ot_items'] = Item::where('cat_id', 3)->take(5)->get();
        $data['tw_items'] = Item::where('cat_id', 5)->take(5)->get();
        $data['rd_items'] = Item::where('cat_id', 6)->take(5)->get();
        $data['ml_items'] = Item::where('cat_id', 7)->take(5)->get();
        $data['gv_items'] = Item::where('cat_id', 8)->take(5)->get();
        $data['in_items'] = Item::where('cat_id', 9)->take(5)->get();
        $data['tk_items'] = Item::where('cat_id', 12)->take(5)->get();
        $data['ln_items'] = Item::where('cat_id', 13)->take(5)->get();
        $data['pv_items'] = Item::where('cat_id', 14)->take(5)->get();
        $data['oth_items'] = Item::where('cat_id', 15)->take(5)->get();
        $data['swr_items'] = Item::where('cat_id', 16)->take(5)->get();
        $data['snap_items'] = Item::where('cat_id', 17)->take(5)->get();
        $data['strem_items'] = Item::where('cat_id', 18)->take(5)->get();
        $data['resell_items'] = Item::where('cat_id', 19)->take(5)->get();
        $data['special_items'] = Item::where('cat_id', 20)->take(5)->get();


        $data['categories'] = Category::all();




        $data['url'] = null;

        return view('welcome', $data);
    }



    public function fund_wallet(Request $request)
    {
        $user = Auth::id() ?? null;
        $transaction = Transaction::latest()->where('user_id', Auth::id())->paginate(10);


        return view('fund-wallet', compact('user', 'transaction'));
    }





    public function fund_manual_now(Request $request)
    {



        if ($request->receipt == null) {
            return back()->with('error', "Payment receipt is required");
        }


        $file = $request->file('receipt');
        $receipt_fileName = date("ymis") . $file->getClientOriginalName();
        $destinationPath = public_path() . 'upload/receipt';
        $request->receipt->move(public_path('upload/receipt'), $receipt_fileName);


        $pay = new ManualPayment();
        $pay->receipt = $receipt_fileName;
        $pay->user_id = Auth::id();
        $pay->amount = $request->amount;
        $pay->save();


        $message = Auth::user()->email . "| submitted payment receipt |  NGN " . number_format($request->amount) . " | on LOG MARKETPLACE";
        send_notification2($message);


        return view('confirm-pay');
    }


    public function confirm_pay(Request $request)
    {

        return view('confirm-pay');
    }





    public function fund_now(Request $request)
    {

        $request->validate([
            'amount'      => 'required|numeric|gt:0',
        ]);





        Transaction::where('user_id', Auth::id())->where('status', 1)->delete() ?? null;



        if ($request->type == 1) {

            if ($request->amount < 100) {
                return back()->with('error', 'You can not fund less than NGN 100');
            }


            if ($request->amount > 100000) {
                return back()->with('error', 'You can not fund more than NGN 100,000');
            }




            $key = env('WEBKEY');
            $ref = "LOG-" . random_int(000, 999) . date('ymdhis');
            $email = Auth::user()->email;

            $url = "https://web.enkpay.com/pay?amount=$request->amount&key=$key&ref=$ref&email=$email";


            $data                  = new Transaction();
            $data->user_id         = Auth::id();
            $data->amount          = $request->amount;
            $data->ref_id          = $ref;
            $data->type            = 2;
            $data->status          = 1; //initiate
            $data->save();


            $message = Auth::user()->email . "| wants to fund |  NGN " . number_format($request->amount) . " | with ref | $ref |  on LOG MARKETPLACE";
            send_notification2($message);

            return Redirect::to($url);
        }



        if ($request->type == 2) {

            if ($request->amount < 100) {
                return back()->with('error', 'You can not fund less than NGN 100');
            }


            if ($request->amount > 100000) {
                return back()->with('error', 'You can not fund more than NGN 100,000');
            }




            $ref = "LOG-" . random_int(000, 999) . date('ymdhis');
            $email = Auth::user()->email;


            $data                  = new Transaction();
            $data->user_id         = Auth::id();
            $data->amount          = $request->amount;
            $data->ref_id          = $ref;
            $data->type            = 6; //manual funding
            $data->status          = 1; //initiate
            $data->save();


            $message = Auth::user()->email . "| wants to fund Manually |  NGN " . number_format($request->amount) . " | with ref | $ref |  on LOG MARKETPLACE";
            send_notification2($message);

            $data['account_details'] = AccountDetail::where('id', 1)->first();
            $data['amount'] = $request->amount;

            return view('manual-fund', $data);
        }
    }


    public function verify_payment(request $request)
    {

        $trx_id = $request->trans_id;
        $ip = $request->ip();
        $status = $request->status;


        if ($status == 'failed') {


            $message = Auth::user()->email . "| Cancled |  NGN " . number_format($request->amount) . " | with ref | $trx_id |  on LOG MARKETPLACE";
            send_notification2($message);

            Transaction::where('ref_id', $trx_id)->where('status', 1)->update(['status' => 3]);
            return redirect('fund-wallet')->with('error', 'Transaction Declined');
        }




        $trxstatus = Transaction::where('ref_id', $trx_id)->first()->status ?? null;

        if ($trxstatus == 2) {

            $message =  Auth::user()->email . "| is trying to fund  with | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
            send_notification($message);

            $message =  Auth::user()->email . "| on LOG MarketPlace | is trying to fund  with | " . number_format($request->amount, 2) . "\n\n IP ====> " . $request->ip();
            send_notification2($message);



            return redirect('fund-wallet')->with('error', 'Transaction already confirmed or not found');
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://web.enkpay.com/api/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('trans_id' => "$trx_id"),
        ));

        $var = curl_exec($curl);
        curl_close($curl);
        $var = json_decode($var);

        $status1 = $var->detail ?? null;
        $amount = $var->price ?? null;




        if ($status1 == 'success') {

            $chk_trx = Transaction::where('ref_id', $trx_id)->first() ?? null;
            if ($chk_trx == null) {
                return back()->with('error', 'Transaction not processed, Contact Admin');
            }

            Transaction::where('ref_id', $trx_id)->update(['status' => 2]);
            User::where('id', Auth::id())->increment('wallet', $amount);

            $message =  Auth::user()->email . "| just funded NGN" . number_format($request->amount, 2) . " on Log market";
            send_notification($message);



            $order_id = $trx_id;
            $databody = array('order_id' => "$order_id");

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://web.enkpay.com/api/resolve-complete',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $databody,
            ));

            $var = curl_exec($curl);
            curl_close($curl);
            $var = json_decode($var);


            $message = Auth::user()->email . "| Just funded |  NGN " . number_format($request->amount) . " | with ref | $order_id |  on LOG MARKETPLACE";
            send_notification2($message);


            return redirect('fund-wallet')->with('message', "Wallet has been funded with $amount");
        }

        return redirect('fund-wallet')->with('error', 'Transaction already confirmed or not found');
    }





    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {


            $user = Auth::id() ?? null;
            return redirect('home');
        }

        return back()->with('error', "Email or Password Incorrect");
    }


    public function register_index(Request $request)
    {
        return view('register');
    }


    public function login_index(Request $request)
    {
        return view('login');
    }


    public function register(Request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Log in the user after registration (optional)
        auth()->login($user);

        // Redirect the user to a protected route or dashboard
        return redirect('/');
    }





    public function profile(request $request)
    {


        $user = Auth::id();
        $orders = SoldLog::latest()->where('user_id', Auth::id())->paginate(5);


        return view('profile', compact('user', 'orders'));
    }




    public function logout(Request $request)
    {

        Auth::logout();
        return redirect('/');
    }


    public function session_resolve(request $request)
    {


        $session_id = $request->session_id;
        $ref = $request->ref_id;


        $resolve = session_resolve($session_id, $ref);

        $status = $resolve[0]['status'];
        $amount = $resolve[0]['amount'];
        $message = $resolve[0]['message'];



        $trx = Transaction::where('ref_id', $request->ref_id)->first()->status ?? null;
        if ($trx == null) {

            $message = Auth::user()->email . "is trying to resolve from deleted transaction on LOG MarketPlace";
            send_notification($message);

            $message = Auth::user()->email . "is trying to reslove from deleted transaction on LOG MarketPlace";
            send_notification2($message);



            return back()->with('error', "Transaction has been deleted");
        }


        $chk = Transaction::where('ref_id', $request->ref_id)->first()->status ?? null;

        if ($chk == 2 || $chk == 4) {

            $message = Auth::user()->email . "is trying to steal hits the endpoint twice on LOG MarketPlace";
            send_notification($message);

            $message = Auth::user()->email . "is trying to steal hits the endpoint twice on LOG MarketPlace";
            send_notification2($message);

            return back()->with('message', "You are a thief");
        }


        if ($status == 'true') {

            User::where('id', Auth::id())->increment('wallet', $amount);
            Transaction::where('ref_id', $request->ref_id)->update(['status' => 4]);



            $ref = "LOG-" . random_int(000, 999) . date('ymdhis');


            $data                  = new Transaction();
            $data->user_id         = Auth::id();
            $data->amount          = $amount;
            $data->ref_id          = $ref;
            $data->type            = 2;
            $data->status          = 2;
            $data->save();


            $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on LOG MarketPlace";
            send_notification($message);

            $message = Auth::user()->email . "| just resolved with $request->session_id | NGN " . number_format($amount) . " on LOG MarketPlace";
            send_notification2($message);


            return back()->with('message', "Transaction successfully Resolved, NGN $amount added to ur wallet");
        }

        if ($status == false) {
            return back()->with('error', "$message");
        }
    }



    public function change_password(request $request)
    {

        $user = Auth::id();


        return view('change-password', compact('user'));
    }



    public function faq(request $request)
    {
        $user = Auth::id();
        return view('faq', compact('user'));
    }

    public function terms(request $request)
    {
        $user = Auth::id();
        return view('terms', compact('user'));
    }

    public function rules(request $request)
    {
        $user = Auth::id();
        return view('rules', compact('user'));
    }

    public function policy(request $request)
    {
        $user = Auth::id();
        return view('policy', compact('user'));
    }




    public function update_password_now(request $request)
    {
        // Validate the user input
        $validatedData = $request->validate([
            'password' => 'required|string|min:4|confirmed',
        ]);

        User::where('id', Auth::id())->update([
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect the user to a protected route or dashboard
        return back()->with('message', 'Password Changed Successfully');
    }






    public function forget_password(request $request)
    {

        $user = Auth::id() ?? null;

        return view('forget-password', compact('user'));
    }

    public function reset_password(request $request)
    {

        $email = $request->email;
        $expiryTimestamp = time() + 24 * 60 * 60; // 24 hours in seconds
        $url = url('') . "/verify-password?code=$expiryTimestamp&email=$request->email";

        $ck = User::where('email', $request->email)->first()->email ?? null;

        if ($ck == $request->email) {

            User::where('email', $email)->update([
                'code' => $expiryTimestamp
            ]);

            $data = array(
                'fromsender' => 'noreply@logmarketplace.com', 'LOG MARKETPLACE',
                'subject' => "Reset Password",
                'toreceiver' => $email,
                'url' => $url,
            );


            Mail::send('reset-password-mail', ["data1" => $data], function ($message) use ($data) {
                $message->from($data['fromsender']);
                $message->to($data['toreceiver']);
                $message->subject($data['subject']);
            });



            return redirect('/forgot-password')->with('message', "A reset password mail has been sent to $request->email, if not inside inbox check your spam folder");
        } else {
            return back()->with('error', 'Email can not be found on our system');
        }
    }


    public function verify_password(request $request)
    {

        $code = User::where('email', $request->email)->first()->code;


        $storedExpiryTimestamp = $request->code;;

        if (time() >= $storedExpiryTimestamp) {

            $user = Auth::id() ?? null;
            $email = $request->email;
            return view('expired', compact('user', 'email'));
        } else {

            $user = Auth::id() ?? null;
            $email = $request->email;

            return view('verify-password', compact('user', 'email'));
        }
    }


    public function view_terminal(request $request)
    {

        $under_code = SuperAgent::where('user_id', Auth::id())->first()->register_under_id;
        $super_agent_id = SuperAgent::where('user_id', Auth::id())->first()->id;


        $data['customers'] = User::where('register_under_id', $under_code)->get();

        $data['terminal']  = Terminal::where('register_under_id', $under_code)->get();


        return view('add-terminal', $data);
    }


    public function add_terminal(request $request)
    {


        $under_code = SuperAgent::where('user_id', Auth::id())->first()->register_under_id;
        $super_agent_id = SuperAgent::where('user_id', Auth::id())->first()->id;

        $ck_serial_no = Terminal::where('serial_no', $request->deviceSN)->first()->serial_no ?? null;



        
        if($ck_serial_no == $request->deviceSN){

        return back()->with('error', 'Terminal has already been assigned');

        }

        $ter = new Terminal();
        $ter->user_id = $request->user_id;
        $ter->serial_no = $request->deviceSN;
        $ter->register_under_id = $under_code;
        $ter->description = $request->description;
        $ter->merchantNo = $request->merchantNo;
        $ter->terminalNo = $request->terminalNo;
        $ter->merchantName = $request->merchantName;
        $ter->deviceSN = $request->deviceSN;
        $ter->save();


        return back()->with('message', 'Terminal assigned successfully');

    }

    public function view_customer(request $request)
    {

        $data['usr'] =  User::where('id', $request->id)->first();
        $data['credit'] =  Transaction::where('user_id', $request->id)->where('status', 1)->sum('credit');
        $data['debit'] =  Transaction::where('user_id', $request->id)->where('status', 1)->sum('debit');
        $data['pos'] =  Transaction::where('user_id', $request->id)->where(
            [
                'transaction_type' => 'purchase',
                'status' => '1'

            ]
        )->count();


        $data['transactions'] =  Transaction::latest()->where('user_id', $request->id)->where('status', 1)->take('50')->get();


        return view('view-user', $data);
    }




    public function search_customer(Request $request)
    {

        $under_code = SuperAgent::where('user_id', Auth::id())->first()->register_under_id;
        $super_agent_id = SuperAgent::where('user_id', Auth::id())->first()->id;


        if ($request->name == null && $request->phone == null  && $request->email == null) {

            $data['customers'] = User::where('register_under_id', $under_code)->paginate('50');

            return view('all-customers', $data);
        }




        if ($request->name != null && $request->phone == null  && $request->email == null) {

            $data['customers'] = User::where('register_under_id', $under_code)->where('first_name', 'LIKE', "%$request->name%")->paginate('10');

            return view('all-customers', $data);
        }


        if ($request->name == null && $request->phone != null  && $request->email == null) {

            $data['customers'] = User::where('register_under_id', $under_code)->where('phone', $request->phone)->paginate('10');

            return view('all-customers', $data);
        }


        if ($request->name == null && $request->phone == null  && $request->email != null) {

            $data['customers'] = User::where('register_under_id', $under_code)->where('email', $request->email)->paginate('10');

            return view('all-customers', $data);
        }
    }


    public function  company(request $request)
    {

        $data['company'] = SuperAgent::where('user_id', Auth::id())->first();
        $data['pos_charge'] = Charge::where('user_id', Auth::id())->where('title', 'pos_charge')->first()->amount;
        $data['transfer_charge'] = Charge::where('user_id', Auth::id())->where('title', 'transfer_charge')->first()->amount;
        $data['bills_charge'] = Charge::where('user_id', Auth::id())->where('title', 'bills_charge')->first()->amount;


        return view('company', $data);
    }



    public function  update_company(request $request)
    {



        SuperAgent::where('user_id', Auth::id())->update([

            'pos_charge' => $request->pos_charge,
            'transfer_charge' => $request->transfer_charge,
            'bills_charge' => $request->bills_charge,

        ]);


        return back()->with('message', "updated successfully");


    }



    public function  view_all_customers(request $request)
    {

        $under_code = SuperAgent::where('user_id', Auth::id())->first()->register_under_id;
        $super_agent_id = SuperAgent::where('user_id', Auth::id())->first()->id;

        $data['customers'] = User::where('register_under_id', $under_code)->get();


        return view('all-customers', $data);
    }


    public function  log_out(request $request)
    {

        Auth::logout();

        return redirect('/');
    }
}
