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
    $this->middleware('permission:Admin-list|Admin-create|Admin-edit|Admin-delete', ['only' => ['index','show']]);
    $this->middleware('permission:Admin-create',          ['only' =>   ['create','store']]);
    $this->middleware('permission:Admin-edit',            ['only' =>   ['edit','update']]);
    $this->middleware('permission:Admin-upload',          ['only' =>   ['upload_page','upload_process','csvToArray']]);
    $this->middleware('permission:Admin-download',        ['only' =>   ['download_sample_csv']]);
    $this->middleware('permission:Admin-export',          ['only' =>   ['export_allocations']]);
    $this->middleware('permission:Admin-show-deleted',    ['only' =>   ['show_deleted']]);
    $this->middleware('permission:Admin-restore',         ['only' =>   ['restore_single','restore_bulk']]);
    $this->middleware('permission:Admin-delete',          ['only' =>   ['destroy','bulk_delet']]);
    $this->middleware('permission:Admin-perm-delete',     ['only' =>   ['perm_Delete', 'perm_bulk_delet']]);
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
