<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(User $user)
    {
        if ($user->id != Auth::id()) {
            $user->role = !$user->role;
            $user->save();
            return redirect()->route('admin.updateUsers')->withSuccess('Админ назначен');
        } else {
            return redirect()->route('admin.updateUsers')->withError('Нельзя снять админа с себя');
        }
    }
}
