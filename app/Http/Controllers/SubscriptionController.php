<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /* 
        'id',
        'user_id',
        'membership_id',
        'status',
        'amount_paid',
        'status',
        'expiry_date',
        'created_at',
        'updated_at',
    */

    public function index(){
        $data = Subscription::with(['user_id', 'membership_id'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);
        return SubscriptionResource::collection($data);
    }

    public function indexByUser() {
        $user_id = Auth::user()->id;
        $data = Subscription::with(['user_id', 'membership_id'])
            ->where('user_id', $user_id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);
        return SubscriptionResource::collection($data);
    }

    public function search(Request $request) {
        if(!empty($request->search)) {
            $data = Subscription::with(['user'])
                ->where('expiry_data', 'LIKE', '%' . $request->search . '%')
                ->orderBy('updated_at', 'DESC')
                ->paginate(12);
            return SubscriptionResource::collection($data);
        }
        $data = Subscription::with(['user'])
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);
        return SubscriptionResource::collection($data);
    }

    public function view($id) {
        $data = Subscription::with(['user_id', 'membership_id'])->find($id);
    }

    public function store(Request $request) {
        //
    }

    
    public function update(Request $request, $id) {

    }


    public function delete($id) {

    }


}
