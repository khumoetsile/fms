<?php

namespace App\Http\Controllers\State;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StatesExport;
use Illuminate\Http\Request;
use App\State;
use App\Country;
use App\Activity;
use Auth;

class StateController extends Controller
{

    /**
     * Display State listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::join('countries', 'countries.id', '=', 'states.country_id')
       ->select('countries.country_name',
                'states.*')->get();

       
        return view('states.index_states',compact('states'));
    }
	
	/**
     * gET State.
     *
     * @param  \App\State  State_code
     * @return \Illuminate\Http\Response
     */
    public function check_states (Request $request)
    {
       try {
        $getFields = State::where('state_name',$request->state_name)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET State.
     *
     * @param  \App\State  State_code
     * @return \Illuminate\Http\Response
     */
    public function get_states (Request $request)
    {
       try {
        $getFields = State::where('country_id',$request->id)->pluck('state_name','id');
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New State Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('country_status','1')->orderBy('id', 'asc')->get();

       
        return view('states.create_states',compact('countries')); 
    }

    
    /**
     * Store a newly created State in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $isInserted = State::create([
                'country_id' 	=> $request->country_id,
                'state_name' 	=> $request->state_name,
                'state_code'    => $request->state_code,
                'state_status' => $request->state_status,
            ]);

            if($isInserted)
            {
               
                return redirect()->route('states.index')->with('gmsg','State created successfully.');
            }else{
                return back()->with('msg','Something went wrong, please try later...');
            }

       
    }

    /**
     * Upoad State Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $states = State::latest()->paginate(10);
       
        return view('states.upload_states',compact('states'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Stateclass')); Add this if uncommen
    }

    /**
     * State CSV Upload Function.
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
                    State::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
               
                return redirect()->route('states.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('states.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\State  $state
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
     * Display the specified State.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        $country = Country::where('country_id',$state->country_id)->first();

       
        return view('states.show_states',compact('country','state'));
    }


    /**
     * Show State Edit Page.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::where('country_status','1')->orderBy('id', 'asc')->get();

       
        return view('states.update_states',compact('state','countries'));
    }

    /**
     * Update the specified State in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        
        $validate = $this->validate($request,[
            'country_id'    =>  'required|max:255',
            'state_name'      =>  'required|string|max:255',
            'state_status'    =>  'required',
        ]);
        if($validate)
        {

            $state->country_id = $request->country_id;
            $state->state_name = $request->state_name;
            $state->state_status = $request->state_status;

            if($state->save())
            {
                return redirect()->route('states.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="states_sample.csv";
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
     *  Export items in City Table.
     *
     * @param  \App\City  $City
     * @return \Illuminate\Http\Response
     */
    public function export_states()
    {
        return Excel::download(new StatesExport, 'States.xlsx');
    }


    /**
     *  Show items in recylebin.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $states = State::join('countries', 'countries.country_id', '=', 'states.country_id')
       ->select('countries.country_name',
                'states.*')->onlyTrashed()->get();
        $getFields = State::onlyTrashed()->count();

        if($getFields > 0){

            return view('states.deleted_states',compact('states'));
        }else{
            return redirect()->route('states.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single state.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = State::onlyTrashed()->where(['state_id'=>$id])->restore();
        if($restored)
        {
            return redirect()->route('states.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = State::onlyTrashed()->restore();
        if($restored)
        {
            return redirect()->route('states.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single State.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = State::where('state_id',$id)->forceDelete();
        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk states.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = State::where('state_id',$id)->forceDelete();
        }

        if($isDeleted)
        {
           
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single State.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = State::where('state_id',$id)->delete();
        if($isDeleted)
        {
            
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk states.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = State::where('state_id',$id)->delete();
        }

        if($isDeleted)
        {
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
