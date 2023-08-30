<?php 

namespace App\Services;

use App\Models\ReminderType;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class ReminderTypeService{

    use CommonTrait;
    public function store(Request $request) {

        $input = $request->validated();
        $saveReminderType = ReminderType::create($input);
        return $this->successResponseArr('Reminder type saved.',$saveReminderType);
    }

    public function show($id){
        $getReminderType = ReminderType::where('id',$id)->first();
        if($getReminderType == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        return $this->successResponseArr('Reminder type fetch successfully.',$getReminderType);
    }

    public function update(Request $request,$id) {
        $reminderType = ReminderType::where('id',$id)->first();
        if($reminderType == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        $input = $request->validated();
        $reminderType->update($input);
        return $this->successResponseArr('Reminder type updated.',$reminderType);
    }

    public function destroy($id){
        $getReminderType = ReminderType::where('id',$id)->first();
        if($getReminderType == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        $getReminderType->delete();
        return $this->successResponseArr('Reminder type deleted successfully.',[]);
    }
}