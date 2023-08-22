<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReminderTypeCreateUpdateRequest;
use Illuminate\Http\Request;
use App\Services\ReminderTypeService;

class ManageReminderTypeController extends Controller
{
    protected $reminderTypeService;

    public function __construct(ReminderTypeService $reminderTypeService) {
        $this->reminderTypeService = $reminderTypeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            return json_encode(array('data' => $createUpdateReminderType,'status' => 200));
        }
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
