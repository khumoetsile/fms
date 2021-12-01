<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocumentsExport;
use Illuminate\Http\Request;
use App\Document;
use App\Activity;
use Auth;

class DocumentController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_documents']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Document listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::get();
        $isInserted = Activity::create([
                'module_name' => 'Document index',
                'action_name' => 'Visited Document Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documents.index_documents',compact('documents'));
    }
	
	/**
     * gET Document.
     *
     * @param  \App\Document  Document_code
     * @return \Illuminate\Http\Response
     */
    public function check_documents (Request $request)
    {
       try {
        $getFields = Document::where('document_code',$request->document_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Document.
     *
     * @param  \App\Document  Document_code
     * @return \Illuminate\Http\Response
     */
    public function get_documents (Request $request)
    {
       try {
        $getFields = Document::where('document_name',$request->document_name)->where('document_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Document Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationdocuments::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Document Create',
                'action_name' => 'Visited Create Document Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documents.create_documents');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Document in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'document_code' 	=> 'required|string|max:255|unique:documents',
            'document_name' 	=> 'required|string|max:255',
            'document_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Document::create([
                'document_code' 	=> strtoupper($request->document_code),
                'document_name' 	=> strtoupper($request->document_name),
                'document_status' => $request->document_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Document Created',
                'action_name' => 'Created new Document',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('documents.index')->with('gmsg','Document created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Document Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $documents = Document::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Document Upload',
                'action_name' => 'Visited Document Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('documents.upload_documents',compact('documents'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Documentclass')); Add this if uncommen
    }

    /**
     * Document CSV Upload Function.
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
                    Document::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Document Uploaded',
                    'action_name' => 'Uploaded Multiple documents with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('documents.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('documents.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Document  $document
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
     * Display the specified Document.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $isInserted = Activity::create([
            'module_name' => 'Document Show',
            'action_name' => 'Checked Document Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('documents.show_documents',compact('document'));
    }


    /**
     * Show Document Edit Page.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $isInserted = Activity::create([
            'module_name' => 'Document Edit',
            'action_name' => 'Visited Document Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('documents.update_documents',compact('document'));
    }

    /**
     * Update the specified Document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        
        $validate = $this->validate($request,[
            'document_code'      =>  'required|string|max:255',
            'document_name'      =>  'required|string|max:255',
            'document_status'    =>  'required',
        ]);
        if($validate)
        {

            $document->document_code = strtoupper($request->document_code);
            $document->document_name = strtoupper($request->document_name);
            $document->document_status = $request->document_status;
            $document->updated_by    = Auth::user()->fname;

            if($document->save())
            {
                $Document = Activity::create([
                'module_name' => 'Document Updated',
                'action_name' => 'Edited a Document',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('documents.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="documents_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Document Sample',
                'action_name' => 'Download Document Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Document Table.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function export_documents()
    {
        return Excel::download(new DocumentsExport, 'Documents.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $documents = Document::onlyTrashed()->get();
        $getFields = Document::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Document Deleted',
                'action_name' => 'Checked Document Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('documents.deleted_documents',compact('documents'));
        }else{
            return redirect()->route('documents.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single document.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Document::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Document Restore',
            'action_name' => 'Restored Single Document',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('documents.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Document::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Document Bulk Restore',
            'action_name' => 'Restored Multiple documents',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('documents.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Document.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Document::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Document Permanent Delete',
            'action_name' => 'Permanently Deleted Single Document',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk documents.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Document::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Document Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple documents',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Document.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Document::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Document',
            'action_name' => 'Trashed a Document',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk documents.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Document::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Document',
            'action_name' => 'Trashed Multiple documents',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
