<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReminderTypeCreateUpdateRequest;
use Illuminate\Http\Request;
use App\Services\ReminderTypeService;
use App\Traits\CommonTrait;
use App\Models\ReminderType;
use Yajra\DataTables\DataTables;


class ManageReminderTypeController extends Controller
{
    use CommonTrait;
    protected $reminderTypeService;

    public function __construct(ReminderTypeService $reminderTypeService) {
        $this->reminderTypeService = $reminderTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = ReminderType::latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) {
                        return '<a href="javascript:void(0)" class="btn btn-success"><i class="bx bxs-pencil"></i> </a>
                        <a href="javascript:void(0)" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>';
                    })
                    ->addColumn('status', function($row) {
                        $statusText = ($row->status == 1) ? 'Active' : 'Inactive';
                        return $statusText;
                    })
                    ->addColumn('created_at', function($row) {
                        return date('d M Y',strtotime($row->created_at));
                    })
                    ->rawColumns(['name','status','created_at','action'])
                    ->make(true);
        }
        $title = 'Reminder Type';
        return view('admin.remindertype.index',compact('title'));
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
    public function store(ReminderTypeCreateUpdateRequest $request)
    {
        $createUpdateReminderType = $this->reminderTypeService->store($request);
        if(!$createUpdateReminderType['status']){
            return $this->jsonResponse($createUpdateReminderType);
        }
        return $this->jsonResponse($createUpdateReminderType);
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
}
