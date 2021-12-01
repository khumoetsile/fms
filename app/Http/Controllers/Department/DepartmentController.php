<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DepartmentsExport;
use Illuminate\Http\Request;
use App\Department;
use App\Section;
use App\Building;
use App\Office;
use App\Activity;
use Auth;

class DepartmentController extends Controller
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
     * Display Department listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::get();
        $isInserted = Activity::create([
                'module_name' => 'Department index',
                'action_name' => 'Visited Department Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('departments.index_departments',compact('departments'));
    }
	
	/**
     * gET Department.
     *
     * @param  \App\Department  Department_code
     * @return \Illuminate\Http\Response
     */
    public function check_departments (Request $request)
    {
       try {
        $getFields = Department::where('department_code',$request->department_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Department.
     *
     * @param  \App\Department  Department_code
     * @return \Illuminate\Http\Response
     */
    public function get_departments (Request $request)
    {
       try {
        $getFields = Department::where('department_name',$request->department_name)->where('department_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Department Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::get();
        $buildings = Building::get();
        $offices = Office::get();
        $isInserted = Activity::create([
                'module_name' => 'Department Create',
                'action_name' => 'Visited Create Department Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('departments.create_departments',compact('sections','buildings','offices'));
    }

    
    /**
     * Store a newly created Department in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'department_name' 	=> 'required|string|max:255',
        ]);
        
        if($validate)
        {
            $isInserted = Department::create([
                'department_name' 	=> $request->department_name,
                'section_name'      => $request->section_name,
                'building_name'    => $request->building_name,
                'office_name'       => $request->office_name,
                'registered_date'   => $request->registered_date,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Department Created',
                'action_name' => 'Created new Department',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('departments.index')->with('gmsg','Department created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Department Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $departments = Department::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Department Upload',
                'action_name' => 'Visited Department Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('departments.upload_departments',compact('departments'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Departmentclass')); Add this if uncommen
    }

    /**
     * Department CSV Upload Function.
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
                    Department::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Department Uploaded',
                    'action_name' => 'Uploaded Multiple departments with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('departments.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('departments.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Department  $department
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
     * Display the specified Department.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $isInserted = Activity::create([
            'module_name' => 'Department Show',
            'action_name' => 'Checked Department Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('departments.show_departments',compact('department'));
    }


    /**
     * Show Department Edit Page.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $sections = Section::get();
        $buildings = Building::get();
        $offices = Office::get();
        $isInserted = Activity::create([
            'module_name' => 'Department Edit',
            'action_name' => 'Visited Department Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('departments.update_departments',compact('department','sections','buildings','offices'));
    }

    /**
     * Update the specified Department in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        
        $validate = $this->validate($request,[
            'department_name'      =>  'required|string|max:255',
        ]);
        if($validate)
        {

            $department->department_name = $request->department_name;
            $department->section_name = $request->section_name;
            $department->building_name = $request->building_name;
            $department->office_name = $request->office_name;
            $department->office_name = $request->office_name;
            $department->updated_by    = Auth::user()->fname;

            if($department->save())
            {
                $Department = Activity::create([
                'module_name' => 'Department Updated',
                'action_name' => 'Edited a Department',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('departments.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="departments_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Department Sample',
                'action_name' => 'Download Department Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Department Table.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function export_departments()
    {
        return Excel::download(new DepartmentsExport, 'Departments.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $departments = Department::onlyTrashed()->get();
        $getFields = Department::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Department Deleted',
                'action_name' => 'Checked Department Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('departments.deleted_departments',compact('departments'));
        }else{
            return redirect()->route('departments.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single department.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Department::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Department Restore',
            'action_name' => 'Restored Single Department',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('departments.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Department::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Department Bulk Restore',
            'action_name' => 'Restored Multiple departments',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('departments.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Department.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Department::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Department Permanent Delete',
            'action_name' => 'Permanently Deleted Single Department',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk departments.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Department::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Department Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple departments',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Department.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Department::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Department',
            'action_name' => 'Trashed a Department',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk departments.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Department::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Department',
            'action_name' => 'Trashed Multiple departments',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
