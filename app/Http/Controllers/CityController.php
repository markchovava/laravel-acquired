<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    
    public function indexAll(){
        $data = City::with(['user', 'province'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->get();
        return CityResource::collection($data);
    }

    public function indexByProvince($province_id){
        $data = City::with(['user', 'province'])
                ->where('province_id', $province_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return CityResource::collection($data);
    }

    public function index(){
        $data = City::with(['user', 'province'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return CityResource::collection($data);
    }
    
    public function search(Request $request){
        if(!empty($request->search)) {
            $data = City::with(['user', 'province'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return CityResource::collection($data);
        }
        $data = City::with(['user', 'province'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return CityResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new City();
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->province_id = $request->province_id;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new CityResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = City::find($id);
        $data-> user_id = $user_id;
        $data->province_id = $request->province_id;
        $data->name = $request->name;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new CityResource($data),
        ]);
    }

    public function view($id){
        $data = City::with(['user', 'province'])->find($id);
        return new CityResource($data);
    }

    public function delete($id){
        $data = City::find($id);
        $data->delete();
        return response()->json([
            'status' => 1, 
            'message' => 'Data deleted successfully.',
        ]);
    }

}
