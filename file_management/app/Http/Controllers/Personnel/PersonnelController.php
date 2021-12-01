<?php

namespace App\Http\Controllers\Personnel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersonnelsExport;
use Illuminate\Http\Request;
use App\Personnel;
use App\Activity;
use Auth;

class PersonnelController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_personnels']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Personnel listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::get();
        $isInserted = Activity::create([
                'module_name' => 'Personnel index',
                'action_name' => 'Visited Personnel Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('personnels.index_personnels',compact('personnels'));
    }
	
	/**
     * gET Personnel.
     *
     * @param  \App\Personnel  Personnel_code
     * @return \Illuminate\Http\Response
     */
    public function check_personnels (Request $request)
    {
       try {
        $getFields = Personnel::where('personnel_code',$request->personnel_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Personnel.
     *
     * @param  \App\Personnel  Personnel_code
     * @return \Illuminate\Http\Response
     */
    public function get_personnels (Request $request)
    {
       try {
        $getFields = Personnel::where('personnel_name',$request->personnel_name)->where('personnel_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Personnel Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationpersonnels::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Personnel Create',
                'action_name' => 'Visited Create Personnel Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('personnels.create_personnels');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Personnel in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'personnel_code' 	=> 'required|string|max:255|unique:personnels',
            'personnel_name' 	=> 'required|string|max:255',
            'personnel_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Personnel::create([
                'personnel_code' 	=> strtoupper($request->personnel_code),
                'personnel_name' 	=> strtoupper($request->personnel_name),
                'personnel_status' => $request->personnel_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Personnel Created',
                'action_name' => 'Created new Personnel',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('personnels.index')->with('gmsg','Personnel created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Personnel Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $personnels = Personnel::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Personnel Upload',
                'action_name' => 'Visited Personnel Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('personnels.upload_personnels',compact('personnels'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Personnelclass')); Add this if uncommen
    }

    /**
     * Personnel CSV Upload Function.
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
                    Personnel::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Personnel Uploaded',
                    'action_name' => 'Uploaded Multiple personnels with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('personnels.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('personnels.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Personnel  $personnel
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
     * Display the specified Personnel.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show(Personnel $personnel)
    {
        $isInserted = Activity::create([
            'module_name' => 'Personnel Show',
            'action_name' => 'Checked Personnel Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('personnels.show_personnels',compact('personnel'));
    }


    /**
     * Show Personnel Edit Page.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personnel $personnel)
    {
        $isInserted = Activity::create([
            'module_name' => 'Personnel Edit',
            'action_name' => 'Visited Personnel Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('personnels.update_personnels',compact('personnel'));
    }

    /**
     * Update the specified Personnel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personnel $personnel)
    {
        
        $validate = $this->validate($request,[
            'personnel_code'      =>  'required|string|max:255',
            'personnel_name'      =>  'required|string|max:255',
            'personnel_status'    =>  'required',
        ]);
        if($validate)
        {

            $personnel->personnel_code = strtoupper($request->personnel_code);
            $personnel->personnel_name = strtoupper($request->personnel_name);
            $personnel->personnel_status = $request->personnel_status;
            $personnel->updated_by    = Auth::user()->fname;

            if($personnel->save())
            {
                $Personnel = Activity::create([
                'module_name' => 'Personnel Updated',
                'action_name' => 'Edited a Personnel',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('personnels.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="personnels_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Personnel Sample',
                'action_name' => 'Download Personnel Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Personnel Table.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function export_personnels()
    {
        return Excel::download(new PersonnelsExport, 'Personnels.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $personnels = Personnel::onlyTrashed()->get();
        $getFields = Personnel::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Personnel Deleted',
                'action_name' => 'Checked Personnel Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('personnels.deleted_personnels',compact('personnels'));
        }else{
            return redirect()->route('personnels.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single personnel.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Personnel::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Personnel Restore',
            'action_name' => 'Restored Single Personnel',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('personnels.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Personnel::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Personnel Bulk Restore',
            'action_name' => 'Restored Multiple personnels',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('personnels.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Personnel.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Personnel::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Personnel Permanent Delete',
            'action_name' => 'Permanently Deleted Single Personnel',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk personnels.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Personnel::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Personnel Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple personnels',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Personnel.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Personnel::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Personnel',
            'action_name' => 'Trashed a Personnel',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk personnels.
     *
     * @param  \App\Personnel  $personnel
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Personnel::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Personnel',
            'action_name' => 'Trashed Multiple personnels',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
