<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function index()
    {

    }
    public function store(OrderRequest $request)
    {
        $data = $request->validated();

        $password = Hash::make('12345678');

        $user = User::firstOrCreate([
            'email' => $data['email'],
        ],[
            'name' => $data['name'],
            'address' => $data['address'],
            'password' => $password,
        ]);
        $order = Order::create([
            'user_id' => $user->id,
            'products' => json_encode($data['products']),
            'total_price' => $data['total_price'],
        ]);

        return OrderResource::make($order);
    }

}
