<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BusinessCategory;
use App\Http\Resources\BusinessCategoryResource;


class BusinessCategoryController extends Controller
{
    
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

    public function indexByBusiness($business_id) {
        $data = BusinessCategory::with(['business', 'category'])
                ->where('business_id', $business_id)
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
        return BusinessCategoryResource::collection($data);
    }

    public function indexByCategory($category_id) {
        $data = BusinessCategory::with(['business', 'category'])
                ->where('category_id', $category_id)
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
        return BusinessCategoryResource::collection($data);
    }

    public function delete($id) {
        $data = BusinessCategory::find($id);
        $data->delete();
    }

    
}
