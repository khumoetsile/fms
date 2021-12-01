<?php

namespace App\Http\Controllers\Accountserial;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AccountserialsExport;
use Illuminate\Http\Request;
use App\Accountserial;
use App\Activity;
use App\Account;
use Auth;

class AccountserialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Admin-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:Admin-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:Admin-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:Admin-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_accountserials']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Accountserial listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountserials = Accountserial::get();
        $isInserted = Activity::create([
                'module_name' => 'Accountserial index',
                'action_name' => 'Visited Accountserial Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountserials.index_accountserials',compact('accountserials'));
    }
	
	/**
     * gET Accountserial.
     *
     * @param  \App\Accountserial  Accountserial_code
     * @return \Illuminate\Http\Response
     */
    public function check_accountserials (Request $request)
    {
       try {
        $getFields = Accountserial::where('accountserial_code',$request->accountserial_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Accountserial.
     *
     * @param  \App\Accountserial  Accountserial_code
     * @return \Illuminate\Http\Response
     */
    public function get_accountserials (Request $request)
    {
       try {

        $last_account = Account::whereNotNull('accounts_number')->where('payment_term',$request->payment_term)->latest()->first();
        $account_serial = Accountserial::where('payment_term',$request->payment_term)->where('accountserial_status','1')->first();
        if($last_account != null){
            $new_account = $last_account->accounts_number + $account_serial->accountserial_jump;
        }elseif($last_account == null){
            $new_account = $account_serial->accountserial_code;
        }
        return response()->json($new_account, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Accountserial Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationaccountserials::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Accountserial Create',
                'action_name' => 'Visited Create Accountserial Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountserials.create_accountserials');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Accountserial in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'payment_term' 	=> 'required|string|max:255',
            'accountserial_code' 	=> 'required|string|max:255|unique:accountserials',
            'accountserial_jump'    => 'required|string|max:255',
            'accountserial_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Accountserial::create([
                'payment_term' 	     => $request->payment_term,
                'accountserial_code'    => strtoupper($request->accountserial_code),
                'accountserial_jump' 	=> strtoupper($request->accountserial_jump),
                'accountserial_status' => $request->accountserial_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Accountserial Created',
                'action_name' => 'Created new Accountserial',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('accountserials.index')->with('gmsg','Accountserial created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

     /**
     * Display the specified Accountserial.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */
    public function show(Accountserial $accountserial)
    {
        $isInserted = Activity::create([
            'module_name' => 'Accountserial Show',
            'action_name' => 'Checked Accountserial Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('accountserials.show_accountserials',compact('accountserial'));
    }


    /**
     * Show Accountserial Edit Page.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountserial $accountserial)
    {
        $isInserted = Activity::create([
            'module_name' => 'Accountserial Edit',
            'action_name' => 'Visited Accountserial Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('accountserials.update_accountserials',compact('accountserial'));
    }

    /**
     * Update the specified Accountserial in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountserial $accountserial)
    {
        
        $validate = $this->validate($request,[
            'payment_term'             =>  'required|string|max:255',
            'accountserial_code'      =>  'required|string|max:255',
            'accountserial_jump'      =>  'required|string|max:255',
            'accountserial_status'    =>  'required',
        ]);
        if($validate)
        {

            $accountserial->payment_term         = strtoupper($request->payment_term);
            $accountserial->accountserial_code  = strtoupper($request->accountserial_code);
            $accountserial->accountserial_jump  = strtoupper($request->accountserial_jump);
            $accountserial->accountserial_status = $request->accountserial_status;
            $accountserial->updated_by    = Auth::user()->fname;

            if($accountserial->save())
            {
                $Accountserial = Activity::create([
                'module_name' => 'Accountserial Updated',
                'action_name' => 'Edited a Accountserial',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('accountserials.index')->with('gmsg','Data Successfully Updated ...');

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
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $accountserials = Accountserial::onlyTrashed()->get();
        $getFields = Accountserial::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Accountserial Deleted',
                'action_name' => 'Checked Accountserial Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('accountserials.deleted_accountserials',compact('accountserials'));
        }else{
            return redirect()->route('accountserials.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single accountserial.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Accountserial::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Accountserial Restore',
            'action_name' => 'Restored Single Accountserial',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accountserials.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Accountserial::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Accountserial Bulk Restore',
            'action_name' => 'Restored Multiple accountserials',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accountserials.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Accountserial.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Accountserial::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountserial Permanent Delete',
            'action_name' => 'Permanently Deleted Single Accountserial',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk accountserials.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Accountserial::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountserial Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple accountserials',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Accountserial.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Accountserial::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountserial',
            'action_name' => 'Trashed a Accountserial',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk accountserials.
     *
     * @param  \App\Accountserial  $accountserial
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Accountserial::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountserial',
            'action_name' => 'Trashed Multiple accountserials',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
