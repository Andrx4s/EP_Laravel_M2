<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * @param LoginValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return back()->with(['success' => 'true']);
        }
        return back()->withErrors(['auth' => 'Логин или пароль не верный!']);
    }

    public function register()
    {
        return view('users.register');
    }

    /**
     * @param RegisterValidation $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerPost(RegisterValidation $request, Role $role)
    {
        $requests = $request->validated();
        unset($requests['photo_file']);
        # public/asd.jpg
        $photo = $request->file('photo_file')->store('public');
        # Explode => / => public/asd,jpg => ['public', 'asd.jpg']
        $requests['avatar'] = explode('/', $photo)[1];
        $requests['password'] = Hash::make($requests['password']);
        User::create($requests);
        return redirect()->route('login')->with(['register' => true]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }

    public function show()
    {
        $users = User::select('*');
        $usersItems = $users->get();

        return view('admin.users', ['users' => $usersItems]);
    }
}
