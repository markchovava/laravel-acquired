<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessCategory;
use App\Http\Resources\BusinessCategoryResource;
use Illuminate\Support\Facades\Log;

class BusinessCategoryController extends Controller
{

    public function indexByBusiness($id) {
        $data = BusinessCategory::with(['business', 'category'])
                ->where('business_id', $id)
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
        return BusinessCategoryResource::collection($data);
    }

    public function indexByCategory($id) {
        $data = BusinessCategory::with(['business', 'category'])
                ->where('category_id', $id)
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
        return BusinessCategoryResource::collection($data);
    }
    
    public function index() {
        $data = BusinessCategory::with(['business', 'category'])
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
        return BusinessCategoryResource::collection($data);
    }

    public function view($id) {
        $data = BusinessCategory::with(['business', 'category'])
                ->find($id);
        return BusinessCategoryResource::collection($data);
    }

    public function store(Request $request) {
        Log::info($request);
        $user_id = Auth::user()->id;
        $data = new BusinessCategory();
        $data->user_id = $user_id;
        $data->business_id = $request->business_id;
        $data->category_id = $request->category_id;
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        /*  */
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new BusinessCategoryResource($data),
        ]);
    }



    public function delete($id) {
        $data = BusinessCategory::find($id);
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Data deleted successfully.'
        ]);
    }

    
}
