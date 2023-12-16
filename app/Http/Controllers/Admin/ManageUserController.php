<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\ManageUserService;
use App\Traits\CommonTrait;
use Yajra\DataTables\DataTables;

class ManageUserController extends Controller
{
    use CommonTrait;
    protected $userService;

    public function __construct(ManageUserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = User::whereNotIn('id',[1])->latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        return $this->editDeleteButtons($row);
                    })
                    ->addColumn('status', function($row) {
                        return $this->statusUpdate($row);
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
    public function store(ManageUserRequest $request)
    {
        if(!empty($request->id) && $request->id != null){
            $createUpdateReminderType = $this->userService->update($request,$request->id);
        }else{
            $createUpdateReminderType = $this->userService->store($request);
        }
        return $this->jsonResponse($createUpdateReminderType);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->show($id);
        return $this->jsonResponse($user);
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

    public function updateProfile(Request $request)
    {
        $getAuthUserDetail = User::where('id',auth()->id())->first();
        $getAuthUserDetail->name = $request->name;
        $getAuthUserDetail->email = $request->email;
        $getAuthUserDetail->mobile = $request->mobile;
        $getAuthUserDetail->update();
        return redirect()->back();
    }
}
