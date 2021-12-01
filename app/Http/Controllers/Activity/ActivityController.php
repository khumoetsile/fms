<?php

namespace App\Http\Controllers\Activity;
use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
    $this->middleware('permission:SuperAdmin-list|SuperAdmin-create|SuperAdmin-edit|SuperAdmin-delete', ['only' => ['index','show']]);
    $this->middleware('permission:SuperAdmin-create',          ['only' =>   ['create','store']]);
    $this->middleware('permission:SuperAdmin-edit',            ['only' =>   ['edit','update']]);
    $this->middleware('permission:SuperAdmin-upload',          ['only' =>   ['upload_page','upload_process','csvToArray']]);
    $this->middleware('permission:SuperAdmin-download',        ['only' =>   ['download_sample_csv']]);
    $this->middleware('permission:SuperAdmin-export',          ['only' =>   ['export_allocations']]);
    $this->middleware('permission:SuperAdmin-show-deleted',    ['only' =>   ['show_deleted']]);
    $this->middleware('permission:SuperAdmin-restore',         ['only' =>   ['restore_single','restore_bulk']]);
    $this->middleware('permission:SuperAdmin-delete',          ['only' =>   ['destroy','bulk_delet']]);
    $this->middleware('permission:SuperAdmin-perm-delete',     ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
    }
    
    /**
     * Display Country listing .
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::select()->orderByDesc('id')->get();
        return view('activities.index_activities',compact('activities'));
    }

}
