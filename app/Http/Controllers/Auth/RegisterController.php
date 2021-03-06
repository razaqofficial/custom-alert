<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use DB;
use Auth;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        DB::commit();

        Auth::login($user);

        return redirect(route('alert.index'))->with('success', 'Welcome to customer alert!');

    }
}
