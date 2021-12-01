<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SlidersExport;
use Illuminate\Http\Request;
use App\Slider;
use App\Activity;
use Auth;

class SliderController extends Controller
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
        $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_sliders']]);
        $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Slider listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('sliders.index_sliders',compact('sliders'));
    }
	
	/**
     * gET Slider.
     *
     * @param  \App\Slider  Slider_code
     * @return \Illuminate\Http\Response
     */
    public function check_sliders (Request $request)
    {
       try {
        $getFields = Slider::where('slider_code',$request->slider_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Slider.
     *
     * @param  \App\Slider  Slider_code
     * @return \Illuminate\Http\Response
     */
    public function get_sliders (Request $request)
    {
       try {
        $getFields = Slider::where('slider_name',$request->slider_name)->where('slider_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create_sliders');
    }

    
    /**
     * Store a newly created Slider in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path().'/uploads',$input['image']);
        $input['title'] = $request->title;
        Slider::create($input);

		return redirect()->route('sliders.index')->with('gmsg','Image Uploaded successfully.');
        
        if($validate)
        {
        return back()->with('success','Image Uploaded successfully.');
        }else{
            return back()->with('bmsg','Something went wrong...');;
        }
    }

    /**
     * Upoad Slider Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $sliders = Slider::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Slider Upload',
                'action_name' => 'Visited Slider Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('sliders.upload_sliders',compact('sliders'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Sliderclass')); Add this if uncommen
    }

    /**
     * Slider CSV Upload Function.
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
                    Slider::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                return redirect()->route('sliders.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('sliders.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Slider  $slider
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
     * Display the specified Slider.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('sliders.show_sliders',compact('slider'));
    }


    /**
     * Show Slider Edit Page.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('sliders.update_sliders',compact('slider'));
    }

    /**
     * Update the specified Slider in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validate= $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($validate)
        {
            $file_name = 'mem_avatar.jpg';
            if($file = $request->file('image'))
            {
                $extension = $file->getClientOriginalExtension();
                $file_name = "post".rand().".".$extension;
                $move = $file->move(public_path().'/uploads',$file_name);
            }
            $slider->title = strtoupper($request->title);
            $slider->image = $file_name;
            $slider->updated_by    = Auth::user()->fname;

            if($slider->save())
            {
                return redirect()->route('sliders.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="sliders_sample.csv";
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
     *  Export items in Slider Table.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function export_sliders()
    {
        return Excel::download(new SlidersExport, 'Sliders.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $sliders = Slider::onlyTrashed()->get();
        $getFields = Slider::onlyTrashed()->count();

        if($getFields > 0){

            return view('sliders.deleted_sliders',compact('sliders'));
        }else{
            return redirect()->route('sliders.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single slider.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Slider::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            return redirect()->route('sliders.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Slider::onlyTrashed()->restore();
        if($restored)
        {
            return redirect()->route('sliders.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Slider.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Slider::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk sliders.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Slider::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Slider.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Slider::where('id',$id)->delete();
        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk sliders.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Slider::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Slider',
            'action_name' => 'Trashed Multiple sliders',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
