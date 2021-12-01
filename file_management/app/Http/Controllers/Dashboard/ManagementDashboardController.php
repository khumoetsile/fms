<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Activity;
use App\User;
use App\Account;
use App\Station;

class ManagementDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.management');
    }
    public function my_office()
    {
        $user = auth()->user();
        $station = Station::join('accounts', 'accounts.station_code', '=', 'stations.station_code')->where('accounts_number', $user->accounts_number)
        ->select('accounts.*',
                    'stations.*')->first();
        return view('stations.manager_stations',compact('station'));
    }
    public function myma_users()
    {
        dd('test');
        $user = Auth::user();
        $account = Account::where('accounts_number',$user->accounts_number)->first();
        if($user->user_status === 1 && $account->accounts_number != null){

            $manager_role = $user->hasRole('Manager');

            if($manager_role){
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);
         $isReport=false;
        $Inserted = Activity::create([
            'module_name' => 'User Show',
            'action_name' => 'Viewed User Show Page',
            'user_name' => Auth::user()->fname ,
        ]);    

        return view('users.show_users',compact('user','isReport'));
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
