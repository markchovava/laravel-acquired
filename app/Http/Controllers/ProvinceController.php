<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvinceController extends Controller
{
    public function indexAll(){
        $data = Province::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->get();
        return ProvinceResource::collection($data);
    }

    public function index(){
        $data = Province::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return ProvinceResource::collection($data);
    }
    
    public function search(Request $request){
        if(!empty($request->search)) {
            $data = Province::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return ProvinceResource::collection($data);
        }
        $data = Province::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return ProvinceResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Province();
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new ProvinceResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Province::find($id);
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new ProvinceResource($data),
        ]);
    }

    public function view($id){
        $data = Province::with(['user'])->find($id);
        return new ProvinceResource($data);
    }

    public function delete($id){
        $data = Province::with(['user'])->find($id);
        $data->delete();
        return response()->json([
            'status' => 1, 
            'message' => 'Data deleted successfully.',
        ]);
    }
    
}
