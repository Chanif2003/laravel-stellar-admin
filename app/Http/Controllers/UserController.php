<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.user.index',[
            'user' => User::orderBy('id','DESC')->paginate(5)
        ])->with('no',($request->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('admin.user.create',[
            'roles' => Role::pluck('name','name')->all()
        ]);
    }
}
