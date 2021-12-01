<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CompaniesExport;
use Illuminate\Http\Request;
use App\Company;
use App\Country;
use App\Activity;
use Auth;
use Redirect;

class CompanyController extends Controller
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
    $this->middleware('permission:SuperAdmin-export',            ['only' =>   ['export_companies']]);
    $this->middleware('permission:SuperAdmin-show-deleted',      ['only' =>   ['show_deleted']]);
    $this->middleware('permission:SuperAdmin-restore',           ['only' =>   ['restore_single','restore_bulk']]);
    $this->middleware('permission:SuperAdmin-delete',            ['only' =>   ['destroy','bulk_delet']]);
    $this->middleware('permission:SuperAdmin-perm-delete',       ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }

    /**
     * Display Company listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        if($user === 1){
            $companies = Company::
              join('cities', 'cities.city_id', '=', 'companies.city_id')
            ->join('states', 'states.state_id', '=', 'companies.state_id')
            ->join('countries', 'countries.country_id', '=', 'companies.country_id')
            ->select('companies.*',
                    'countries.country_name',
                    'states.state_name',
                    'cities.city_name')->get();

                $isInserted = Activity::create([
                    'module_name' => 'Company index',
                    'action_name' => 'Visited Company Index',
                    'user_name' => Auth::user()->fname,
                ]);
            return view('companies.index_companies',compact('companies'));
        }else{
            return redirect()->route('companies.create')->with('gmsg','');
        }
        
    }
	
	/**
     * gET Company.
     *
     * @param  \App\Company  Company_code
     * @return \Illuminate\Http\Response
     */
    public function check_companies (Request $request)
    {
       try {
        $getFields = Company::where('company_code',$request->company_code)->first();
        return response()->json($getFields, 200);
    } catch (Exception $e) {
        return json(array("Sorry! Data not Fatched"));
        return response()->json([
            //'message' => $e->getMessage();
        ], 500);
    }
    }

    /**
     * gET Company.
     *
     * @param  \App\Company  Company_code
     * @return \Illuminate\Http\Response
     */
    public function get_companies (Request $request)
    {
       try {
        $getFields = Company::where('company_name',$request->company_name)->first();
        return response()->json($getFields, 200);
        } catch (Exception $e) {
            return json(array("Sorry! Data not Fatched"));
            return response()->json([
                //'message' => $e->getMessage();
            ], 500);
        }
    }
	
    /**
     * Show Create New Company Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::where('company_status','1')->first();
        
           if($company != null){
            return Redirect::to('companies/'.$company->company_id)->with('gmsg','');
        }else{
            $countries = Country::where('country_status','1')->get();
            $states = State::where('state_status','1')->get();
            $cities = City::where('city_status','1')->get();

            $isInserted = Activity::create([
                'module_name' => 'Company Create',
                'action_name' => 'Visited Create Company Page',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('companies.create_companies',compact('countries','states','cities'));
        }
        
    }

    
    /**
     * Store a newly created Company in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validate = $this->validate($request,[
    
            'company_reg_date'  => 'required|date',
            'company_code'      => 'required|string|max:255|unique:companies',
            'company_name'      => 'required|string|max:255',
            'company_slogan'    => 'sometimes|max:255',
            'company_address'   => 'required|string|max:255',
            'country_id'        => 'required|max:255',
            'state_id'          => 'required|max:255',
            'city_id'           => 'required|max:255',
            'area_name'         => 'sometimes|max:255',
            'zip_code'          => 'sometimes|max:255',
            'company_phone'     => 'sometimes|max:255',
            'company_phone2'    => 'sometimes|max:255',
            'company_mobile'    => 'required|string|max:255',
            'company_fax'       => 'sometimes|max:255',
            'company_email'     => 'sometimes|email|max:255',
            'company_web'       => 'sometimes|string|max:255',
            'company_image'     => 'sometimes|file|image|max:8000',
            'company_status'    => 'required',
        ]);

        $file_name = 'no_image.jpg';
        if($file = $request->file('company_image'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $file_name = "company_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$file_name);
        }
        
        if($validate)
        {
            $isInserted = Company::create([
                
                'company_reg_date'      => $request->company_reg_date,
                'company_code'          => $request->company_code,
                'company_name'          => $request->company_name,
                'company_slogan'        => $request->company_slogan,
                'company_address'       => $request->company_address,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'area_name'             => $request->area_name,
                'zip_code'              => $request->zip_code,
                'company_phone'         => $request->company_phone,
                'company_phone2'        => $request->company_phone2,
                'company_mobile'        => $request->company_mobile,
                'company_fax'           => $request->company_fax,
                'company_email'         => $request->company_email,
                'company_image'         => $file_name,
                'company_status'        => $request->company_status,
                'company_web'           => $request->company_web,
                'created_by'            => Auth::user()->fname,
            ]);

            if($isInserted)
            {
                $company = Company::where('company_status','1')->first();

                 $isInserted = Activity::create([
                'module_name' => 'Company Created',
                'action_name' => 'Created new Company',
                'user_name' => Auth::user()->fname,
            ]);
                return Redirect::to('companies/'.$company->company_id)->with('gmsg','Company Successfully Created ...');
                //return redirect()->route('companies.index')->with('gmsg','Company created successfully.');
            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

     /**
     * Display the specified Company.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $country = Country::where('country_id',$company->country_id)->first();
        $state = State::where('state_id',$company->state_id)->first();
        $city = City::where('city_id',$company->city_id)->first();

        $isInserted = Activity::create([
                'module_name' => 'Company Show',
                'action_name' => 'Checked Company Record',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('companies.show_companies',compact('company','country','state','city'));
    }


    /**
     * Show Company Edit Page.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $countries = Country::where('country_status','1')->get();
        $states = State::where('state_status','1')->get();
        $cities = City::where('city_status','1')->get();

        $isInserted = Activity::create([
                'module_name' => 'Company Edit',
                'action_name' => 'Visited Company Edit Page',
                'user_name' => Auth::user()->fname ,
            ]);
        return view('companies.update_companies',compact('company','countries','states','cities'));
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        
        $validate = $this->validate($request,[
            
            'company_reg_date'  => 'required|date',
            'company_code'      => 'required|string|max:255',
            'company_name'      => 'required|string|max:255',
            'company_address'  => 'required|string|max:255',
            'country_id'        => 'required|max:255',
            'state_id'          => 'required|max:255',
            'city_id'           => 'required|max:255',
            'area_name'         => 'sometimes|string|max:255',
            'zip_code'          => 'sometimes|string|max:255',
            'company_phone'     => 'sometimes|string|max:255',
            'company_phone2'    => 'sometimes|string|max:255',
            'company_mobile'    => 'required|string|max:255',
            'company_fax'       => 'sometimes|string|max:255',
            'company_email'     => 'sometimes|email|max:255',
            'company_web'       => 'sometimes|string|max:255',
            'company_image'     => 'sometimes|file|image|max:8000',
            'company_status'    => 'required',

        ]);

        $file_name = 'no_image.jpg';
        if($file = $request->file('company_image'))
        {
            // print "file1";exit;
            $extension = $file->getClientOriginalExtension();
            $file_name = "company_pic_".rand().".".$extension;
            $move = $file->move(public_path().'/uploads',$file_name);
        }

        if($validate)
        {

            $company->company_reg_date  = $request->company_reg_date;
            $company->company_code      = $request->company_code;
            $company->company_name      = $request->company_name;
            $company->company_slogan    = $request->company_slogan;
            $company->company_address   = $request->company_address;
            $company->country_id        = $request->country_id;
            $company->state_id          = $request->state_id;
            $company->city_id           = $request->city_id;
            $company->area_name         = $request->area_name;
            $company->zip_code          = $request->zip_code;
            $company->company_phone     = $request->company_phone;
            $company->company_phone2    = $request->company_phone2;
            $company->company_mobile    = $request->company_mobile;
            $company->company_fax       = $request->company_fax;
            $company->company_email     = $request->company_email;
            $company->company_image     = $file_name;
            $company->company_status    = $request->company_status;
            $company->company_web       = $request->company_web;
            $company->updated_by        = Auth::user()->fname;

            if($company->save())
            {
                $Company = Activity::create([
                'module_name' => 'Company Updated',
                'action_name' => 'Edited a Company',
                'user_name' => Auth::user()->fname ,
            ]);
                return Redirect::to('companies/'.$company->company_id)->with('gmsg','Company Successfully Created ...');
                //return redirect()->route('companies.index')->with('gmsg','Data Successfully Updated ...');

            }else{
                return back()->with('bmsg','Something went wrong, please try later...');
            }

        }else{
            return back();
        }
    }

    /**
     *  Show items in recylebin.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show_deleted()
    {

        $companies = Company::join('cities', 'cities.city_id', '=', 'companies.city_id')
        ->join('states', 'states.state_id', '=', 'companies.state_id')
        ->join('countries', 'countries.country_id', '=', 'companies.country_id')
        ->select('companies.*',
                'countries.country_name',
                'states.state_name',
                'cities.city_name')->onlyTrashed()->get();

        $getFields = Company::onlyTrashed()->count();

        if($getFields > 0){

            $getFields = Activity::create([
                'module_name' => 'Company Deleted',
                'action_name' => 'Checked Company Trash',
                'user_name' => Auth::user()->fname ,
            ]);
            return view('companies.deleted_companies',compact('companies'));
        }else{
            return redirect()->route('companies.index')->with('imsg','Deleted Folder is Empaty Now');
        }
        
    }

    /**
     * Restore Single company.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function restore_single($id)
    {
        $restored = Company::onlyTrashed()->where(['company_id'=>$id])->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Company Restore',
            'action_name' => 'Restored Single Company',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('companies.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Restore bulk Contries.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function restore_bulk()
    {
        $restored = Company::onlyTrashed()->restore();
        if($restored)
        {
            $restored = Activity::create([
            'module_name' => 'Company Bulk Restore',
            'action_name' => 'Restored Multiple companies',
            'user_name' => Auth::user()->fname ,
        ]);
            return redirect()->route('companies.index')->with('gmsg','Records restored successfully...');
        }else{
            return back()->with('bmsg','Error restoring records, try again latter...');
        }
    }

    /**
     * Permanent Delete Single Company.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function perm_Delete($id)
    {
        $isDeleted = Company::where('company_id',$id)->forceDelete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Company Permanent Delete',
            'action_name' => 'Permanently Deleted Single Company',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

    /**
     * Permanent Delete Bulk companies.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function perm_bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Company::where('company_id',$id)->forceDelete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Company Perm. Bulk Delete',
            'action_name' => 'Permanently Deleted Multiple companies',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }

    /**
     *  Delete Single Company.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $isDeleted = Company::where('company_id',$id)->delete();
        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Company',
            'action_name' => 'Trashed a Company',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Error Deleting Data..."));
        }
    }

     /**
     *  Delete Bulk companies.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    public function bulk_delet(Request $request)
    {


        foreach($request->ids as $key=>$id)
        {
            $isDeleted = Company::where('company_id',$id)->delete();
        }

        if($isDeleted)
        {
            $isDeleted = Activity::create([
            'module_name' => 'Company',
            'action_name' => 'Trashed Multiple companies',
            'user_name' => Auth::user()->fname ,
        ]);
            return json_encode(array('message'=>"Data Deleted Successfully..."));
        }else{
            return json_encode(array('message'=>"Data Deleting Error..."));
        }

    }
}
