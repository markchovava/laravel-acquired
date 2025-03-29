<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessMessageResource;
use App\Models\Business;
use App\Models\BusinessMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessMessageController extends Controller
{
    public function indexAllByStatus($status) {
        $data = BusinessMessage::with(['user', 'business'])
            ->where('status', $status)
            ->orderBy('updated_at', 'DESC')
            ->orderBy('name', 'ASC')
            ->get();
        return BusinessMessageResource::collection($data);
    }
    
    public function indexByStatusUser($status) {
        $user_id = Auth::user()->id;
        $data = BusinessMessage::with(['user', 'business'])
            ->where('user_id', $user_id)
            ->where('status', $status)
            ->orderBy('updated_at', 'DESC')
            ->orderBy('name', 'ASC')
            ->paginate(12);
        return BusinessMessageResource::collection($data);
    }
    
    public function indexByStatus($status) {
        $data = BusinessMessage::with(['user', 'business'])
            ->where('status', $status)
            ->orderBy('updated_at', 'DESC')
            ->orderBy('name', 'ASC')
            ->paginate(12);
        return BusinessMessageResource::collection($data);
    }

    public function updateStatus(Request $request) {
        $data = BusinessMessage::find($request->id);
        $data->status = $request->status;
        $data->updated_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new BusinessMessageResource($data),
        ]);
    }
   
    public function searchByUser($search){
        $user_id = Auth::user()->id;
        if(!empty($search)){
            $data = BusinessMessage::with(['user', 'business'])
                    ->where('user_id', $user_id)
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12)
                    ->withQueryString();
            return BusinessMessageResource::collection($data);
        }
        $data = BusinessMessage::with(['user', 'business'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12)
                ->withQueryString();
        return BusinessMessageResource::collection($data);
    }

    public function indexByUser(){
        $user_id = Auth::user()->id;
        $data = BusinessMessage::with(['user', 'business'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12)
                ->withQueryString();
        return BusinessMessageResource::collection($data);
    }

    public function index(){
        $data = BusinessMessage::with(['user', 'business'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12)
                ->withQueryString();
        return BusinessMessageResource::collection($data);
    }

    public function search($search){
        if(!empty($search)) {
            $data = BusinessMessage::with(['user', 'business'])
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12)
                    ->withQueryString();
            return BusinessMessageResource::collection($data);
        }
        $data = BusinessMessage::with(['user', 'business'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12)
                ->withQueryString();
        return BusinessMessageResource::collection($data);
    }

    public function view($id){
        $data = BusinessMessage::with(['user', 'business'])->find($id);
        return new BusinessMessageResource($data);
    }

    public function store(Request $request) {
        $data = new BusinessMessage();
        $data->business_id = $request->business_id;
        $data->user_id = $request->user_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->status = 'Unread';
        $data->timeframe = $request->timeframe;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new BusinessMessageResource($data),
        ]);
    }

    public function delete($id) {
        $data = BusinessMessage::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Data deleted successfully.'
        ]);
    }

}
