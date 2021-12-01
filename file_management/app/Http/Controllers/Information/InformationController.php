<?php

namespace App\Http\Controllers\Information;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InformationExport;
use Illuminate\Http\Request;
use App\Information;
use App\Activity;
use Auth;

class InformationController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_information']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Information listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $information = Information::get();
        return view('information.index_information',compact('information'));
    }
	
	/**
     * gET Information.
     *
     * @param  \App\Information  Information_code
     * @return \Illuminate\Http\Response
     */
    public function check_information (Request $request)
    {
       try {
        $getFields = Information::where('information_code',$request->information_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Information.
     *
     * @param  \App\Information  Information_code
     * @return \Illuminate\Http\Response
     */
    public function get_information (Request $request)
    {
       try {
        $getFields = Information::where('information_name',$request->information_name)->where('information_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Information Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('information.create_information');
    }

    
    /**
     * Store a newly created Information in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'about_label' 	=> 'required|string|max:255|unique:information',
            'about_value' 	=> 'required|string|max:255',
            'about_status' => 'required',
        ]);
        if($validate)
        {
            $isInserted = Information::create([
                'about_label' 	=> $request->about_label,
                'about_value' 	=> $request->about_value,
                'about_status' => $request->about_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                return redirect()->route('information.index')->with('gmsg','Information created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Information Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $information = Information::latest()->paginate(10);
        return view('information.upload_information',compact('information'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Informationclass')); Add this if uncommen
    }

    /**
     * Information CSV Upload Function.
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
                    Information::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                return redirect()->route('information.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('information.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Information  $information
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
     * Display the specified Information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        return view('information.show_information',compact('information'));
    }


    /**
     * Show Information Edit Page.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('information.update_information',compact('information'));
    }

    /**
     * Update the specified Information in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        
        $validate = $this->validate($request,[
            'about_label'      =>  'required|string|max:255',
            'about_value'      =>  'required|string|max:255',
            'about_status'    =>  'required',
        ]);
        if($validate)
        {

            $information->about_label = $request->about_label;
            $information->about_value = $request->about_value;
            $information->about_status = $request->about_status;
            $information->updated_by    = Auth::user()->fname;

            if($information->save())
            {
                return redirect()->route('information.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="information_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Information Table.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function export_information()
    {
        return Excel::download(new InformationExport, 'Information.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $information = Information::onlyTrashed()->get();
        $getFields = Information::onlyTrashed()->count();

        if($getFields > 0){
            return view('information.deleted_information',compact('information'));
        }else{
            return redirect()->route('information.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Information::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            return redirect()->route('information.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Information::onlyTrashed()->restore();
        if($restored)
        {
            return redirect()->route('information.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Information::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Information::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Information::where('id',$id)->delete();
        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk information.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Information::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
