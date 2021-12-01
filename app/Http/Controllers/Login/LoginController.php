<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LoginsExport;
use Illuminate\Http\Request;
use App\Login;
use App\Activity;
use Auth;

class LoginController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_logins']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Login listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logins = Login::get();
        $isInserted = Activity::create([
                'module_name' => 'Login index',
                'action_name' => 'Visited Login Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('logins.index_logins',compact('logins'));
    }
	
	/**
     * gET Login.
     *
     * @param  \App\Login  Login_code
     * @return \Illuminate\Http\Response
     */
    public function check_logins (Request $request)
    {
       try {
        $getFields = Login::where('login_code',$request->login_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Login.
     *
     * @param  \App\Login  Login_code
     * @return \Illuminate\Http\Response
     */
    public function get_logins (Request $request)
    {
       try {
        $getFields = Login::where('login_name',$request->login_name)->where('login_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Login Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationlogins::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Login Create',
                'action_name' => 'Visited Create Login Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('logins.create_logins');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Login in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'login_code' 	=> 'required|string|max:255|unique:logins',
            'login_name' 	=> 'required|string|max:255',
            'login_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Login::create([
                'login_code' 	=> strtoupper($request->login_code),
                'login_name' 	=> strtoupper($request->login_name),
                'login_status' => $request->login_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Login Created',
                'action_name' => 'Created new Login',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('logins.index')->with('gmsg','Login created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Login Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $logins = Login::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Login Upload',
                'action_name' => 'Visited Login Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('logins.upload_logins',compact('logins'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Loginclass')); Add this if uncommen
    }

    /**
     * Login CSV Upload Function.
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
                    Login::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Login Uploaded',
                    'action_name' => 'Uploaded Multiple logins with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('logins.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('logins.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Login  $login
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
     * Display the specified Login.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        $isInserted = Activity::create([
            'module_name' => 'Login Show',
            'action_name' => 'Checked Login Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('logins.show_logins',compact('login'));
    }


    /**
     * Show Login Edit Page.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login)
    {
        $isInserted = Activity::create([
            'module_name' => 'Login Edit',
            'action_name' => 'Visited Login Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('logins.update_logins',compact('login'));
    }

    /**
     * Update the specified Login in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        
        $validate = $this->validate($request,[
            'login_code'      =>  'required|string|max:255',
            'login_name'      =>  'required|string|max:255',
            'login_status'    =>  'required',
        ]);
        if($validate)
        {

            $login->login_code = strtoupper($request->login_code);
            $login->login_name = strtoupper($request->login_name);
            $login->login_status = $request->login_status;
            $login->updated_by    = Auth::user()->fname;

            if($login->save())
            {
                $Login = Activity::create([
                'module_name' => 'Login Updated',
                'action_name' => 'Edited a Login',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('logins.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="logins_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Login Sample',
                'action_name' => 'Download Login Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Login Table.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function export_logins()
    {
        return Excel::download(new LoginsExport, 'Logins.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $logins = Login::onlyTrashed()->get();
        $getFields = Login::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Login Deleted',
                'action_name' => 'Checked Login Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('logins.deleted_logins',compact('logins'));
        }else{
            return redirect()->route('logins.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single login.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Login::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Login Restore',
            'action_name' => 'Restored Single Login',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('logins.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Login::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Login Bulk Restore',
            'action_name' => 'Restored Multiple logins',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('logins.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Login.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Login::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Login Permanent Delete',
            'action_name' => 'Permanently Deleted Single Login',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk logins.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Login::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Login Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple logins',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Login.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Login::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Login',
            'action_name' => 'Trashed a Login',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk logins.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Login::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Login',
            'action_name' => 'Trashed Multiple logins',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
