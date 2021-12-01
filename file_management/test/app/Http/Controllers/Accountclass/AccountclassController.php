<?php

namespace App\Http\Controllers\Accountclass;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AccountclassesExport;
use Illuminate\Http\Request;
use App\Type;
use App\Accountclass;
use App\Activity;
use Auth;

class AccountclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
    $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
    $this->middleware('permission:Admin-create',          ['only' =>   ['create','store']]);
    $this->middleware('permission:Admin-edit',            ['only' =>   ['edit','update']]);
    $this->middleware('permission:Admin-upload',          ['only' =>   ['upload_page','upload_process','csvToArray']]);
    $this->middleware('permission:Admin-download',        ['only' =>   ['download_sample_csv']]);
    $this->middleware('permission:Admin-export',        ['only' =>   ['export_accountclasses']]);
    $this->middleware('permission:Admin-show-deleted',    ['only' =>   ['show_deleted']]);
    $this->middleware('permission:Admin-restore',         ['only' =>   ['restore_single','restore_bulk']]);
    $this->middleware('permission:Admin-delete',          ['only' =>   ['destroy','bulk_delet']]);
    $this->middleware('permission:Admin-perm-delete',     ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Accountclass listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountclasses = Accountclass::
        join('types', 'types.type_id', '=', 'accountclasses.type_id')
        ->select('accountclasses.*',
                'types.type_name',
                )
        ->get();

        $isInserted = Activity::create([
                'module_name' => 'Accountclass index',
                'action_name' => 'Visited Accountclass Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountclasses.index_accountclasses',compact('accountclasses'));
    }
	
	/**
     * gET Accountclass.
     *
     * @param  \App\Accountclass  Accountclass_code
     * @return \Illuminate\Http\Response
     */
    public function check_accountclasses (Request $request)
    {
       try {
        $getFields = Accountclass::where('accountclass_name',$request->accountclass_name)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Accountclass.
     *
     * @param  \App\Accountclass  Accountclass_code
     * @return \Illuminate\Http\Response
     */
    public function get_accountclasses (Request $request)
    {
       try {
        $getFields = Accountclass::where('type_id',$request->type_id)->where('accountclass_status','1')->pluck('accountclass_name','accountclass_id');
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Accountclass Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::where('type_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'Accountclass Create',
                'action_name' => 'Visited Create Accountclass Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountclasses.create_accountclasses',compact('types')); 
    }

    
    /**
     * Store a newly created Accountclass in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'type_id'               => 'required|max:255',
            'accountclass_name' 	=> 'required|string|max:255|unique:accountclasses',
            'accountclass_status'   => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Accountclass::create([
                'type_id' 	             => $request->type_id,
                'accountclass_name'      => $request->accountclass_name,
                'accountclass_status'    => $request->accountclass_status,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Accountclass Created',
                'action_name' => 'Created new Accountclass',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('accountclasses.index')->with('gmsg','Accountclass created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

     /**
     * Display the specified Accountclass.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */
    public function show(Accountclass $accountclass)
    {
        $type = Type::where('type_id', $accountclass->type_id)->first();
        
        $isInserted = Activity::create([
                'module_name' => 'Accountclass Show',
                'action_name' => 'Checked Accountclass Record',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountclasses.show_accountclasses',compact('accountclass','type'));
    }


    /**
     * Show Accountclass Edit Page.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountclass $accountclass)
    {
        $types = Type::where('type_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'Accountclass Edit',
                'action_name' => 'Visited Accountclass Edit Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('accountclasses.update_accountclasses',compact('accountclass','types'));
    }

    /**
     * Update the specified Accountclass in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountclass $accountclass)
    {
        
        $validate = $this->validate($request,[
            'type_id'                =>  'required|string|max:255',
            'accountclass_name'      =>  'required|string|max:255',
            'accountclass_status'    =>  'required',
        ]);
        if($validate)
        {

            $accountclass->type_id          = $request->type_id;
            $accountclass->accountclass_name = $request->accountclass_name;
            $accountclass->accountclass_status = $request->accountclass_status;

            if($accountclass->save())
            {
                $Accountclass = Activity::create([
                'module_name' => 'Accountclass Updated',
                'action_name' => 'Edited a Accountclass',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('accountclasses.index')->with('gmsg','Data Successfully Updated ...');

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
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $accountclasses = Accountclass::onlyTrashed()->get();
        $getFields = Accountclass::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Accountclass Deleted',
                'action_name' => 'Checked Accountclass Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('accountclasses.deleted_accountclasses',compact('accountclasses'));
        }else{
            return redirect()->route('accountclasses.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single accountclass.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Accountclass::onlyTrashed()->where(['accountclass_id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Accountclass Restore',
            'action_name' => 'Restored Single Accountclass',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accountclasses.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Accountclass::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Accountclass Bulk Restore',
            'action_name' => 'Restored Multiple accountclasses',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('accountclasses.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Accountclass.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Accountclass::where('accountclass_id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountclass Permanent Delete',
            'action_name' => 'Permanently Deleted Single Accountclass',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk accountclasses.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Accountclass::where('accountclass_id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountclass Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple accountclasses',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Accountclass.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Accountclass::where('accountclass_id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountclass',
            'action_name' => 'Trashed a Accountclass',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk accountclasses.
     *
     * @param  \App\Accountclass  $accountclass
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Accountclass::where('accountclass_id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Accountclass',
            'action_name' => 'Trashed Multiple accountclasses',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
