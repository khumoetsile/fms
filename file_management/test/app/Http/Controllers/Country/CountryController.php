<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use App\Exports\CountriesExport;
use Illuminate\Http\Request;
use App\Country;
use App\Activity;
use Auth;

class CountryController extends Controller
{

    /**
     * Display Country listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        $isInserted = Activity::create([
                'module_name' => 'Country index',
                'action_name' => 'Visited Country Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('countries.index_countries',compact('countries'));
    }
	
	/**
     * gET Country.
     *
     * @param  \App\Country  Country_code
     * @return \Illuminate\Http\Response
     */
    public function check_countries (Request $request)
    {
       try {
        $getFields = Country::where('country_code',$request->country_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Country.
     *
     * @param  \App\Country  Country_code
     * @return \Illuminate\Http\Response
     */
    public function get_countries (Request $request)
    {
       try {
        $getFields = Country::where('country_name',$request->country_name)->where('country_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Country Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$VeriablePluralName = Locationcountries::get();*/ //to create Stream Un comment this
        $isInserted = Activity::create([
                'module_name' => 'Country Create',
                'action_name' => 'Visited Create Country Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('countries.create_countries');
        //,compact('VeriablePluralName')); Add this if uncomment
    }

    
    /**
     * Store a newly created Country in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'country_code' 	=> 'required|string|max:255|unique:countries',
            'country_name' 	=> 'required|string|max:255',
            'country_status' => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = Country::create([
                'country_code' 	=> $request->country_code,
                'country_name' 	=> $request->country_name,
                'country_status' => $request->country_status,
                'created_by'        => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'Country Created',
                'action_name' => 'Created new Country',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('countries.index')->with('gmsg','Country created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad Country Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $countries = Country::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Country Upload',
                'action_name' => 'Visited Country Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('countries.upload_countries',compact('countries'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Countryclass')); Add this if uncommen
    }

    /**
     * Country CSV Upload Function.
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
                    Country::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Country Uploaded',
                    'action_name' => 'Uploaded Multiple countries with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('countries.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('countries.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Country  $country
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
     * Display the specified Country.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $isInserted = Activity::create([
            'module_name' => 'Country Show',
            'action_name' => 'Checked Country Record',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('countries.show_countries',compact('country'));
    }


    /**
     * Show Country Edit Page.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $isInserted = Activity::create([
            'module_name' => 'Country Edit',
            'action_name' => 'Visited Country Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('countries.update_countries',compact('country'));
    }

    /**
     * Update the specified Country in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        
        $validate = $this->validate($request,[
            'country_code'      =>  'required|string|max:255',
            'country_name'      =>  'required|string|max:255',
            'country_status'    =>  'required',
        ]);
        if($validate)
        {

            $country->country_code = $request->country_code;
            $country->country_name = $request->country_name;
            $country->country_status = $request->country_status;
            $country->updated_by    = Auth::user()->fname;

            if($country->save())
            {
                $Country = Activity::create([
                'module_name' => 'Country Updated',
                'action_name' => 'Edited a Country',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('countries.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="countries_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Country Sample',
                'action_name' => 'Download Country Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    

    /**
     *  Export items in Country Table.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function export_countries()
    {
        return Excel::download(new CountriesExport, 'Countries.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $countries = Country::onlyTrashed()->get();
        $getFields = Country::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Country Deleted',
                'action_name' => 'Checked Country Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('countries.deleted_countries',compact('countries'));
        }else{
            return redirect()->route('countries.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single country.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Country::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Country Restore',
            'action_name' => 'Restored Single Country',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('countries.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Country::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Country Bulk Restore',
            'action_name' => 'Restored Multiple countries',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('countries.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Country.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Country::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Country Permanent Delete',
            'action_name' => 'Permanently Deleted Single Country',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk countries.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Country::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Country Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple countries',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Country.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Country::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Country',
            'action_name' => 'Trashed a Country',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk countries.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Country::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Country',
            'action_name' => 'Trashed Multiple countries',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
