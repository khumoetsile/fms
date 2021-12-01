<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfilesExport;
use Illuminate\Http\Request;
use App\Profile;
use App\Country;
use App\Activity;
use App\User;
use App\Account;
use Auth;
use Redirect;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
    function __construct()
    {
        $this->middleware('permission:Customer-list|Customer-create|Customer-edit|Customer-delete', ['only' => ['index','show']]);
        $this->middleware('permission:Customer-create',            ['only' =>   ['create','store']]);
        $this->middleware('permission:Customer-edit',              ['only' =>   ['edit','update']]);
        $this->middleware('permission:Customer-upload',            ['only' =>   ['upload_page','upload_process','csvToArray']]);
        $this->middleware('permission:Customer-download',          ['only' =>   ['download_sample_csv']]);
        $this->middleware('permission:Customer-export',            ['only' =>   ['export_profiles']]);
        $this->middleware('permission:Customer-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:Customer-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:Customer-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:Customer-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }*/

    /**
     * Display Profile listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::get();
        $isInserted = Activity::create([
                'module_name' => 'Profile index',
                'action_name' => 'Visited Profile Index',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('profiles.index_profiles',compact('profiles'));
    }
	
	/**
     * gET Profile.
     *
     * @param  \App\Profile  Profile_code
     * @return \Illuminate\Http\Response
     */
    public function check_profiles (Request $request)
    {
       try {
        $getFields = Profile::where('profile_code',$request->profile_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Profile.
     *
     * @param  \App\Profile  Profile_code
     * @return \Illuminate\Http\Response
     */
    public function get_profiles (Request $request)
    {
       try {
        $getFields = Profile::where('profile_name',$request->profile_name)->where('profile_status','1')->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }
	
    /**
     * Show Create New Profile Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('country_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'Profile Create',
                'action_name' => 'Visited Create Profile Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('profiles.create_profiles',compact('countries'));
    }

    
    /**
     * Store a newly created Profile in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
    
            'accounts_address1' => 'required|string|max:255',
            // 'accounts_address2' => 'sometimes|required|string|max:255',
            // 'accounts_address3' => 'sometimes|required|string|max:255',
            // 'city_name'         => 'required|string|max:255',
            // 'zip_code'          => 'required|string|max:255',
            // 'state_name'        => 'required|string|max:255',
            // 'country_name'      => 'required|string|max:255',
            // 'ntn_number'        => 'sometimes|max:255',
            // 'profile_pic'       => 'sometimes|file|image|max:8000',
            // 'company_logo'      => 'required|file|image|max:8000',
            // 'cnic_pic_a'        => 'required|file|image|max:8000',
            // 'cnic_pic_b'        => 'required|file|image|max:8000',
        ]);

        $user  = Auth::user();
        $account   = Account::where('accounts_email', $user->email)->first();

        $accounts_id = $account->id;

        $profile_pic = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $profile_pic = "profile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$profile_pic);
        }

        $company_logo = 'no_image.jpg';
        if($file = $request->file('company_logo'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $company_logo = "logo_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$company_logo);
        }

        $cnic_pic_a = 'photo-id_a.jpg';
        if($file = $request->file('cnic_pic_a'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $cnic_pic_a = "cnic_pic_a".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$cnic_pic_a);
        }

        $cnic_pic_b = 'photo-id_b.jpg';
        if($file = $request->file('cnic_pic_b'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $cnic_pic_b = "cnic_pic_b".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$cnic_pic_b);
        }
        
        if($validate)
        {
            

            $account->accounts_address1    = $request->accounts_address1;
            $account->accounts_address2    = $request->accounts_address2;
            $account->accounts_address3    = $request->accounts_address3;
            $account->city_name            = $request->city_name;
            $account->zip_code             = $request->zip_code;
            $account->state_name           = $request->state_name;
            $account->country_name         = $request->country_name;
            $account->ntn_number           = $request->ntn_number;
            $account->profile_pic          = $profile_pic;
            $account->company_logo         = $company_logo;
            $account->cnic_pic_a           = $cnic_pic_a;
            $account->cnic_pic_b           = $cnic_pic_b;
            $account->profile_status       = '1';
            $account->verify_status        = '1';
            $account->save();

            if($user->save())
            {   
                $user->profile_pic  = $profile_pic;
                $user->accounts_id  = $accounts_id;
                $user->save();

                $isInserted = Activity::create([
                'module_name' => 'Profile Created',
                'action_name' => 'Created new Profile',
                'user_name' => Auth::user()->fname,
            ]);
                if($user->hasRole('Customer')){
                    return Redirect::to('customer')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasAnyRole('SuperAdmin', 'Admin')){
                    return Redirect::to('dashboard')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('Management')){
                    return Redirect::to('managment')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('FrontDesk')){
                    return Redirect::to('frontdesk')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('DataEntry')){
                    return Redirect::to('dataentry')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('SalesMarketing')){
                    return Redirect::to('salesmarketing')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('Assisstant')){
                    return Redirect::to('assisstant')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('Accounts')){
                    return Redirect::to('accounts')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('Employee')){
                    return Redirect::to('employee')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
                elseif($user->hasRole('Dealer')){
                    return Redirect::to('dealer')->with('gmsg','Profile Updated successfully Please Wait APX Team will activate your account soon...');
                    }
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back()->with('bmsg','Some Required Fields are Missing');
        }
    }

    /**
     * Upoad Profile Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $profiles = Profile::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'Profile Upload',
                'action_name' => 'Visited Profile Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('profiles.upload_profiles',compact('profiles'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Profileclass')); Add this if uncommen
    }

    /**
     * Profile CSV Upload Function.
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
                    Profile::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                 $isInserted = Activity::create([
                'module_name' => 'Profile Uploaded',
                'action_name' => 'Uploaded Multiple profiles with CSV',
                'user_name' => Auth::user()->fname ,
                ]);

                return redirect()->route('profiles.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('profiles.upload_page')->with('bmsg',$e->getMessage());
        }

    }

    /**
     * Convert Csv File to Array.
     *
     * @param  \App\Profile  $profile
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
     * Display the specified Profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $isInserted = Activity::create([
                'module_name' => 'Profile Show',
                'action_name' => 'Checked Profile Record',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('profiles.show_profiles',compact('profile'));
    }

    /**
     * Show Profile Edit Page.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $countries = Country::where('country_status','1')->get();
        $states = State::where('state_status','1')->get();
        $cities = City::where('city_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'Profile Edit',
                'action_name' => 'Visited Profile Edit Page',
                'user_name' => Auth::user()->fname,
            ]);
        return view('profiles.update_profiles',compact('profile','countries','states','cities'));
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        
        $validate = $this->validate($request,[
    
            'address1'          => 'required|string|max:255',
            'address2'          => 'sometimes|max:255',
            'address3'          => 'sometimes|max:255',
            'city_name'         => 'required|string|max:255',
            'zip_code'          => 'required|string|max:255',
            'state_name'        => 'required|string|max:255',
            'country_name'      => 'required|string|max:255',
            'ntnnum'            => 'sometimes|max:255',
            'profile_pic'       => 'required|file|image|max:8000',
            'userlogo'          => 'required|file|image|max:8000',
            'cnic_pic_a'        => 'required|file|image|max:8000',
            'cnic_pic_b'        => 'required|file|image|max:8000',
        ]);

        $profile_pic = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $profile_pic = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$profile_pic);
        }

        $userlogo = 'no_image.jpg';
        if($file = $request->file('userlogo'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $userlogo = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$userlogo);
        }

        $cnic_pic_a = 'no_image.jpg';
        if($file = $request->file('cnic_pic_a'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $cnic_pic_a = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$cnic_pic_a);
        }

        $cnic_pic_b = 'no_image.jpg';
        if($file = $request->file('cnic_pic_b'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $cnic_pic_b = "userprofile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$cnic_pic_b);
        }

        if($validate)
        {

            $profile->address1          = $request->address1;
            $profile->address2          = $request->address2;
            $profile->address3          = $request->address3;
            $profile->city_name         = $request->city_name;
            $profile->zip_code          = $request->zip_code;
            $profile->state_name        = $request->state_name;
            $profile->country_name      = $request->country_name;
            $profile->ntnnum            = $request->ntnnum;
            $profile->profile_pic       = $profile_pic;
            $profile->userlogo          = $userlogo;
            $profile->cnic_pic_a        = $cnic_pic_a;
            $profile->cnic_pic_b        = $cnic_pic_b;
            $profile->profilestatus     = '1';
            $profile->verifystatus      = '1';
            $profile->updated_by        = Auth::user()->fname;

            if($profile->save())
            {
                $Profile = Activity::create([
                'module_name' => 'Profile Update',
                'action_name' => 'Updated  Profile',
                'user_name' => Auth::user()->fname ,
            ]);

                return redirect()->route('profiles.index')->with('gmsg','Data Successfully Updated ...');

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
        
        $filename="profiles_sample.csv";
        $file_path = public_path() . "\download_samples\\" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            $isInserted = Activity::create([
                'module_name' => 'Profile Sample',
                'action_name' => 'Download Profile Sample',
                'user_name' => Auth::user()->fname ,
            ]);
            return \Response::download( $file_path, $filename, $headers );

        } else {
            // Error
            return back()->with('bmsg','Requested file does not exist on our server!');
        }
    }

    
    /**
     *  Export items in Profile Table.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function export_profiles()
    {
        return Excel::download(new ProfilesExport, 'Profiles.xlsx');
    }
    
    /**
     *  Show items in recylebin.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $profiles = Profile::onlyTrashed()->get();
        $getFields = Profile::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Profile Deleted',
                'action_name' => 'Checked Profile Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('profiles.deleted_profiles',compact('profiles'));
        }else{
            return redirect()->route('profiles.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Profile::onlyTrashed()->where(['profile_id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Profile Restore',
            'action_name' => 'Restored Single Profile',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('profiles.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Profile::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Profile Bulk Restore',
            'action_name' => 'Restored Multiple profiles',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('profiles.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Profile::where('profile_id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Profile Permanent Delete',
            'action_name' => 'Permanently Deleted Single Profile',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk profiles.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Profile::where('profile_id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Profile Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple profiles',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Profile.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Profile::where('profile_id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Profile',
            'action_name' => 'Trashed a Profile',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk profiles.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Profile::where('profile_id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Profile',
            'action_name' => 'Trashed Multiple profiles',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
