<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Activity;
use App\user;
use App\Account;

class CustomerDashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(Schema::hasTable('accounts','users')){
            $user = Auth::user();
            dd('ts');
            $account = Account::where('id',$user->accounts_id)
            ->select('profile_status','verify_status','accounts_status')
            ->first();
                if($account->profile_status == 0){
                    return redirect()->route('profiles.create')->with('dmsg','You Must Complete your profile to use application.');
                }if($account->profile_status == '1' && $account->verify_status == '1'){
                    return view('dashboards.customer')->with('imsg','All Good, Please Wait APX Team Will Activate Your Account Shortly');
                }
                else{
                    return view('dashboards.customer',compact('user','account'));
                }
        }else{

            return view('dashboards.customer');
        }
        
    }


    /**
     * Display a listing of the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function my_users()
    {
        $user = Auth::user();
        $account = Account::where('accounts_email',$user->email)->first();

        if($user->user_status === 1 && $account->accounts_number != null){

            $customer_role = $user->hasRole('Customer');

            if($customer_role){
                $users = User::where('accounts_number',$account->accounts_number)->get();
                $Inserted = Activity::create([
                    'module_name' => 'My User',
                    'action_name' => 'Visited My User Index Page',
                    'user_name' => Auth::user()->fname ,
                ]);
                return view('users.index_users',compact('users'));
            }

        }else{
            if($account->accounts_number != null){
                return back()->with('bmsg','Your Account is Not Active, Please Contact APX');
            }
            elseif($account->accounts_number == null){
                return back()->with('bmsg','You Must Need an Account Number Before Adding users');
            }
        }
    }

    /**
     * Display a listing of the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $account = Account::where('accounts_email',$user->email)->first();
        $user_count = User::where('accounts_number',$account->accounts_number)->count();

        if($user_count < 5){
            if($user->user_status === 1 && $account->accounts_number != null){

                $customer_role = $user->hasRole('Customer');

                if($customer_role){
                    //$users = User::where('accounts_number',$account->accounts_number)->where('user_status','1')->get();
                    $Inserted = Activity::create([
                        'module_name' => 'User Index',
                        'action_name' => 'Visited User Index Page',
                        'user_name' => Auth::user()->fname ,
                    ]);
                    return view('users.create_my_users',compact('user','account'));
                }
            }else{
                if($account->accounts_number != null){
                    return back()->with('bmsg','Your Account is Not Active, Please Contact APX');
                }
                elseif($account->accounts_number == null){
                    return back()->with('bmsg','You Must Need an Account Number Before Adding user');
                }
            }
        }else{
            return back()->with('bmsg','You can not add more than 5 Users');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request,[
            'accounts_number'   => 'required|string|max:255',
            'email'             => 'required|email|unique:users,email',
            'username'          => 'required|string|max:255|unique:users',
            'fname'             => 'required|string|max:255',
            'lname'             => 'required|string|max:255',
            'usercompany'       => 'required|string|max:255',
            'password'          => 'required|same:confirm-password',
            'profile_pic'       => 'sometimes|file|image|max:8000',
            'roles'             => 'required',
            'user_status'       => 'required',
            'accounts_id'       => 'required',
        ]);

        $profile_pic = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            $extension = $file->getClientOriginalExtension();
            $profile_pic = "profile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$profile_pic);
        }

        if($validate)
        {
            $user_insterd = User::create([
                'accounts_number'   => $request->accounts_number,
                'email'             => $request->email,
                'username'          => $request->username,
                'fname'             => $request->fname,
                'lname'             => $request->lname,
                'usercompany'       => $request->usercompany,
                'password'          => Hash::make($request->password),
                'profile_pic'       => $profile_pic,
                'user_status'       => $request->user_status,
                'accounts_id'       => $request->accounts_id,
                'created_by'        => Auth::user()->fname,
            ]);

            $role = $request->roles;
            $user_insterd->assignRole($role);

            if($user_insterd)
            {
                 $user_insterd = Activity::create([
                'module_name' => 'Account User Created',
                'action_name' => 'Created new Account User',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('users.my_users')->with('gmsg','User created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back()->with('bmsg','Required Fields are Missing');
        }
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
