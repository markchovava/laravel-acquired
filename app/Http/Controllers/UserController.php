<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function generateRandomText($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $shuffled = str_shuffle($characters);
        return substr($shuffled, 0, $length);
    }
    
    public function index(){
        $user_id = Auth::user()->id;
        $data = User::with(['role'])
                ->where('id', '!=', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('fname', 'ASC')
                ->orderBy('lname', 'ASC')
                ->paginate(12);
        return UserResource::collection($data);
    }

    public function searchFirstName(Request $request){
        $user_id = Auth::user()->id;
        if(!empty($request->search)) {
            $data = User::with(['role'])
                    ->where('id', '!=', $user_id)
                    ->where('fname', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('fname', 'ASC')
                    ->paginate(12);
            return UserResource::collection($data);
        }
        $data = User::with(['role'])
                ->where('id', '!=', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('fname', 'ASC')
                ->paginate(12);
        return UserResource::collection($data);
    }

    public function searchLastName(Request $request){
        $user_id = Auth::user()->id;
        if(!empty($request->search)) {
            $data = User::with(['role'])
                    ->where('id', '!=', $user_id)
                    ->where('lname', 'LIKE', '%' . $request->search . '%')
                    ->orderBy('updated_at', 'DESC')
                    ->orderBy('lname', 'ASC')
                    ->paginate(12);
            return UserResource::collection($data);
        }
        $data = User::with(['role'])
                ->where('id', '!=', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->orderBy('lname', 'ASC')
                ->paginate(12);
        return UserResource::collection($data);
    }

    public function view($id){
        $data = User::with(['role'])->find($id);
        return new UserResource($data);
    }

    public function store(Request $request) {
        $code = $this->generateRandomText();
        $data = new User();
        $data->role_level = $request->role_level ?? 4;
        $data->membership_id = $request->membership_id ?? '';
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->skillset = $request->skillset;
        $data->bio = $request->bio;
        $data->acquisition = $request->acquisition;
        $data->linkedin = $request->linkedin;
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->updated_at = now();
        $data->created_at = now();
        $data->save();
        /*  */
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new UserResource($data),
        ]);

    }

    public function update(Request $request, $id){
        $code = $this->generateRandomText();
        $data = User::find($id);
        $data->role_level = $request->role_level ?? 4;
        $data->membership_id = $request->membership_id ?? '';
        $data->fname = $request->fname;
        $data->lname = $request->lname;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->skillset = $request->skillset;
        $data->bio = $request->bio;
        $data->acquisition = $request->acquisition;
        $data->linkedin = $request->linkedin;
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->updated_at = now();
        $data->save();
        /*  */
        return response()->json([
            'status' => 1,
            'message' => 'Data saved successfully.',
            'data' => new UserResource($data),
        ]);
    }

    public function delete($id){
        $data = User::find($id);
        $sub = Subscription::where('user_id', $data->id);
        if( !isset($sub) ) {
            $sub->delete();
        }
        $data->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Data deleted successfully.',
        ]);
    }


}
