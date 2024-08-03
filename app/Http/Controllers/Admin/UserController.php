<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.user.index', compact('users', 'roles'));
    }


    public function create()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.user.create', ['users' => $users, 'roles' => $roles]);
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['birthdate'] = \Carbon\Carbon::createFromFormat('d.m.Y', $data['birthdate'])->format('Y-m-d');

        $user = new User($data);
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Пользователь '.$user['name'].' успешно добавлен!');
    }


    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.user.show', compact('user', 'roles'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }


    public function update(UpdateRequest $request, User $user)
    {
        // Получаем валидированные данные из формы
        $data = $request->validated(); 
        // dd($data);
        // Преобразуем дату в формат базы данных
        // $data['birthdate'] = \Carbon\Carbon::createFromFormat('d.m.Y', $data['birthdate'])->format('Y-m-d');
 
        $user->update($data);
 
     
        return redirect()->route('admin.user.show', $user->id)->with('success', 'Пользователь '.$user['name'].' успешно обновлён!');
    }


    public function destroy(User $user)
    {
        //
    }
}
