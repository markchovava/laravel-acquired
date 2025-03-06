<?php

namespace App\Http\Controllers;

use App\Http\Resources\MembershipResource;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MembershipController extends Controller
{
    
    public function indexAll(){
        $data = Membership::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->get();
        return MembershipResource::collection($data);
    }

    public function index(){
        $data = Membership::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return MembershipResource::collection($data);
    }
    
    public function search($search){
        Log::info('$search');
        Log::info($search);
        if(!empty($search)) {
            $data = Membership::with(['user'])
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            Log::info($data);
            return MembershipResource::collection($data);
        }
        $data = Membership::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return MembershipResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Membership();
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->fee = $request->fee;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new MembershipResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Membership::find($id);
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->fee = $request->fee;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new MembershipResource($data),
        ]);
    }

    public function view($id){
        $data = Membership::with(['user'])->find($id);
        return new MembershipResource($data);
    }

    public function delete($id){
        $data = Membership::find($id);
        $data->delete();
        return response()->json([
            'status' => 1, 
            'message' => 'Data deleted successfully.',
        ]);
    }

}
