<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AccountsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Account;
use App\Activity;
use App\Country;
use App\Station;
use App\User;
use Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:SuperAdmin-list|SuperAdmin-create|SuperAdmin-edit|SuperAdmin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:SuperAdmin-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:SuperAdmin-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:SuperAdmin-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:SuperAdmin-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_accounts']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Account listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::where('accounts_status','1')->get();
        $isInserted = Activity::create([
                'module_name' => 'Account index',
                'action_name' => 'Visited Account Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accounts.index_accounts',compact('accounts'));
    }
	
    /**
     * Display a listing of the activation_requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactive_accounts(Request $request)
    {
        $accounts = Account::where('accounts_status','0')->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('accounts.index_accounts',compact('accounts'));
    }

    /**
     * Display a listing of the activation_requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function activation_requests(Request $request)
    {
        $user_table =  Schema::hasTable('users','accounts');
        if($user_table){
            $accounts = Account::where('verify_status','1')->get();
            $Inserted = Activity::create([
                'module_name' => 'User Index',
                'action_name' => 'Visited User Index Page',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('accounts.index_accounts',compact('accounts'));
        }else{
            return view('accounts.index_accounts');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetch(Request $request)
    {
        $data = Account::select('accounts_fname')
                ->where("accounts_fname","LIKE","%{$request->query}%")
                ->get();

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocietyMember  $society_member
     * @return \Illuminate\Http\Response
     */
    public function fetcch(Request $request)
    {
         try {
            $account = Account::where('accounts_number','like','%'.$request->accounts_number.'%')->first();
        //$cities = SocietyMember::select('reg_id_no')->where('reg_id_no',$request->reg_id_no)->first();
        return response()->json($account, 200);
        } catch (Exception $e) {
            return json(array("Sorry! Data not Fatched"));
            return response()->json([
                //'message' => $e->getMessage();
            ], 500);
        }
    }

	/**
     * gET Account.
     *
     * @param  \App\Account  Account_code
     * @return \Illuminate\Http\Response
     */
    public function check_accounts (Request $request)
    {
       try {
        $getFields = Account::where('account_code',$request->account_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Account.
     *
     * @param  \App\Account  Account_code
     * @return \Illuminate\Http\Response
     */
    public function get_accounts (Request $request)
    {
       try {
        $getFields = Account::where('accounts_number',$request->accounts_number)->where('accounts_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Account Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationaccounts::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Account Create',
                'action_name' => 'Visited Create Account Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accounts.create_accounts');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Account in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'account_code' 	=> 'required|string|max:255|unique:accounts',
            'account_name' 	=> 'required|string|max:255',
            'account_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Account::create([
                'account_code' 	=> strtoupper($request->account_code),
                'account_name' 	=> strtoupper($request->account_name),
                'account_status' => $request->account_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Account Created',
                'action_name' => 'Created new Account',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('accounts.index')->with('gmsg','Account created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

     /**
     * Display the specified Account.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        $isInserted = Activity::create([
            'module_name' => 'Account Show',
            'action_name' => 'Checked Account Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('accounts.show_accounts',compact('account'));
    }


    /**
     * Show Account Edit Page.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {

        $countries = Country::where('country_status','1')->get();
        $stations = Station::where('station_status','1')->get();

        $isInserted = Activity::create([
            'module_name' => 'Account Edit',
            'action_name' => 'Visited Account Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('accounts.update_accounts',compact('account','countries','stations'));
    }

    /**
     * Update the specified Account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {

        $validate = $this->validate($request,[
            'accounts_type'     =>  'required|string|max:1',
            'station_code'      =>  'required|string|max:255',
            'station_name'      =>  'required|string|max:255',
            'payment_term'      =>  'required|string|max:255',
            'accounts_number'   =>  'required|string|max:255',
            'accounts_company'  =>  'sometimes|max:255',
            'accounts_cnic'     =>  'required|string|max:255',
            'accounts_fname'    =>  'required|string|max:255',
            'accounts_lname'    =>  'required|string|max:255',
            'accounts_phone'    =>  'required|string|max:255',
            'accounts_mobile'   =>  'required|string|max:255',
            'accounts_email'    =>  'required|email|max:255',
            'accounts_username' =>  'required|string|max:255',
            'accounts_address1' =>  'required|string|max:255',
            'accounts_address2' =>  'sometimes|max:255',
            'accounts_address3' =>  'sometimes|max:255',
            'city_name'         =>  'required|string|max:255',
            'zip_code'          =>  'required|string|max:255',
            'state_name'        =>  'required|string|max:255',
            'country_name'      =>  'required|string|max:255',
            'ntn_number'        =>  'sometimes|max:255',
            'accounts_status'   =>  'required',
        ]);

        if($validate)
        {
            $term= $request->payment_term=="Credit" ? 1 : 0;
            $account->accounts_type     = $request->accounts_type;
            $account->station_code      = $request->station_code;
            $account->station_name      = $request->station_name;
            $account->payment_term      =$term;
            $account->accounts_number   = $request->accounts_number;
            $account->accounts_company  = $request->accounts_company;
            $account->accounts_cnic     = $request->accounts_cnic;
            $account->accounts_fname    = $request->accounts_fname;
            $account->accounts_lname    = $request->accounts_lname;
            $account->accounts_phone    = $request->accounts_phone;
            $account->accounts_mobile   = $request->accounts_mobile;
            $account->accounts_email    = $request->accounts_email;
            $account->accounts_username = $request->accounts_username;
            $account->accounts_address1 = $request->accounts_address1;
            $account->accounts_address2 = $request->accounts_address2;
            $account->accounts_address3 = $request->accounts_address3;
            $account->city_name         = $request->city_name;
            $account->zip_code          = $request->zip_code;
            $account->state_name        = $request->state_name;
            $account->country_name      = $request->country_name;
            $account->ntn_number        = $request->ntn_number;
            $account->accounts_status   = $request->accounts_status;
            $account->updated_by        = Auth::user()->fname;
            $account->verified_by       = Auth::user()->fname;
            $account->activated_by      = Auth::user()->fname;
            $account->verify_status     = '0';


            if($account->save())
            {   
                $user  = User::where('email',$request->accounts_email)->first();
                $user->accounts_number  = $request->accounts_number;
                $user->user_status      = $request->accounts_status;
                $user->accounts_id      = $account->id;
                $user->created_by       = Auth::user()->fname;
                $user->save();

                $Account = Activity::create([
                'module_name' => 'Account Updated',
                'action_name' => 'Edited a Account',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('accounts.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }


    /**
     *  Show items in recylebin.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $accounts = Account::onlyTrashed()->get();
        $getFields = Account::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Account Deleted',
                'action_name' => 'Checked Account Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('accounts.deleted_accounts',compact('accounts'));
        }else{
            return redirect()->route('accounts.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single account.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Account::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Account Restore',
            'action_name' => 'Restored Single Account',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accounts.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Account::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Account Bulk Restore',
            'action_name' => 'Restored Multiple accounts',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accounts.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Account.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Account::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Account Permanent Delete',
            'action_name' => 'Permanently Deleted Single Account',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk accounts.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Account::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Account Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple accounts',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Account.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Account::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Account',
            'action_name' => 'Trashed a Account',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk accounts.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Account::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Account',
            'action_name' => 'Trashed Multiple accounts',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
