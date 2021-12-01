<?php

namespace App\Http\Controllers\Gender;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GendersExport;
use Illuminate\Http\Request;
use App\Gender;
use App\Activity;
use Auth;

class GenderController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_genders']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Gender listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::get();
        $isInserted = Activity::create([
                'module_name' => 'Gender index',
                'action_name' => 'Visited Gender Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('genders.index_genders',compact('genders'));
    }
	
	/**
     * gET Gender.
     *
     * @param  \App\Gender  Gender_code
     * @return \Illuminate\Http\Response
     */
    public function check_genders (Request $request)
    {
       try {
        $getFields = Gender::where('gender_code',$request->gender_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Gender.
     *
     * @param  \App\Gender  Gender_code
     * @return \Illuminate\Http\Response
     */
    public function get_genders (Request $request)
    {
       try {
        $getFields = Gender::where('gender_name',$request->gender_name)->where('gender_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Gender Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationgenders::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Gender Create',
                'action_name' => 'Visited Create Gender Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('genders.create_genders');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Gender in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'gender_code' 	=> 'required|string|max:255|unique:genders',
            'gender_name' 	=> 'required|string|max:255',
            'gender_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Gender::create([
                'gender_code' 	=> strtoupper($request->gender_code),
                'gender_name' 	=> strtoupper($request->gender_name),
                'gender_status' => $request->gender_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Gender Created',
                'action_name' => 'Created new Gender',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('genders.index')->with('gmsg','Gender created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Gender Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $genders = Gender::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Gender Upload',
                'action_name' => 'Visited Gender Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('genders.upload_genders',compact('genders'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Genderclass')); Add this if uncommen
    }

    /**
     * Gender CSV Upload Function.
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
                    Gender::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Gender Uploaded',
                    'action_name' => 'Uploaded Multiple genders with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('genders.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('genders.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Gender  $gender
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
     * Display the specified Gender.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        $isInserted = Activity::create([
            'module_name' => 'Gender Show',
            'action_name' => 'Checked Gender Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('genders.show_genders',compact('gender'));
    }


    /**
     * Show Gender Edit Page.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        $isInserted = Activity::create([
            'module_name' => 'Gender Edit',
            'action_name' => 'Visited Gender Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('genders.update_genders',compact('gender'));
    }

    /**
     * Update the specified Gender in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        
        $validate = $this->validate($request,[
            'gender_code'      =>  'required|string|max:255',
            'gender_name'      =>  'required|string|max:255',
            'gender_status'    =>  'required',
        ]);
        if($validate)
        {

            $gender->gender_code = strtoupper($request->gender_code);
            $gender->gender_name = strtoupper($request->gender_name);
            $gender->gender_status = $request->gender_status;
            $gender->updated_by    = Auth::user()->fname;

            if($gender->save())
            {
                $Gender = Activity::create([
                'module_name' => 'Gender Updated',
                'action_name' => 'Edited a Gender',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('genders.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="genders_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Gender Sample',
                'action_name' => 'Download Gender Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Gender Table.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function export_genders()
    {
        return Excel::download(new GendersExport, 'Genders.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $genders = Gender::onlyTrashed()->get();
        $getFields = Gender::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Gender Deleted',
                'action_name' => 'Checked Gender Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('genders.deleted_genders',compact('genders'));
        }else{
            return redirect()->route('genders.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single gender.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Gender::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Gender Restore',
            'action_name' => 'Restored Single Gender',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('genders.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Gender::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Gender Bulk Restore',
            'action_name' => 'Restored Multiple genders',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('genders.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Gender.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Gender::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Gender Permanent Delete',
            'action_name' => 'Permanently Deleted Single Gender',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk genders.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Gender::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Gender Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple genders',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Gender.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Gender::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Gender',
            'action_name' => 'Trashed a Gender',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk genders.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Gender::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Gender',
            'action_name' => 'Trashed Multiple genders',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
