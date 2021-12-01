<?php

namespace App\Http\Controllers\DocumentType;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocumentTypesExport;
use Illuminate\Http\Request;
use App\DocumentType;
use App\Activity;
use Auth;

class DocumentTypeController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_documenttypes']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display DocumentType listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documenttypes = DocumentType::get();
        $isInserted = Activity::create([
                'module_name' => 'DocumentType index',
                'action_name' => 'Visited DocumentType Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documenttypes.index_documenttypes',compact('documenttypes'));
    }
	
	/**
     * gET DocumentType.
     *
     * @param  \App\DocumentType  DocumentType_code
     * @return \Illuminate\Http\Response
     */
    public function check_documenttypes (Request $request)
    {
       try {
        $getFields = DocumentType::where('documenttype_code',$request->documenttype_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET DocumentType.
     *
     * @param  \App\DocumentType  DocumentType_code
     * @return \Illuminate\Http\Response
     */
    public function get_documenttypes (Request $request)
    {
       try {
        $getFields = DocumentType::where('documenttype_name',$request->documenttype_name)->where('documenttype_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New DocumentType Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationdocumenttypes::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'DocumentType Create',
                'action_name' => 'Visited Create DocumentType Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documenttypes.create_documenttypes');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created DocumentType in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'documenttype_code' 	=> 'required|string|max:255|unique:documenttypes',
            'documenttype_name' 	=> 'required|string|max:255',
            'documenttype_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = DocumentType::create([
                'documenttype_code' 	=> strtoupper($request->documenttype_code),
                'documenttype_name' 	=> strtoupper($request->documenttype_name),
                'documenttype_status' => $request->documenttype_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'DocumentType Created',
                'action_name' => 'Created new DocumentType',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('documenttypes.index')->with('gmsg','DocumentType created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad DocumentType Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $documenttypes = DocumentType::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'DocumentType Upload',
                'action_name' => 'Visited DocumentType Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documenttypes.upload_documenttypes',compact('documenttypes'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('DocumentTypeclass')); Add this if uncommen
    }

    /**
     * DocumentType CSV Upload Function.
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
                    DocumentType::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'DocumentType Uploaded',
                    'action_name' => 'Uploaded Multiple documenttypes with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('documenttypes.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('documenttypes.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\DocumentType  $documenttype
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
     * Display the specified DocumentType.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentType $documenttype)
    {
        $isInserted = Activity::create([
            'module_name' => 'DocumentType Show',
            'action_name' => 'Checked DocumentType Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('documenttypes.show_documenttypes',compact('documenttype'));
    }


    /**
     * Show DocumentType Edit Page.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentType $documenttype)
    {
        $isInserted = Activity::create([
            'module_name' => 'DocumentType Edit',
            'action_name' => 'Visited DocumentType Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('documenttypes.update_documenttypes',compact('documenttype'));
    }

    /**
     * Update the specified DocumentType in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocumentType $documenttype)
    {
        
        $validate = $this->validate($request,[
            'documenttype_code'      =>  'required|string|max:255',
            'documenttype_name'      =>  'required|string|max:255',
            'documenttype_status'    =>  'required',
        ]);
        if($validate)
        {

            $documenttype->documenttype_code = strtoupper($request->documenttype_code);
            $documenttype->documenttype_name = strtoupper($request->documenttype_name);
            $documenttype->documenttype_status = $request->documenttype_status;
            $documenttype->updated_by    = Auth::user()->fname;

            if($documenttype->save())
            {
                $DocumentType = Activity::create([
                'module_name' => 'DocumentType Updated',
                'action_name' => 'Edited a DocumentType',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('documenttypes.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="documenttypes_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'DocumentType Sample',
                'action_name' => 'Download DocumentType Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in DocumentType Table.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function export_documenttypes()
    {
        return Excel::download(new DocumentTypesExport, 'DocumentTypes.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $documenttypes = DocumentType::onlyTrashed()->get();
        $getFields = DocumentType::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'DocumentType Deleted',
                'action_name' => 'Checked DocumentType Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('documenttypes.deleted_documenttypes',compact('documenttypes'));
        }else{
            return redirect()->route('documenttypes.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single documenttype.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = DocumentType::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'DocumentType Restore',
            'action_name' => 'Restored Single DocumentType',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('documenttypes.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = DocumentType::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'DocumentType Bulk Restore',
            'action_name' => 'Restored Multiple documenttypes',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('documenttypes.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single DocumentType.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = DocumentType::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'DocumentType Permanent Delete',
            'action_name' => 'Permanently Deleted Single DocumentType',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk documenttypes.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = DocumentType::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'DocumentType Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple documenttypes',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single DocumentType.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = DocumentType::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'DocumentType',
            'action_name' => 'Trashed a DocumentType',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk documenttypes.
     *
     * @param  \App\DocumentType  $documenttype
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = DocumentType::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'DocumentType',
            'action_name' => 'Trashed Multiple documenttypes',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
