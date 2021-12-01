<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilesExport;
use Illuminate\Http\Request;
use App\File;
use App\Activity;
use App\Office;
use App\Approval;
use App\User;
use App\Master;
use App\Gender;
use App\Category;
use App\Classification;
use Auth;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:SuperUser-list|SuperUser-create|SuperUser-edit|SuperUser-delete|RMU-list|RMU-create|RMU-edit|RMU-delete|ActionOfficer-list|ActionOfficer-create|ActionOfficer-edit|ActionOfficer-delete', ['only' => ['index','show']]);
        $this->middleware('permission:SuperUser-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:SuperUser-edit|ActionOfficer-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:SuperUser-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:SuperUser-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_offices']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display File listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        
        if($user && $user->hasRole('ActionOfficer'))
        $files = File::get()->where('requestedFile','0')->where('aprovedReq','0');
        else
            $files = File::get();
        $isInserted = Activity::create([
                'module_name' => 'File index',
                'action_name' => 'Visited File Index',
                'user_name' => Auth::user()->fname ,
            ]);
        $file = File::first();
        //$isInserted = Approval::create([
          //      'username' => $user->username,
            //    'file_name' => $file->file_name,
              //  'status' => '1',
            //]);
        return view('files.index_files',compact('files'));
    }
    public function need_aprove()
    {
        $files = File::get()->where('requestedFile','1')->where('aprovedReq','0');
        $isInserted = Activity::create([
                'module_name' => 'File Request',
                'action_name' => 'Visited File Requests',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('files.request_aprove',compact('files'));
    }
     public function requestedFile()
    {
        $user=Auth::user();
        $files = File::get()->where('requestedFile', '1')->where('aprovedReq', '0')->where('rqUser', $user->username);
        $isInserted = Activity::create([
                'module_name' => 'File index',
                'action_name' => 'Visited File Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('files.index_files',compact('files'));
    }
     public function aprovedRequest()
    {
        $user=Auth::user();
        $files = File::get()->where('aprovedReq', '1')->where('requestedFile', '0')->where('rqUser', $user->username);
        $isInserted = Activity::create([
                'module_name' => 'File index',
                'action_name' => 'Visited File Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('files.index_files',compact('files'));
    }
    public function rqaprove(Request $request)
    {
         try {
        $file= File::where('id',$request->id)->first();
        $file->requestedFile ='1';
        $getFields = $file->save();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
}
    public function mark_aprove(Request $request)
    {
         try {
        $file= File::where('id',$request->id)->first();
         $file->requestedFile ='0';
        $file->aprovedReq ='1';
        $getFields = $file->save();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
    public function forwarded_files()
    {
        $user=Auth::user();
        $files = File::get()->where('from', $user->fname);
        return view('files.forwarded',compact('files'));
    }
	public function recieved_files()
    {
        $user=Auth::user();
        $files = File::get()->where('personnel', $user->fname)->where('accepted','0');
        return view('files.incomming',compact('files'));
    }
    public function pening_files()
    {
        $user=Auth::user();
        if($user->hasRole('SuperUser') || $user->hasRole('ActionUser'))
        $files = File::get()->where('personnel', $user->fname)->where('accepted','1')->where('keeped', '0')->where('deferred', '0')->where('released', '0')->where('cancelled', '0');
        else{
            $files = File::get()->where('accepted','1')->where('keeped', '0')->where('deferred', '0')->where('released', '0')->where('cancelled', '0');
        }
        return view('files.pending',compact('files'));
    }
    public function deferred_files()
    {
        $user=Auth::user();
        $files = File::get()->where('personnel', $user->fname)->where('accepted','1')->where('keeped', '0')->where('deferred', '1')->where('released', '0')->where('cancelled', '0');
        return view('files.deferred_list',compact('files'));
    }
    public function cancelled_files()
    {
        $user=Auth::user();
        $files = File::get()->where('personnel', $user->fname)->where('accepted','1')->where('keeped', '0')->where('deferred', '0')->where('released', '0')->where('cancelled', '1');
        return view('files.cancel_list',compact('files'));
    }
    public function released_files()
    {
        $user=Auth::user();
        $files = File::get()->where('personnel', $user->fname)->where('accepted','1')->where('keeped', '0')->where('deferred', '0')->where('released', '1')->where('cancelled', '0');
        return view('files.released_list',compact('files'));
    }
    public function kept_files()
    {

        $user=Auth::user();
        $files = File::get()->where('personnel', $user->fname)->where('accepted','1')->where('keeped', '1')->where('deferred', '0')->where('released', '0')->where('cancelled', '0');
        return view('files.kept_list',compact('files'));
    }
	/**
     * gET File.
     *
     * @param  \App\File  File_code
     * @return \Illuminate\Http\Response
     */
    public function check_files (Request $request)
    {
       try {
        $getFields = File::where('file_code',$request->file_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET File.
     *
     * @param  \App\File  File_code
     * @return \Illuminate\Http\Response
     */
    public function get_files (Request $request)
    {
       try {
        $getFields = File::where('file_name',$request->file_name)->where('file_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	 /**
     * gET File.
     *
     * @param  \App\File  File_code
     * @return \Illuminate\Http\Response
     */
    public function get_office_users (Request $request)
    {
       try {
        $getFields = User::where('office_name',$request->office_name)->pluck('fname','id');
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
    
    /**
     * Show Create New File Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $users= User::get();
        $user= Auth::user();
        $masters= Master::get();
        $current_user = $user->fname;
        $file= File::orderby('id', 'desc')->first();
        $ref_no =preg_replace('/[^0-9]/', '', $file->reference_no);
        $ref=$file ? (string)((int)$ref_no+1) : '1';
        $reference_no = "MFD-". (string)($ref);
        $isInserted = Activity::create([
                'module_name' => 'File Create',
                'action_name' => 'Visited Create File Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('files.create_files',compact('categories','classifications','reference_no','users','user','offices','masters'));
    }

    
    /**
     * Store a newly created File in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'category'             => 'required|string|max:255',
            'file_description'     => 'required|string|max:255',
            'reference_no'         => 'required|string|max:255',
        ]);
        
        if($validate)
        {
            $isInserted = File::create([
                'file_name' 	       => $request->file_name,
                'category'             => $request->category,
                'volume_no'            => $request->volume_no,
                'file_description'     => $request->file_description,
                'master_name'          => $request->master_name,
                'classification'       => $request->classification,
                'reference_no'         => $request->reference_no,
                'created_by'           => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'File Created',
                'action_name' => 'Created new File',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('files.index')->with('gmsg','File created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad File Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $files = File::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'File Upload',
                'action_name' => 'Visited File Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('files.upload_files',compact('files'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Fileclass')); Add this if uncommen
    }

    /**
     * File CSV Upload Function.
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
                    File::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'File Uploaded',
                    'action_name' => 'Uploaded Multiple files with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('files.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('files.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\File  $file
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
     * Display the specified File.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $isInserted = Activity::create([
            'module_name' => 'File Show',
            'action_name' => 'Checked File Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.show_files',compact('file'));
    }

    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function accept($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();

        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.accept',compact('file','categories','classifications','offices','users'));
    }
    public function accept_update(Request $request,File $file)
    {

        $file = File::where('reference_no', $request->reference_no)->first();
        $file->accepted='1';
        $file->accepted_by=$request->personnel;
        $file->category=$request->category;
        $file->receiving_remarks=$request->receiving_remarks;
         if($file->save())
            {
                return redirect()->route('files.index')->with('gmsg','Data Successfully Updated ...');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }
    }
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function keep($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();

        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.keep',compact('file','categories','classifications','offices','users'));
    }
     public function keep_update(Request $request, File $file)
    {
        $file= File::where('reference_no', $request->refs_no)->first();
        $file->keeping_reason =$request->action_taken;
        $file->keeped ='1';
        if($file->save()){
             return redirect()->route('files.pening_files')->with('gmsg','Data Successfully Updated ...');
        }
        else
             return back()->with('bmsg','Something went wrong, please try later...');

    }
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function fwd($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();
        $user = Auth::user();
        $from_user = $user->fname;
        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.fwd',compact('file','categories','classifications','offices','users','from_user'));
    }
    public function fwd_update(Request $request, File $file)
    {
        $file= File::where('reference_no', $request->reference_no)->first();
        $file->fwd_reason =$request->action_taken;
        $file->keep_copy =$request->keep_copy;
        $file->reciever =$request->reciever;
        $file->personnel =$request->personnel;
        $file->route_purpose =$request->route_purpose;
        if($file->save()){
             return redirect()->route('files.pening_files')->with('gmsg','Data Successfully Updated ...');
        }
        else
             return back()->with('bmsg','Something went wrong, please try later...');
    }
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function release($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();

        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.release',compact('file','categories','classifications','offices','users'));
    }
    public function release_update(Request $request, File $file)
    {
        $file= File::where('reference_no', $request->refs_no)->first();
        $file->release_reason =$request->action_taken;
        $file->keep_copy =$request->keep_copy;
        $file->released ='1';
        if($file->save()){
             return redirect()->route('files.pening_files')->with('gmsg','Data Successfully Updated ...');
        }
        else
             return back()->with('bmsg','Something went wrong, please try later...');
    }
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function deferred($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();

        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.deferred',compact('file','categories','classifications','offices','users'));
    }
    public function deferred_update(Request $request, File $file)
    {
        $file= File::where('reference_no', $request->refs_no)->first();
        $file->deferred_reason =$request->reason_def;
        $file->deferred ='1';
        if($file->save()){
             return redirect()->route('files.pening_files')->with('gmsg','Data Successfully Updated ...');
        }
        else
             return back()->with('bmsg','Something went wrong, please try later...');
    }
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function cancelled($file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $offices= Office::get();
        $file= File::where('id', $file)->first();
        $users= User::get();

        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.cancelled',compact('file','categories','classifications','offices','users'));
    }
    public function cancelled_update(Request $request, File $file)
    {
        $file= File::where('reference_no', $request->refs_no)->first();
        $file->cancel_reason =$request->cancel_reason;
        $file->cancelled ='1';
        if($file->save()){
             return redirect()->route('files.pening_files')->with('gmsg','Data Successfully Updated ...');
        }
        else
             return back()->with('bmsg','Something went wrong, please try later...');
    }
     
    /**
     * Show File Edit Page.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $categories= Category::get();
        $classifications= Classification::get();
        $masters= Master::get();
        $offices= Office::get();
        $file= File::orderby('id', 'desc')->first();
         $users= User::get();
        $volume=$file ? (string)($file->volume) : '1';
        $isInserted = Activity::create([
            'module_name' => 'File Edit',
            'action_name' => 'Visited File Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('files.update_files',compact('file','categories','classifications','offices','users','masters'));
    }

    /**
     * Update the specified File in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $validate = $this->validate($request,[
            'reference_no'     => 'required|string|max:255'
        ]);
            $file->file_name         = $request->file_name;
            $file->category          = $request->category;
            $file->volume_no         = $request->volume_no;
            $file->file_description  = $request->file_description;
            $file->master_name       = $request->master_name;
            $file->classification    = $request->classification;
            $file->reference_no      = $request->reference_no;
            $file->created_by        = Auth::user()->fname;
            //$file->route_purpose   = $request->route_purpose;
            $file->updated_by        = Auth::user()->fname;
            if($file->save())
            {
                $File = Activity::create([
                'module_name' => 'File Updated',
                'action_name' => 'Edited a File',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('files.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
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
        
        $filename="files_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'File Sample',
                'action_name' => 'Download File Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in File Table.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function export_files()
    {
        return Excel::download(new FilesExport, 'Files.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $files = File::onlyTrashed()->get();
        $getFields = File::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'File Deleted',
                'action_name' => 'Checked File Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('files.deleted_files',compact('files'));
        }else{
            return redirect()->route('files.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single file.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = File::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'File Restore',
            'action_name' => 'Restored Single File',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('files.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = File::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'File Bulk Restore',
            'action_name' => 'Restored Multiple files',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('files.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single File.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = File::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'File Permanent Delete',
            'action_name' => 'Permanently Deleted Single File',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk files.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = File::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'File Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple files',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single File.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = File::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'File',
            'action_name' => 'Trashed a File',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk files.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = File::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'File',
            'action_name' => 'Trashed Multiple files',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
