<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $orders = Order::query()->get();
    $userIds = [];
    foreach ($orders as $order) {
        $userIds[] = $order->user_id;
    }
    $users = User::query()->whereIn('id', $userIds)->get();
    $usersMap = [];
    foreach($users as $user) {
        $usersMap[$user->id] = $user;
    }
    return view('welcome')
        ->with('orders', $orders)
        ->with('usersMap', $usersMap);
});
