<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionsExport;
use Illuminate\Http\Request;
use App\Permission;
use App\Activity;
use Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:SuperUser-list|SuperUser-create|SuperUser-edit|SuperUser-delete', ['only' => ['index','show']]);
        $this->middleware('permission:SuperUser-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:SuperUser-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:SuperUser-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:SuperUser-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_offices']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Permission listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::get();
        $isInserted = Activity::create([
                'module_name' => 'Permission index',
                'action_name' => 'Visited Permission Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('permissions.index_permissions',compact('permissions'));
    }
	
	/**
     * gET Permission.
     *
     * @param  \App\Permission  Permission_code
     * @return \Illuminate\Http\Response
     */
    public function check_permissions (Request $request)
    {
       try {
        //$getFields = Permission::where('permission_code',$request->permission_code)->first();
        return; // response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Permission.
     *
     * @param  \App\Permission  Permission_code
     * @return \Illuminate\Http\Response
     */
    public function get_permissions (Request $request)
    {
       try {
        $getFields = Permission::where('permission_name',$request->permission_name)->where('permission_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Permission Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationpermissions::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Permission Create',
                'action_name' => 'Visited Create Permission Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('permissions.create_permissions');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Permission in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'name' 	=> 'required|string|max:255',
        ]);
        
        if($validate)
        {
            $isInserted = Permission::create([
                'name' 	=> $request->name,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Permission Created',
                'action_name' => 'Created new Permission',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('permissions.index')->with('gmsg','Permission created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Permission Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $permissions = Permission::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Permission Upload',
                'action_name' => 'Visited Permission Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('permissions.upload_permissions',compact('permissions'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Permissionclass')); Add this if uncommen
    }

    /**
     * Permission CSV Upload Function.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function upload_process(Request $request)
    {
        try {

           if ($request->file('csv')) 
            {
                $validate = $this->validate($request,[
                    'csv'=>'required|mimes:csv,txt',
                ]);
                if($validate)
            {
                    $file = $request->file('csv');
                    $extension = $file->getClientOriginalExtension();
                    $file_name = 'csv_'.rand().'.'.$extension;
                    $path = $file->move(public_path().'/csv',$file_name);


                    $customerArr = $this->csvToArray($path);

                for ($i = 0; $i < count($customerArr); $i ++)
                    {
                    Permission::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Permission Uploaded',
                    'action_name' => 'Uploaded Multiple permissions with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('permissions.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('permissions.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
                $header = null;
                $data = array();
                if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    {
                    $header = $row;
                    }
                else
                    {
                    $data[] = array_combine($header, $row);
                    }
            }
            fclose($handle);
        }

        return $data;
    }

    
     /**
     * Display the specified Permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $isInserted = Activity::create([
            'module_name' => 'Permission Show',
            'action_name' => 'Checked Permission Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('permissions.show_permissions',compact('permission'));
    }


    /**
     * Show Permission Edit Page.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $isInserted = Activity::create([
            'module_name' => 'Permission Edit',
            'action_name' => 'Visited Permission Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('permissions.update_permissions',compact('permission'));
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        
        $validate = $this->validate($request,[
            'permission_name'      =>  'required|string|max:255',
        ]);
        if($validate)
        {

            $permission->name = $request->name;
            $permission->updated_by    = Auth::user()->fname;

            if($permission->save())
            {
                $Permission = Activity::create([
                'module_name' => 'Permission Updated',
                'action_name' => 'Edited a Permission',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('permissions.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Download Sample countries CSV.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function download_sample_csv()
    {
        
        $filename="permissions_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Permission Sample',
                'action_name' => 'Download Permission Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Permission Table.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function export_permissions()
    {
        return Excel::download(new PermissionsExport, 'Permissions.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $permissions = Permission::onlyTrashed()->get();
        $getFields = Permission::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Permission Deleted',
                'action_name' => 'Checked Permission Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('permissions.deleted_permissions',compact('permissions'));
        }else{
            return redirect()->route('permissions.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Permission::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Permission Restore',
            'action_name' => 'Restored Single Permission',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('permissions.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Permission::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Permission Bulk Restore',
            'action_name' => 'Restored Multiple permissions',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('permissions.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Permission::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Permission Permanent Delete',
            'action_name' => 'Permanently Deleted Single Permission',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk permissions.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Permission::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Permission Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple permissions',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Permission.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Permission::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Permission',
            'action_name' => 'Trashed a Permission',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk permissions.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Permission::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Permission',
            'action_name' => 'Trashed Multiple permissions',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
