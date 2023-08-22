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
        return $this->successResponseArr('Reminder Type Saved.',$saveReminderType);
    }
}