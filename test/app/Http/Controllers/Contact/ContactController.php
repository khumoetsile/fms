<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use Illuminate\Http\Request;
use App\Contact;
use App\Country;
use App\State;
use App\City;
use App\Activity;
use Auth;

class ContactController extends Controller
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
        $this->middleware('permission:Admin-export',            ['only' =>   ['export_contacts']]);
        $this->middleware('permission:Admin-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Admin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Admin-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Admin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
     */
    /**
     * Display Contact listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        if(Auth::user()){
            
             return view('contacts.index_contacts_admin',compact('contacts'));
        }
        else
            return view('contacts.index_contacts',compact('contacts'));
        
    }
	
	/**
     * gET Contact.
     *
     * @param  \App\Contact  Contact_code
     * @return \Illuminate\Http\Response
     */
    public function check_contacts (Request $request)
    {
       try {
        $getFields = Contact::where('contact_code',$request->contact_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Contact.
     *
     * @param  \App\Contact  Contact_code
     * @return \Illuminate\Http\Response
     */
    public function get_contacts (Request $request)
    {
       try {
        $getFields = Contact::where('contact_name',$request->contact_name)->where('contact_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Contact Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('country_status','1')->get();
        $states = State::where('state_status','1')->get();
        $cities = City::where('city_status','1')->get();
        $contact_code= Contact::orderby('id', 'desc')->first();
        $member= 'Member-'. (string)$contact_code->id;
        if(Auth::user()){
             
             return view('contacts.create_contacts_admin',compact('countries','states','cities','member'));
        }
        else
        return view('contacts.create_contacts',compact('countries','states','cities','member'));
    }

    
    /**
     * Store a newly created Contact in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = 'mem_avatar.jpg';
        if($file = $request->file('contact_image'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $file_name = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$file_name);
        }
        $creater= Auth::user() ? Auth::user()->fname : $request->contact_name;
            $isInserted = Contact::create([
                
                'contact_reg_date'      => $request->contact_reg_date,
                'contact_code'          => $request->contact_code,
                'contact_name'          => $request->contact_name,
                'contact_slogan'        => $request->contact_slogan,
                'contact_address1'      => $request->contact_address1,
                'contact_address2'      => $request->contact_address2,
                'contact_address3'      => $request->contact_address3,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'contact_mobile'        => $request->contact_mobile,
                'contact_email'         => $request->contact_email,
                'contact_image'         => $file_name,
                'contact_status'        => $request->contact_status,
                'created_by'            => $creater,
            ]);

            if($isInserted)
            {
            if(Auth::user()){
            
        }
            if(Auth::user())
                return redirect()->route('contacts.index_admin')->with('gmsg','Contact created successfully.');
            else
                return redirect()->route('contacts.index')->with('gmsg','Contact created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

       
    }

    /**
     * Upoad Contact Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $contacts = Contact::latest()->paginate(10);
        if(Auth::user()){
             
              return view('contacts.upload_contacts',compact('contacts'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else{
            return back();
        }
             
       
        //,compact('Contactclass')); Add this if uncommen
    }

    /**
     * Contact CSV Upload Function.
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
                    Contact::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                 if(Auth::user()){
            
        }

                return redirect()->route('contacts.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('contacts.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Contact  $contact
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
     * Display the specified Contact.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $country=Country::where('id', $contact->country_id)->first();
        $state=State::where('id', $contact->state_id)->first();
        $city=City::where('id', $contact->city_id)->first();
        if(Auth::user()){
             
        }
        return view('contacts.show_contacts',compact('contact','country','state','city'));
    }

    /**
     * Show Contact Edit Page.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $countries = Country::where('country_status','1')->get();
        $states = State::where('state_status','1')->get();
        $cities = City::where('city_status','1')->get();

        if(Auth::user()){
             
             return view('contacts.update_contacts',compact('contact','countries','states','cities'));
        }
        else{
            return back();
        }
        
    }

    /**
     * Update the specified Contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        
       
        $file_name = 'mem_avatar.jpg';
        if($file = $request->file('contact_image'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $file_name = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$file_name);
        }

      

            $contact->contact_reg_date  = $request->contact_reg_date;
            $contact->contact_code      = $request->contact_code;
            $contact->contact_name      = $request->contact_name;
            $contact->contact_slogan    = $request->contact_slogan;
            $contact->contact_address1  = $request->contact_address1;
            $contact->contact_address2  = $request->contact_address2;
            $contact->contact_address3  = $request->contact_address3;
            $contact->country_id      = $request->country_id;
            $contact->state_id        = $request->state_id;
            $contact->city_id         = $request->city_id;
            $contact->contact_mobile    = $request->contact_mobile;
            $contact->contact_email     = $request->contact_email;
            $contact->contact_image     = $file_name;
            $contact->contact_status    = $request->contact_status;
            $contact->updated_by    = Auth::user()->fname;

            if($contact->save() && Auth::user())
            {
                

                return redirect()->route('contacts.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="contacts_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            if(Auth::user()){
             
        }
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    
    /**
     *  Export items in Contact Table.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function export_contacts()
    {
        return Excel::download(new ContactsExport, 'Contacts.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $contacts = Contact::onlyTrashed()->get();
        $getFields = Contact::onlyTrashed()->count();

        if($getFields > 0){
            if(Auth::user()){
           
        }
            return view('contacts.deleted_contacts',compact('contacts'));
        }else{
            return redirect()->route('contacts.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single contact.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Contact::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            if(Auth::user()){
           
        }
            return redirect()->route('contacts.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Contact::onlyTrashed()->restore();
        if($restored)
        {
            if(Auth::user()){
           
        }
            return redirect()->route('contacts.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Contact.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Contact::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            if(Auth::user()){
            
        }
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk contacts.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Contact::where('id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            if(Auth::user()){
            
        }
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Contact.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Contact::where('id',$id)->delete();
        if($isDeleted)
        {
            if(Auth::user()){
           
        }
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk contacts.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Contact::where('id',$id)->delete();
        }

        if($isDeleted)
        {
            if(Auth::user()){
            
        }
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
