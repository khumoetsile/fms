<?php

namespace App\Http\Controllers\Title;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TitlesExport;
use Illuminate\Http\Request;
use App\Title;
use App\Activity;
use Auth;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Admin-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:Admin-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:Admin-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:Admin-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_titles']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Title listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::get();
        $isInserted = Activity::create([
                'module_name' => 'Title index',
                'action_name' => 'Visited Title Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('titles.index_titles',compact('titles'));
    }
	
	/**
     * gET Title.
     *
     * @param  \App\Title  Title_code
     * @return \Illuminate\Http\Response
     */
    public function check_titles (Request $request)
    {
       try {
        $getFields = Title::where('title_code',$request->title_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Title.
     *
     * @param  \App\Title  Title_code
     * @return \Illuminate\Http\Response
     */
    public function get_titles (Request $request)
    {
       try {
        $getFields = Title::where('title_name',$request->title_name)->where('title_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Title Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationtitles::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Title Create',
                'action_name' => 'Visited Create Title Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('titles.create_titles');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Title in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'title_code' 	=> 'required|string|max:255|unique:titles',
            'title_name' 	=> 'required|string|max:255',
            'title_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Title::create([
                'title_code' 	=> strtoupper($request->title_code),
                'title_name' 	=> strtoupper($request->title_name),
                'title_status' => $request->title_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Title Created',
                'action_name' => 'Created new Title',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('titles.index')->with('gmsg','Title created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }
     /**
     * Display the specified Title.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        $isInserted = Activity::create([
            'module_name' => 'Title Show',
            'action_name' => 'Checked Title Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('titles.show_titles',compact('title'));
    }


    /**
     * Show Title Edit Page.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        $isInserted = Activity::create([
            'module_name' => 'Title Edit',
            'action_name' => 'Visited Title Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('titles.update_titles',compact('title'));
    }

    /**
     * Update the specified Title in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        
        $validate = $this->validate($request,[
            'title_code'      =>  'required|string|max:255',
            'title_name'      =>  'required|string|max:255',
            'title_status'    =>  'required',
        ]);
        if($validate)
        {

            $title->title_code = strtoupper($request->title_code);
            $title->title_name = strtoupper($request->title_name);
            $title->title_status = $request->title_status;
            $title->updated_by    = Auth::user()->fname;

            if($title->save())
            {
                $Title = Activity::create([
                'module_name' => 'Title Updated',
                'action_name' => 'Edited a Title',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('titles.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $titles = Title::onlyTrashed()->get();
        $getFields = Title::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Title Deleted',
                'action_name' => 'Checked Title Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('titles.deleted_titles',compact('titles'));
        }else{
            return redirect()->route('titles.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single title.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Title::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Title Restore',
            'action_name' => 'Restored Single Title',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('titles.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Title::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Title Bulk Restore',
            'action_name' => 'Restored Multiple titles',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('titles.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Title.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Title::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Title Permanent Delete',
            'action_name' => 'Permanently Deleted Single Title',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk titles.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Title::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Title Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple titles',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Title.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Title::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Title',
            'action_name' => 'Trashed a Title',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk titles.
     *
     * @param  \App\Title  $title
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Title::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Title',
            'action_name' => 'Trashed Multiple titles',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
