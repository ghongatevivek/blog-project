<?php 

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\CommonTrait;

class ManageUserService{

    use CommonTrait;
    public function store(Request $request) {

        $input = $request->validated();
        $input['user_type'] = 1;
        $input['status'] = 1;
        $saveUser = User::create($input);
        return $this->successResponseArr('User saved.',$saveUser);
    }

    public function show($id){
        $getUser = User::where('id',$id)->first();
        if($getUser == null){
            return $this->errorResponseArr('User Not Found');
        }
        return $this->successResponseArr('User fetch successfully.',$getUser);
    }

    public function update(Request $request,$id) {
        $user = User::where('id',$id)->first();
        if($user == null){
            return $this->errorResponseArr('User Not Found');
        }
        $input = $request->validated();
        $user->update($input);
        return $this->successResponseArr('User updated.',$user);
    }

    public function delete($id){
        $getUser = User::where('id',$id)->first();
        if($getUser == null){
            return $this->errorResponseArr('User Not Found');
        }
        $getUser->delete();
        return $this->successResponseArr('User deleted successfully.',[]);
    }

    public function updateStatus(Request $request) {
        $id = $request->id;
        $getUserDetail = User::where('id',$id)->first();
        if($getUserDetail == null){
            return $this->errorResponseArr('User Not Found');
        }
        $input['status'] = $request->status;
        $getUserDetail->update($input);
        return $this->successResponseArr('User updated successfully.',[]);
    }
}