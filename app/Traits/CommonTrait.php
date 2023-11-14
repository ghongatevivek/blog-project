<?php 

namespace App\Traits;

trait CommonTrait {

    public function successResponseArr($message, $data) : Array {
        return [
            'status' => true,
            'message' => $message,
            'data' => $data
        ];
    }

    public function errorResponseArr($message) : Array {
        return [
            'status' => false,
            'message' => $message
        ];
    }

    public function successResponse($data,$code) {
        return response()->json([
            'data' => $data,
        ]);
    }

    public function jsonResponse($data) {
        return response()->json($data);
    }

    public function editDeleteButtons($row)
    {
        return '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit-btn btn btn-success"><i class="bi bi-pencil-fill"></i> </a>
        <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete-btn btn btn-danger"><i class="bi bi-trash-fill"></i></a>';
    }

    public function statusUpdate($row)
    {
        $statusText = ($row->status == 1) ? 'Active' : 'Inactive';
        $statusClass = ($row->status == 1) ? 'bg-success' : 'bg-danger';
        $updateStatus = ($row->status == 1) ? 0 : 1;
        $statusText = '<span href="javascript:void(0)" data-id="'.$row->id.'" data-status="'.$updateStatus.'" class="status-change badge rounded-pill  '.$statusClass.'">'.$statusText.'</span>';
        return $statusText;
    }
}