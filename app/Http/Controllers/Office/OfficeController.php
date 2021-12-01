<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OfficesExport;
use Illuminate\Http\Request;
use App\Office;
use App\Activity;
use App\Building;
use Auth;

class OfficeController extends Controller
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
     * Display Office listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::get();
        $isInserted = Activity::create([
                'module_name' => 'Office index',
                'action_name' => 'Visited Office Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('offices.index_offices',compact('offices'));
    }
	
	/**
     * gET Office.
     *
     * @param  \App\Office  Office_code
     * @return \Illuminate\Http\Response
     */
    public function check_offices (Request $request)
    {
       try {
        $getFields = Office::where('office_code',$request->office_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Office.
     *
     * @param  \App\Office  Office_code
     * @return \Illuminate\Http\Response
     */
    public function get_offices (Request $request)
    {
       try {
        $getFields = Office::where('office_name',$request->office_name)->where('office_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Office Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationoffices::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Office Create',
                'action_name' => 'Visited Create Office Page',
                'user_name' => Auth::user()->fname ,
            ]);
         $buildings = Building::get();
        return view('offices.create_offices',compact('buildings'));
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Office in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'office_code' 	=> 'required|string|max:255|unique:offices',
            'office_name' 	=> 'required|string|max:255',
            'building_name'   => 'required|string|max:255',
            'office_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Office::create([
                'office_code' 	=> $request->office_code,
                'office_name' 	=> $request->office_name,
                'building_name'   => $request->building_name,
                'office_status' => $request->office_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Office Created',
                'action_name' => 'Created new Office',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('offices.index')->with('gmsg','Office created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Office Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $offices = Office::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Office Upload',
                'action_name' => 'Visited Office Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('offices.upload_offices',compact('offices'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Officeclass')); Add this if uncommen
    }

    /**
     * Office CSV Upload Function.
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
                    Office::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Office Uploaded',
                    'action_name' => 'Uploaded Multiple offices with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('offices.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('offices.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Office  $office
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
     * Display the specified Office.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        $isInserted = Activity::create([
            'module_name' => 'Office Show',
            'action_name' => 'Checked Office Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('offices.show_offices',compact('office'));
    }


    /**
     * Show Office Edit Page.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        $isInserted = Activity::create([
            'module_name' => 'Office Edit',
            'action_name' => 'Visited Office Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
         $buildings = Building::get();
        return view('offices.update_offices',compact('office','buildings'));
    }

    /**
     * Update the specified Office in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        
        $validate = $this->validate($request,[
            'office_code'      =>  'required|string|max:255',
            'office_name'      =>  'required|string|max:255',
            'building_name'      =>  'required|string|max:255',
            'office_status'    =>  'required',
        ]);
        if($validate)
        {

            $office->office_code = $request->office_code;
            $office->office_name = $request->office_name;
            $office->building_name = $request->building_name;
            $office->office_status = $request->office_status;
            $office->updated_by    = Auth::user()->fname;

            if($office->save())
            {
                $Office = Activity::create([
                'module_name' => 'Office Updated',
                'action_name' => 'Edited a Office',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('offices.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="offices_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Office Sample',
                'action_name' => 'Download Office Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Office Table.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function export_offices()
    {
        return Excel::download(new OfficesExport, 'Offices.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $offices = Office::onlyTrashed()->get();
        $getFields = Office::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Office Deleted',
                'action_name' => 'Checked Office Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('offices.deleted_offices',compact('offices'));
        }else{
            return redirect()->route('offices.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single office.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Office::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Office Restore',
            'action_name' => 'Restored Single Office',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('offices.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Office::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Office Bulk Restore',
            'action_name' => 'Restored Multiple offices',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('offices.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Office.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Office::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Office Permanent Delete',
            'action_name' => 'Permanently Deleted Single Office',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk offices.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Office::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Office Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple offices',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Office.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Office::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Office',
            'action_name' => 'Trashed a Office',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk offices.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Office::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Office',
            'action_name' => 'Trashed Multiple offices',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
