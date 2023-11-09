<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class ManageUserService{

    use CommonTrait;
    public function store(Request $request) {

        $input = $request->validated();
        $saveUser = User::create($input);
        return $this->successResponseArr('Reminder type saved.',$saveUser);
    }

    public function show($id){
        $getUser = User::where('id',$id)->first();
        if($getUser == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        return $this->successResponseArr('Reminder type fetch successfully.',$getUser);
    }

    public function update(Request $request,$id) {
        $user = User::where('id',$id)->first();
        if($user == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        $input = $request->validated();
        $user->update($input);
        return $this->successResponseArr('Reminder type updated.',$user);
    }

    public function delete($id){
        $getUser = User::where('id',$id)->first();
        if($getUser == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        $getUser->delete();
        return $this->successResponseArr('Reminder type deleted successfully.',[]);
    }

    public function updateStatus(Request $request) {
        $id = $request->id;
        $getUserDetail = User::where('id',$id)->first();
        if($getUserDetail == null){
            return $this->errorResponseArr('Reminder Type Not Found');
        }
        $input['status'] = $request->status;
        $getUserDetail->update($input);
        return $this->successResponseArr('Reminder type updated successfully.',[]);
    }
}