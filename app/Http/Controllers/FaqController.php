<?php

namespace App\Http\Controllers;

use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class FaqController extends Controller
{
    
    public function indexAll(){
        $data = Faq::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('title', 'ASC')
                ->get();
        return FaqResource::collection($data);
    }

    public function index(){
        $data = Faq::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('title', 'ASC')
                ->paginate(12);
        return FaqResource::collection($data);
    }
    
    public function search(Request $request){
        if(!empty($request->search)) {
            $data = Faq::with(['user'])
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('title', 'ASC')
                    ->paginate(12);
            return FaqResource::collection($data);
        }
        $data = Faq::with(['user'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('title', 'ASC')
                ->paginate(12);
        return FaqResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Faq();
        $data-> user_id = $user_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new FaqResource($data)
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Faq::find($id);
        $data-> user_id = $user_id;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        return response()->json([
            'status' => 1,
            'message' => "Data saved successfully.",
            'data' => new FaqResource($data),
        ]);
    }

    public function view($id){
        $data = Faq::with(['user'])->find($id);
        return new FaqResource($data);
    }

    public function delete($id){
        $data = Faq::find($id);
        $data->delete();
        return response()->json([
            'status' => 1, 
            'message' => 'Data deleted successfully.',
        ]);
    }


}
