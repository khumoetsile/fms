<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClassificationsExport;
use Illuminate\Http\Request;
use App\Classification;
use App\Activity;
use Auth;

class ClassificationController extends Controller
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
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_classifications']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Classification listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifications = Classification::get();
        $isInserted = Activity::create([
                'module_name' => 'Classification index',
                'action_name' => 'Visited Classification Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('classifications.index_classifications',compact('classifications'));
    }
	
	/**
     * gET Classification.
     *
     * @param  \App\Classification  Classification_code
     * @return \Illuminate\Http\Response
     */
    public function check_classifications (Request $request)
    {
       try {
        $getFields = Classification::where('classification_code',$request->classification_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Classification.
     *
     * @param  \App\Classification  Classification_code
     * @return \Illuminate\Http\Response
     */
    public function get_classifications (Request $request)
    {
       try {
        $getFields = Classification::where('classification_name',$request->classification_name)->where('classification_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Classification Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationclassifications::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Classification Create',
                'action_name' => 'Visited Create Classification Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('classifications.create_classifications');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Classification in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'classification_code' 	=> 'required|string|max:255|unique:classifications',
            'classification_name' 	=> 'required|string|max:255',
            'classification_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Classification::create([
                'classification_code' 	=> strtoupper($request->classification_code),
                'classification_name' 	=> strtoupper($request->classification_name),
                'classification_status' => $request->classification_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Classification Created',
                'action_name' => 'Created new Classification',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('classifications.index')->with('gmsg','Classification created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Classification Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $classifications = Classification::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Classification Upload',
                'action_name' => 'Visited Classification Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('classifications.upload_classifications',compact('classifications'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Classificationclass')); Add this if uncommen
    }

    /**
     * Classification CSV Upload Function.
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
                    Classification::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Classification Uploaded',
                    'action_name' => 'Uploaded Multiple classifications with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('classifications.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('classifications.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Classification  $classification
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
     * Display the specified Classification.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        $isInserted = Activity::create([
            'module_name' => 'Classification Show',
            'action_name' => 'Checked Classification Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('classifications.show_classifications',compact('classification'));
    }


    /**
     * Show Classification Edit Page.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        $isInserted = Activity::create([
            'module_name' => 'Classification Edit',
            'action_name' => 'Visited Classification Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('classifications.update_classifications',compact('classification'));
    }

    /**
     * Update the specified Classification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification)
    {
        
        $validate = $this->validate($request,[
            'classification_code'      =>  'required|string|max:255',
            'classification_name'      =>  'required|string|max:255',
            'classification_status'    =>  'required',
        ]);
        if($validate)
        {

            $classification->classification_code = strtoupper($request->classification_code);
            $classification->classification_name = strtoupper($request->classification_name);
            $classification->classification_status = $request->classification_status;
            $classification->updated_by    = Auth::user()->fname;

            if($classification->save())
            {
                $Classification = Activity::create([
                'module_name' => 'Classification Updated',
                'action_name' => 'Edited a Classification',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('classifications.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="classifications_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Classification Sample',
                'action_name' => 'Download Classification Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Classification Table.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function export_classifications()
    {
        return Excel::download(new ClassificationsExport, 'Classifications.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $classifications = Classification::onlyTrashed()->get();
        $getFields = Classification::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Classification Deleted',
                'action_name' => 'Checked Classification Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('classifications.deleted_classifications',compact('classifications'));
        }else{
            return redirect()->route('classifications.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single classification.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Classification::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Classification Restore',
            'action_name' => 'Restored Single Classification',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('classifications.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Classification::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Classification Bulk Restore',
            'action_name' => 'Restored Multiple classifications',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('classifications.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Classification.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Classification::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Classification Permanent Delete',
            'action_name' => 'Permanently Deleted Single Classification',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk classifications.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Classification::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Classification Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple classifications',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Classification.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Classification::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Classification',
            'action_name' => 'Trashed a Classification',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk classifications.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Classification::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Classification',
            'action_name' => 'Trashed Multiple classifications',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
