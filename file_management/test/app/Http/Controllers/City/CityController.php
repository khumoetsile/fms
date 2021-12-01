<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CitiesExport;
use Illuminate\Http\Request;
use App\City;
use App\State;
use App\Country;
use App\Activity;
use Auth;

class CityController extends Controller
{

    /**
     * Display City listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cities = City::join('states', 'states.id', '=', 'cities.state_id')
       ->join('countries', 'countries.id', '=', 'states.country_id')
       ->select('countries.*',
                'states.*',
                'cities.*')->get();

        $isInserted = Activity::create([
                'module_name' => 'City index',
                'action_name' => 'Visited City Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('cities.index_cities',compact('cities'));
    }
	
	/**
     * gET City.
     *
     * @param  \App\City  City_code
     * @return \Illuminate\Http\Response
     */
    public function check_cities (Request $request)
    {
       try {
        $getFields = City::where('city_name',$request->city_name)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET City.
     *
     * @param  \App\City  City_code
     * @return \Illuminate\Http\Response
     */
    public function get_cities (Request $request)
    {
       try {
        $getFields = City::where('state_id',$request->state_id)->pluck('city_name','city_id');
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New City Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('country_status','1')->orderBy('id', 'asc')->get();
        $states = State::where('state_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'City Create',
                'action_name' => 'Visited Create City Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('cities.create_cities',compact('countries','states'));
        
    }

    
    /**
     * Store a newly created City in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
            'country_id' 	=> 'required|max:255',
            'state_id'    => 'required|max:255',
            'city_name' 	=> 'sometimes|string|max:255',
            'city_status'   => 'required',
        ]);
        
        if($validate)
        {
            $isInserted = City::create([
                'country_id' 	=> $request->country_id,
                'state_id'    => $request->state_id,
                'city_name' 	=>'Bhakkar',
                'city_status'   => $request->city_status,
            ]);

            if($isInserted)
            {
                 $isInserted = Activity::create([
                'module_name' => 'City Created',
                'action_name' => 'Created new City',
                'user_name' => Auth::user()->fname ,
            ]);
                return redirect()->route('cities.index')->with('gmsg','City created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     * Upoad City Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $cities = City::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'City Upload',
                'action_name' => 'Visited City Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('cities.upload_cities',compact('cities'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Cityclass')); Add this if uncommen
    }

    /**
     * City CSV Upload Function.
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
                    City::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                 $isInserted = Activity::create([
                'module_name' => 'City Uploaded',
                'action_name' => 'Uploaded Multiple cities with CSV',
                'user_name' => Auth::user()->fname ,
                ]);

                return redirect()->route('cities.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('cities.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\City  $city
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
     * Display the specified City.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $country = Country::where('id',$city->country_id)->first();
        $state = State::where('state_id',$city->state_id)->first();

        $isInserted = Activity::create([
                'module_name' => 'City Show',
                'action_name' => 'Checked City Record',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('cities.show_cities',compact('country','state','city'));
    }


    /**
     * Show City Edit Page.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries = Country::where('country_status','1')->orderBy('id', 'asc')->get();
        $states = State::where('state_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'City Edit',
                'action_name' => 'Visited City Edit Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('cities.update_cities',compact('city','countries','states'));
    }

    /**
     * Update the specified City in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        
        $validate = $this->validate($request,[
            'country_id'    =>  'required|max:255',
            'state_id'      =>  'required|max:255',
            'city_name'     =>  'required|string|max:255',
            'city_status'   =>  'required',
        ]);
        if($validate)
        {

            $city->country_id   = $request->country_id;
            $city->state_id     = $request->state_id;
            $city->city_name    = $request->city_name;
            $city->city_status  = $request->city_status;

            if($city->save())
            {
                $City = Activity::create([
                'module_name' => 'City Updated',
                'action_name' => 'Edited a City',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('cities.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="cities_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'City Sample',
                'action_name' => 'Downloaded City Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    /**
     *  Export items in City Table.
     *
     * @param  \App\City  $City
     * @return \Illuminate\Http\Response
     */
    public function export_cities()
    {
        return Excel::download(new CitiesExport, 'Cities.xlsx');
    }

    /**
     *  Show items in recylebin.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $cities = City::join('states', 'states.state_id', '=', 'cities.state_id')
       ->join('countries', 'countries.country_id', '=', 'states.country_id')
       ->select('countries.*',
                'states.*',
                'cities.*')->onlyTrashed()->get();
        $getFields = City::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'City Deleted',
                'action_name' => 'Checked City Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('cities.deleted_cities',compact('cities'));
        }else{
            return redirect()->route('cities.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single city.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = City::onlyTrashed()->where(['city_id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'City Restore',
            'action_name' => 'Restored Single City',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('cities.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = City::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'City Bulk Restore',
            'action_name' => 'Restored Multiple cities',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('cities.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single City.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = City::where('city_id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'City Permanent Delete',
            'action_name' => 'Permanently Deleted Single City',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk cities.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = City::where('city_id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'City Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple cities',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single City.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = City::where('city_id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'City',
            'action_name' => 'Trashed a City',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk cities.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = City::where('city_id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'City',
            'action_name' => 'Trashed Multiple cities',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
