<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        return '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit-btn btn btn-success"><i class="bi bi-pencil-fill"></i> </a>
                        <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-btn btn btn-danger"><i class="bi bi-trash-fill"></i></a>';
                    })
                    ->addColumn('status', function($row) {
                        $statusText = ($row->status == 1) ? 'Active' : 'Inactive';
                        $statusClass = ($row->status == 1) ? 'bg-success' : 'bg-danger';
                        $updateStatus = ($row->status == 1) ? 0 : 1;
                        $statusText = '<span href="javascript:void(0)" data-id="'.$row->id.'" data-status="'.$updateStatus.'" class="status-change badge rounded-pill  '.$statusClass.'">'.$statusText.'</span>';
                        return $statusText;
                    })
                    ->addColumn('mobile', function($row) {
                        return (!empty($row->mobile)) ? $row->mobile : '-';
                    })
                    ->rawColumns(['name','email','mobile','status','action'])
                    ->make(true);
        }
        $title = 'User';
        return view('admin.user.index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProfile() {
        $title = "Update Profile";
       return view('admin.profile.index',compact('title'));
    }
}
