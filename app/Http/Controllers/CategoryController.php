<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CategoryController extends Controller
{
    
    public function indexAll(){
        $data = Category::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->get();
        return CategoryResource::collection($data);
    }

    public function index(){
        $data = Category::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return CategoryResource::collection($data);
    }
    
    public function search($search){
        if(!empty($search)) {
            $data = Category::with(['user'])
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return CategoryResource::collection($data);
        }
        $data = Category::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return CategoryResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Category();
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new CategoryResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Category::find($id);
        $data-> user_id = $user_id;
        $data->name = $request->name;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new CategoryResource($data),
        ]);
    }

    public function view($id){
        $data = Category::with(['user'])->find($id);
        return new CategoryResource($data);
    }

    public function delete($id){
        $data = Category::with(['user'])->find($id);
        $data->delete();
        return response()->json([
            'status' => 1, 
            'message' => 'Data deleted successfully.',
        ]);
    }
    
}
