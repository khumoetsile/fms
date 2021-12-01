<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\MembersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Account;
use App\Activity;
use App\Gender;
use App\Country;
use App\Section;
use App\Office;
use Auth;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
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
        $this->middleware('permission:SuperUser-export',            ['only' =>   ['export_companies']]);
        $this->middleware('permission:SuperUser-show-deleted',      ['only' =>   ['show_deleted']]);
        $this->middleware('permission:SuperUser-restore',           ['only' =>   ['restore_single','restore_bulk']]);
        $this->middleware('permission:SuperUser-delete',            ['only' =>   ['destroy','bulk_delet']]);
        $this->middleware('permission:SuperUser-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
      
    /**
     * Display a listing of the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::with('roles')->where('user_status','1')->orderBy('created_at', 'DESC')->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }
    /**
     * Get Users from Databse
     *
     * @param  \App\SocietyMember  $society_member
     * @return \Illuminate\Http\Response
     */
    public function get_Customer_Report (Request $request)
    {
        $loggedin=Auth::user();
        $having_admin_role = $loggedin->hasAnyRole('SuperAdmin', 'Admin');
       if($having_admin_role)
            $customers = User::whereHas("roles", function($us){ $us->where("name", "Customer"); })->get();
        else
            $customers = User::whereHas("roles", function($us){ $us->where("name", "Customer"); })->where('id', $loggedin->id)->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('reports.customers_reports',compact('customers'));
    }
    /**
     * Get Users from Databse
     *
     * @param  \App\SocietyMember  $society_member
     * @return \Illuminate\Http\Response
     */
    public function get_AdminUsers (Request $request)
    {
     $users = User::whereHas("roles", function($us){ $us->where("name", "Admin")->orWhere("name",'SuperAdmin'); })->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }
    /**
     * Get Users from Databse
     *
     * @param  \App\SocietyMember  $society_member
     * @return \Illuminate\Http\Response
     */
    public function get_ManagerUsers (Request $request)
    {
      $users = User::whereHas("roles", function($us){ $us->where("name", "Manager"); })->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }
    /**
     * Get Users from Databse
     *
     * @param  \App\SocietyMember  $society_member
     * @return \Illuminate\Http\Response
     */
    public function get_CustomerUsers (Request $request)
    {
        $loggedin=Auth::user();
        $having_admin_role = $loggedin->hasAnyRole('SuperAdmin', 'Admin');
       if($having_admin_role)
            $users = User::whereHas("roles", function($us){ $us->where("name", "Customer"); })->get();
        else
            $users = User::whereHas("roles", function($us){ $us->where("name", "Customer"); })->where('id', $loggedin->id)->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }
    /**
     * Display a listing of the index.
     *
     * @return \Illuminate\Http\Response
     */
    public function stations_customer(Request $request)
    {
        $loggedin=Auth::user();
        $users = User::with('roles')->where('user_status','1')->where('id', $loggedin->id)->get();
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }

    /**
     * Display a listing of the activation_requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactive_users(Request $request)
    {
        $collection = User::where('userstatus','0')->get();
        $users = $collection->forget(0);
        
        $Inserted = Activity::create([
            'module_name' => 'User Index',
            'action_name' => 'Visited User Index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.index_users',compact('users'));
    }

    /**
     * gET Shipment.
     *
     * @param  \App\Shipment  Shipment_code
     * @return \Illuminate\Http\Response
     */
    public function check_users (Request $request)
    {
       try {
        $getFields = User::where('email',$request->email)->first();
        return response()->json($getFields, 200);
        } catch (Exception $e) {
            return json(array("Sorry! Data not Fatched"));
            return response()->json([
                //'message' => $e->getMessage();
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $genders= Gender::get();
        $offices= Office::get();
        $sections= Section::get();
        //$userRoles = $user->roles->pluck('name','name')->all();
        $Inserted = Activity::create([
            'module_name' => 'User Create',
            'action_name' => 'Visited User Create Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('users.create_users',compact('roles','genders','offices','sections'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'             => 'required|email|unique:users,email',
            'username'          => 'required|string|max:255|unique:users',
            'fname'             => 'required|string|max:255',
            'lname'             => 'required|string|max:255',
            'password'          => 'required|same:confirm-password',
            'profile_pic'       => 'sometimes|file|image|max:8000',
            'roles'             => 'required'
        ]);

        $profile_pic = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $profile_pic = "profile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$profile_pic);
        }

        $input = $request->all();
       // $input['profile_pic']   = $profile_pic;
        $input['created_by']    = Auth::user()->fname;
        $input['password']      = Hash::make($input['password']);


        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        // Send Welcome Email to New User
        //Mail::to($request->email)->send(new WelcomeNewUserMail());

        if($user)
        {
        $Inserted = Activity::create([
            'module_name' => 'User Created',
            'action_name' => 'Created New User',
            'user_name' => Auth::user()->fname ,
        ]);
        }

        $user = Auth::user();
        $customer_role = $user->hasRole('Customer');
        $office_role = $user->hasAnyRole('SuperAdmin', 'SuperUser', 'RMU', 'ActionOfficer'

    );

        if($customer_role == true){
            return redirect()->route('users.my_users')
                        ->with('gmsg','User created successfully');
        }elseif($office_role == true){
            return redirect()->route('users.index')
                        ->with('gmsg','User created successfully');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        $isReport=false;
        $Inserted = Activity::create([
            'module_name' => 'User Show',
            'action_name' => 'Viewed User Show Page',
            'user_name' => Auth::user()->fname ,
        ]);    

        return view('users.show_users',compact('user','isReport'));
    }

     /**
     *  Show items in recylebin.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {
        $users = User::onlyTrashed()->get();
        $getFields = User::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
            'module_name' => 'User Deleted',
            'action_name' => 'Visited User Delete Page',
            'user_name' => Auth::user()->fname ,
        ]);
            return view('users.deleted_users',compact('users'));
        }else{
            return redirect()->route('users.index')->with('dmsg','Dont Worry! There is nothing Deleted!...');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::where('country_status','1')->get();
        //$stations = Station::where('station_status','1')->get();
        $genders = Gender::get();
        $offices = Office::get();
        $sections = Section::get();
        $user = User::find($id);
         if($user->user_name =='SuperAdmin')
        {
            return redirect()->route('users.index')
                        ->with('SuperAdmin','Super Admin can not be changed.');
        }
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();

        $getFields = Activity::create([
            'module_name' => 'User Edit',
            'action_name' => 'Visited User Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);

        return view('users.update_users',compact('user','roles','userRoles','sections','countries','genders','offices'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'             => 'required|email',
            'username'          => 'required|string|max:255',
            'fname'             => 'required|string|max:255',
            'lname'             => 'required|string|max:255',
            'password'          => 'same:confirm-password',
            'profile_pic'       => 'sometimes|file|image|max:8000',
            'roles'             => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        $user = User::find($id);
        $user->update($input);
         $file_name = 'mem_avatar.jpg';
        if($file = $request->file('profile_pic'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $file_name = "userProfile_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads/images',$file_name);
        }

        $DbInserted = DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        //$user->profile_pic = $file_name;
        $user->updated_by = Auth::user()->fname;
        $user->save();

        if($DbInserted)
        {
        $DbInserted = Activity::create([
            'module_name' => 'User updated',
            'action_name' => 'Edited A User Record',
            'user_name' => Auth::user()->fname ,
        ]);
        }
        $loged = Auth::user();
        if($loged->hasRole('Customer')){
            return redirect()->route('users.my_users')->with('gmsg','User Updated successfully.');
        }else{
            return redirect()->route('users.index')
                        ->with('gmsg','User updated successfully');
        }
    }
    /**
     *  Export items in Department Table.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function export_users()
    {
        return Excel::download(new UsersExport, 'Users.xlsx');
    }
    /**
     * Upoad User Page View.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function upload_page()
    {
        $departments = User::latest()->paginate(10);
        $isInserted = Activity::create([
                'module_name' => 'User Upload',
                'action_name' => 'Visited User Upload Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('users.upload_users',compact('users'))
                            ->with('i', (request()->input('page', 1) - 1) * 10);
        //,compact('Departmentclass')); Add this if uncommen
    }
    /**
     * Department CSV Upload Function.
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
                    User::firstOrCreate($customerArr[$i]);
                    }

                if(File::exists($path))
                    {
                    File::delete($path);
                    }

             
                $isInserted = Activity::create([
                    'module_name' => 'Users Uploaded',
                    'action_name' => 'Uploaded Multiple users with CSV',
                    'user_name' => Auth::user()->fname,
                ]);

                return redirect()->route('users.index')->with('gmsg','Data Uploaded Successfully...');
            }   else{
                        return back()->with('bmsg','Select a CSV file...');
                    }

            }   else{
                        return back()->with('bmsg','Select a  Correct CSV file...');
                    }

        } catch (\Exception $e) {
            return redirect()->route('users.upload_page')->with('bmsg',$e->getMessage());
        }

    }
        /**
     * Convert Csv File to Array.
     *
     * @param  \App\Department  $department
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
     * Single Restore the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = User::onlyTrashed()->where(['id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'User Restore',
            'action_name' => 'Restored Single User',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('users.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Bulk Restore the Users from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = User::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'User Bulk Restore',
            'action_name' => 'Restored Multiple Users',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('users.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }


    /**
     * Trash the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $isDeleted = User::where('id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'User delete',
            'action_name' => 'Trashed A User Record',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete the User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = User::where('id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'User Permanently Delete',
            'action_name' => 'Permanently Deleted a User',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }
}