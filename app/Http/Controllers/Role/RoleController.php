<?php


namespace App\Http\Controllers\Role;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Activity;
use Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:SuperUser-list|User-list|SuperUser-create|SuperUser-edit|SuperUser-delete', ['only' => ['index','store']]);
        $this->middleware('permission:SuperUser-create',    ['only' => ['create','store']]);
        $this->middleware('permission:SuperUser-edit',      ['only' => ['edit','update']]);
        $this->middleware('permission:SuperUser-delete',    ['only' => ['destroy']]);
    }


    /**
     * Display Role listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::get();
        //$roles = $collection->forget(0);

        $Inserted = Activity::create([
            'module_name' => 'Role index',
            'action_name' => 'Visited Role index Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('roles.index_roles',compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        $Inserted = Activity::create([
            'module_name' => 'Role create',
            'action_name' => 'Visited Role Create Page',
            'user_name' => Auth::user()->fname ,
        ]);
        return view('roles.create_roles',compact('permission'));
    }
     /**
     * gET Shipment.
     *
     * @param  \App\Shipment  Shipment_code
     * @return \Illuminate\Http\Response
     */
    public function get_Roles (Request $request)
    {
       try {
        $getFields = Role::where('name',$request->name)->first();
        return response()->json($getFields, 200);
        } catch (Exception $e) {
            return json(array("Sorry! Data not Fatched"));
            return response()->json([
                //'message' => $e->getMessage();
            ], 500);
        }
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
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        if($role)
        {
        $Inserted = Activity::create([
            'module_name' => 'Role',
            'action_name' => 'Created a Role',
            'user_name' => Auth::user()->fname ,
        ]);
        }

        return redirect()->route('roles.index')
                        ->with('gmsg','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

            $Inserted = Activity::create([
            'module_name' => 'Role Show',
            'action_name' => 'Viewed  a Role Record',
            'user_name' => Auth::user()->fname ,
        ]);

        return view('roles.show_roles',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        $Inserted = Activity::create([
            'module_name' => 'Role Edited',
            'action_name' => 'Visited Role Edit Page',
            'user_name' => Auth::user()->fname ,
        ]);

        return view('roles.update_roles',compact('role','permission','rolePermissions'));
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
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));

        if($role)
        {
        $Inserted = Activity::create([
            'module_name' => 'Role updated',
            'action_name' => 'Edited a Role Name',
            'user_name' => Auth::user()->fname ,
        ]);
        }
        if($role)
        {
            return redirect()->route('roles.index')
                        ->with('gmsg','Role updated successfully');
        }else{
                return back()->with('msg','Something went wrong, please try later...');
                }
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('gmsg','Role deleted successfully');
    } */
}