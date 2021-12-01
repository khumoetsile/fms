<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SectionsExport;
use Illuminate\Http\Request;
use App\Section;
use App\Activity;
use Auth;

class SectionController extends Controller
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
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_sections']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Section listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        $isInserted = Activity::create([
                'module_name' => 'Section index',
                'action_name' => 'Visited Section Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('sections.index_sections',compact('sections'));
    }
	
	/**
     * gET Section.
     *
     * @param  \App\Section  Section_code
     * @return \Illuminate\Http\Response
     */
    public function check_sections (Request $request)
    {
       try {
       // $getFields = Section::where('section_code',$request->section_code)->first();
        return; //response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Section.
     *
     * @param  \App\Section  Section_code
     * @return \Illuminate\Http\Response
     */
    public function get_sections (Request $request)
    {
       try {
        $getFields = Section::where('section_name',$request->section_name)->where('section_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Section Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationsections::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Section Create',
                'action_name' => 'Visited Create Section Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('sections.create_sections');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Section in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'section_name' 	=> 'required|string|max:255',
        ]);
        
        if($validate)
        {
            $isInserted = Section::create([
                'section_name' 	=> $request->section_name,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Section Created',
                'action_name' => 'Created new Section',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('sections.index')->with('gmsg','Section created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Section Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $sections = Section::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Section Upload',
                'action_name' => 'Visited Section Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('sections.upload_sections',compact('sections'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Sectionclass')); Add this if uncommen
    }

    /**
     * Section CSV Upload Function.
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
                    Section::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Section Uploaded',
                    'action_name' => 'Uploaded Multiple sections with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('sections.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('sections.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Section  $section
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
     * Display the specified Section.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        $isInserted = Activity::create([
            'module_name' => 'Section Show',
            'action_name' => 'Checked Section Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('sections.show_sections',compact('section'));
    }


    /**
     * Show Section Edit Page.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        $isInserted = Activity::create([
            'module_name' => 'Section Edit',
            'action_name' => 'Visited Section Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('sections.update_sections',compact('section'));
    }

    /**
     * Update the specified Section in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        
        $validate = $this->validate($request,[
            'section_name'      =>  'required|string|max:255',
        ]);
        if($validate)
        {

            $section->section_name = $request->section_name;
            $section->updated_by    = Auth::user()->fname;

            if($section->save())
            {
                $Section = Activity::create([
                'module_name' => 'Section Updated',
                'action_name' => 'Edited a Section',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('sections.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="sections_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Section Sample',
                'action_name' => 'Download Section Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Section Table.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function export_sections()
    {
        return Excel::download(new SectionsExport, 'Sections.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $sections = Section::onlyTrashed()->get();
        $getFields = Section::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Section Deleted',
                'action_name' => 'Checked Section Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('sections.deleted_sections',compact('sections'));
        }else{
            return redirect()->route('sections.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single section.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Section::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Section Restore',
            'action_name' => 'Restored Single Section',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('sections.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Section::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Section Bulk Restore',
            'action_name' => 'Restored Multiple sections',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('sections.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Section.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Section::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Section Permanent Delete',
            'action_name' => 'Permanently Deleted Single Section',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk sections.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Section::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Section Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple sections',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Section.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Section::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Section',
            'action_name' => 'Trashed a Section',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk sections.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Section::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Section',
            'action_name' => 'Trashed Multiple sections',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
