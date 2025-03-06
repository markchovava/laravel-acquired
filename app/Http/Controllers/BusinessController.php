<?php

namespace App\Http\Controllers;

use App\Http\Resources\BusinessResource;
use App\Models\Business;
use App\Models\BusinessCategory;
use App\Models\BusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BusinessController extends Controller
{
    
    public $upload_location = 'assets/img/business/';

    public function index(){
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function indexByUser(){
        $user_id = Auth::user()->id;
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function indexByCity(Request $request){
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('city_id', $request->city_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function indexByProvince(Request $request){
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('province_id', $request->province_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function search($search){
        if(!empty($search)) {
            $data = Business::with(['user', 'city', 'province', 'categories'])
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return BusinessResource::collection($data);
        }
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function searchByUser($search){
        $user_id = Auth::user()->id;
        if(!empty($search)){
            $data = Business::with(['user', 'city', 'province', 'categories'])
                    ->where('user_id', $user_id)
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return BusinessResource::collection($data);
        }
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('user_id', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function searchByCity($city_id, $search){
        if(!empty($search)){
            $data = Business::with(['user', 'city', 'province', 'categories'])
                    ->where('city_id', $city_id)
                    ->where('name', 'LIKE', '%' . $search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return BusinessResource::collection($data);
        }
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('city_id', $city_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function searchByProvince(Request $request){
        if(!empty($request->search)){
            $data = Business::with(['user', 'city', 'province', 'categories'])
                    ->where('province_id', $request->province_id)
                    ->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('name', 'ASC')
                    ->paginate(12);
            return BusinessResource::collection($data);
        }
        $data = Business::with(['user', 'city', 'province', 'categories'])
                ->where('province_id', $request->province_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('name', 'ASC')
                ->paginate(12);
        return BusinessResource::collection($data);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $data = new Business();
        $data->user_id = $user_id;
        $data->city_id = $request->city_id;
        $data->province_id = $request->province_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->price = $request->price;
        $data->description = $request->description;
        if( !empty($request->hasFile('image')) ) {
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'business_' . date('Ymd') . rand(0, 10000) . '.' . $image_extension;
            $image->move($this->upload_location, $image_name);
            $data->image = $this->upload_location . $image_name;                        
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        $details = json_decode($request->business_details, true);
        for( $i = 0; $i < count($details); $i++) {
            $bd = new BusinessDetail();
            $bd->business_id = $data->id;
            $bd->user_id = $user_id;
            $bd->name = $details[$i]['name'];
            $bd->value = $details[$i]['value'];
            $bd->created_at = now();
            $bd->updated_at = now();
            $bd->save();
        }
        /*  */
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new BusinessResource($data),
        ]);
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $data = Business::find($id);
        $data->user_id = $user_id;
        $data->city_id = $request->city_id;
        $data->province_id = $request->province_id;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->price = $request->price;
        $data->description = $request->description;
        if( $request->hasFile('image') ){
            $image = $request->file('image');
            $image_extension = strtolower($image->getClientOriginalExtension());
            $image_name = 'business_' . date('Ymd') . rand(0, 10000) . '.' . $image_extension;
            if(!empty($data->image)){
                if(file_exists( public_path($data->image) )){
                    unlink($data->image);
                }
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;                    
            }else{
                $image->move($this->upload_location, $image_name);
                $data->image = $this->upload_location . $image_name;
            }              
        }
        $data->created_at = now();
        $data->updated_at = now();
        $data->save();
        /*  */
        BusinessDetail::where('business_id', $data->id)->delete();
        $details = json_decode($request->business_details, true);
        for( $i = 0; $i < count($details); $i++) {
            $bd = new BusinessDetail();
            $bd->business_id = $data->id;
            $bd->user_id = $user_id;
            $bd->name = $details[$i]['name'];
            $bd->value = $details[$i]['value'];
            $bd->created_at = now();
            $bd->updated_at = now();
            $bd->save();
        }
        /*  */
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new BusinessResource($data),
        ]);
    }

    public function view($id){
        $data = Business::with(['user', 'city', 'province', 'categories', 'business_details'])
                ->find($id);
        return new BusinessResource($data);
    }

    public function delete($id){
        $data = Business::find($id);
        BusinessCategory::where('business_id', $id)->delete();
        BusinessDetail::where('business_id', $id)->delete();
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Deleted saved successfully.'
        ]);
    }


}
