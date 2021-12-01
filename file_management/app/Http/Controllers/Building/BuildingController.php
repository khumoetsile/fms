<?php

namespace App\Http\Controllers\Building;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BuildingsExport;
use Illuminate\Http\Request;
use App\Building;
use App\Activity;
use Auth;

class BuildingController extends Controller
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
     * Display Building listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::get();
        $isInserted = Activity::create([
                'module_name' => 'Building index',
                'action_name' => 'Visited Building Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('buildings.index_buildings',compact('buildings'));
    }
	
	/**
     * gET Building.
     *
     * @param  \App\Building  Building_code
     * @return \Illuminate\Http\Response
     */
    public function check_buildings (Request $request)
    {
       try {
        //$getFields = Building::where('building_code',$request->building_code)->first();
        return; // response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Building.
     *
     * @param  \App\Building  Building_code
     * @return \Illuminate\Http\Response
     */
    public function get_buildings (Request $request)
    {
       try {
        $getFields = Building::where('building_name',$request->building_name)->where('building_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Building Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationbuildings::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Building Create',
                'action_name' => 'Visited Create Building Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('buildings.create_buildings');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Building in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'building_name' 	=> 'required|string|max:255',
        ]);
        
        if($validate)
        {
            $isInserted = Building::create([
                'building_name' 	=> strtoupper($request->building_name),
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Building Created',
                'action_name' => 'Created new Building',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('buildings.index')->with('gmsg','Building created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Building Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $buildings = Building::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Building Upload',
                'action_name' => 'Visited Building Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('buildings.upload_buildings',compact('buildings'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Buildingclass')); Add this if uncommen
    }

    /**
     * Building CSV Upload Function.
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
                    Building::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Building Uploaded',
                    'action_name' => 'Uploaded Multiple buildings with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('buildings.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('buildings.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Building  $building
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
     * Display the specified Building.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        $isInserted = Activity::create([
            'module_name' => 'Building Show',
            'action_name' => 'Checked Building Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('buildings.show_buildings',compact('building'));
    }


    /**
     * Show Building Edit Page.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        $isInserted = Activity::create([
            'module_name' => 'Building Edit',
            'action_name' => 'Visited Building Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('buildings.update_buildings',compact('building'));
    }

    /**
     * Update the specified Building in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        
        $validate = $this->validate($request,[
            'building_name'      =>  'required|string|max:255',
        ]);
        if($validate)
        {

            $building->building_name = strtoupper($request->building_name);
            $building->updated_by    = Auth::user()->fname;

            if($building->save())
            {
                $Building = Activity::create([
                'module_name' => 'Building Updated',
                'action_name' => 'Edited a Building',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('buildings.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="buildings_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Building Sample',
                'action_name' => 'Download Building Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Building Table.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function export_buildings()
    {
        return Excel::download(new BuildingsExport, 'Buildings.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $buildings = Building::onlyTrashed()->get();
        $getFields = Building::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Building Deleted',
                'action_name' => 'Checked Building Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('buildings.deleted_buildings',compact('buildings'));
        }else{
            return redirect()->route('buildings.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single building.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Building::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Building Restore',
            'action_name' => 'Restored Single Building',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('buildings.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Building::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Building Bulk Restore',
            'action_name' => 'Restored Multiple buildings',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('buildings.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Building.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Building::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Building Permanent Delete',
            'action_name' => 'Permanently Deleted Single Building',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk buildings.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Building::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Building Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple buildings',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Building.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Building::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Building',
            'action_name' => 'Trashed a Building',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk buildings.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Building::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Building',
            'action_name' => 'Trashed Multiple buildings',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
