<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MastersExport;
use Illuminate\Http\Request;
use App\Master;
use App\Activity;
use Auth;

class MasterController extends Controller
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
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_masters']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Master listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masters = Master::get();
        $isInserted = Activity::create([
                'module_name' => 'Master index',
                'action_name' => 'Visited Master Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('masters.index_masters',compact('masters'));
    }
	
	/**
     * gET Master.
     *
     * @param  \App\Master  Master_code
     * @return \Illuminate\Http\Response
     */
    public function check_masters (Request $request)
    {
       try {
        $getFields = Master::where('master_code',$request->master_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Master.
     *
     * @param  \App\Master  Master_code
     * @return \Illuminate\Http\Response
     */
    public function get_masters (Request $request)
    {
       try {
        $getFields = Master::where('master_name',$request->master_name)->where('master_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Master Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationmasters::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Master Create',
                'action_name' => 'Visited Create Master Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('masters.create_masters');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Master in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'master_code' 	=> 'required|string|max:255|unique:masters',
            'master_name' 	=> 'required|string|max:255',
            'master_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Master::create([
                'master_code' 	=> $request->master_code,
                'master_name' 	=> $request->master_name,
                'master_status' => $request->master_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Master Created',
                'action_name' => 'Created new Master',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('masters.index')->with('gmsg','Master created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Master Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $masters = Master::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Master Upload',
                'action_name' => 'Visited Master Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('masters.upload_masters',compact('masters'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Masterclass')); Add this if uncommen
    }

    /**
     * Master CSV Upload Function.
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
                    Master::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Master Uploaded',
                    'action_name' => 'Uploaded Multiple masters with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('masters.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('masters.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Master  $master
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
     * Display the specified Master.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        $isInserted = Activity::create([
            'module_name' => 'Master Show',
            'action_name' => 'Checked Master Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('masters.show_masters',compact('master'));
    }


    /**
     * Show Master Edit Page.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        $isInserted = Activity::create([
            'module_name' => 'Master Edit',
            'action_name' => 'Visited Master Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('masters.update_masters',compact('master'));
    }

    /**
     * Update the specified Master in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
        
        $validate = $this->validate($request,[
            'master_code'      =>  'required|string|max:255',
            'master_name'      =>  'required|string|max:255',
            'master_status'    =>  'required',
        ]);
        if($validate)
        {

            $master->master_code = $request->master_code;
            $master->master_name = $request->master_name;
            $master->master_status = $request->master_status;
            $master->updated_by    = Auth::user()->fname;

            if($master->save())
            {
                $Master = Activity::create([
                'module_name' => 'Master Updated',
                'action_name' => 'Edited a Master',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('masters.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="masters_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Master Sample',
                'action_name' => 'Download Master Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Master Table.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function export_masters()
    {
        return Excel::download(new MastersExport, 'Masters.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $masters = Master::onlyTrashed()->get();
        $getFields = Master::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Master Deleted',
                'action_name' => 'Checked Master Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('masters.deleted_masters',compact('masters'));
        }else{
            return redirect()->route('masters.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single master.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Master::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Master Restore',
            'action_name' => 'Restored Single Master',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('masters.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Master::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Master Bulk Restore',
            'action_name' => 'Restored Multiple masters',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('masters.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Master.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Master::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Master Permanent Delete',
            'action_name' => 'Permanently Deleted Single Master',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk masters.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Master::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Master Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple masters',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Master.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Master::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Master',
            'action_name' => 'Trashed a Master',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk masters.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Master::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Master',
            'action_name' => 'Trashed Multiple masters',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
