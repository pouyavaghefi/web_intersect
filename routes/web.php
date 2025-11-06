<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    $products = \App\Models\Product::all();
    $sliders = \App\Models\Slider::all();

    return view('plans.membership', compact('products','sliders'));
});

Route::get('/user/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();

    return redirect('/');
});

Route::get('/checkout',function(){
    return view('plans.checkout');
})->name('checkout')->middleware('auth');

Route::post('/checkout/update', function(Request $request) {
    $user = auth()->user();

    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName'  => 'nullable|string|max:255',
        'email'     => 'required|email|max:255',
        'phone'     => 'required|string|max:20',
    ]);

    $user->update([
        'name'      => $validated['firstName'],
        'last_name' => $validated['lastName'] ?? null,
        'email'     => $validated['email'],
        'phone'     => $validated['phone'] ?? null,
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully.');
})->name('checkout.update')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});

require __DIR__ . '/chat.php';
require __DIR__ . '/files.php';
