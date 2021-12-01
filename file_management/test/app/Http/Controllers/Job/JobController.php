<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;
use Illuminate\Http\Request;
use App\Job;
use App\Activity;
use Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    
    function __construct()
    {
        $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Admin-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:Admin-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:Admin-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:Admin-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_jobs']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Job listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::get();
        if(Auth::user()){
        $isInserted = Activity::create([
                'module_name' => 'Job index',
                'action_name' => 'Visited Job Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('jobs.index_jobs',compact('jobs'));
    }
    else
        return view('jobs.front_view_jobs',compact('jobs'));
        
    }
	
	/**
     * gET Job.
     *
     * @param  \App\Job  Job_code
     * @return \Illuminate\Http\Response
     */
    public function check_jobs (Request $request)
    {
       try {
        $getFields = Job::where('job_code',$request->job_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Job.
     *
     * @param  \App\Job  Job_code
     * @return \Illuminate\Http\Response
     */
    public function get_jobs (Request $request)
    {
       try {
        $getFields = Job::where('job_name',$request->job_name)->where('job_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Job Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationjobs::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Job Create',
                'action_name' => 'Visited Create Job Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('jobs.create_jobs');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Job in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
            $isInserted = Job::create([
                'job_code' 	=> strtoupper($request->job_code),
                'job_description' 	=> strtoupper($request->job_description),
                'job_link'  => strtoupper($request->job_link),
                'job_status' => $request->job_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Job Created',
                'action_name' => 'Created new Job',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('jobs.index')->with('gmsg','Job created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

       
    }

    /**
     * Upoad Job Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $jobs = Job::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Job Upload',
                'action_name' => 'Visited Job Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('jobs.upload_jobs',compact('jobs'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Jobclass')); Add this if uncommen
    }

    /**
     * Job CSV Upload Function.
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
                    Job::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Job Uploaded',
                    'action_name' => 'Uploaded Multiple jobs with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('jobs.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('jobs.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Job  $job
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
     * Display the specified Job.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
    if(Auth::user()){
        $isInserted = Activity::create([
            'module_name' => 'Job Show',
            'action_name' => 'Checked Job Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('jobs.show_jobs',compact('job'));
    }
    else
        return view('jobs.view_job_details',compact('job'));
    }


    /**
     * Show Job Edit Page.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $isInserted = Activity::create([
            'module_name' => 'Job Edit',
            'action_name' => 'Visited Job Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('jobs.update_jobs',compact('job'));
    }

    /**
     * Update the specified Job in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        
        $validate = $this->validate($request,[
            'job_code'      =>  'required|string|max:255',
            'job_description'      =>  'required|string|max:255',
            'job_link'      =>  'required|string|max:255',
            'job_status'    =>  'required',
        ]);
        if($validate)
        {

            $job->job_code = strtoupper($request->job_code);
            $job->job_description = strtoupper($request->job_description);
            $job->job_link = strtoupper($request->job_link);
            $job->job_status = $request->job_status;
            $job->updated_by    = Auth::user()->fname;

            if($job->save())
            {
                $Job = Activity::create([
                'module_name' => 'Job Updated',
                'action_name' => 'Edited a Job',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('jobs.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="jobs_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Job Sample',
                'action_name' => 'Download Job Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Job Table.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function export_jobs()
    {
        return Excel::download(new JobsExport, 'Jobs.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $jobs = Job::onlyTrashed()->get();
        $getFields = Job::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Job Deleted',
                'action_name' => 'Checked Job Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('jobs.deleted_jobs',compact('jobs'));
        }else{
            return redirect()->route('jobs.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single job.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Job::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Job Restore',
            'action_name' => 'Restored Single Job',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('jobs.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Job::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Job Bulk Restore',
            'action_name' => 'Restored Multiple jobs',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('jobs.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Job.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Job::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Job Permanent Delete',
            'action_name' => 'Permanently Deleted Single Job',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk jobs.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Job::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Job Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple jobs',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Job.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Job::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Job',
            'action_name' => 'Trashed a Job',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk jobs.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Job::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Job',
            'action_name' => 'Trashed Multiple jobs',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
