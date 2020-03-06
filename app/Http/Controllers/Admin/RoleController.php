<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::all();
        return view('admin.role', compact('role'));
    }
    
    public function store(Request $request)
    {
        $role = Role::updateOrCreate(
            ['role_id' => $request->role_id],
            [
                'role_name_ru' => $request->role_name_ru,
                'role_name_kz' => $request->role_name_kz,
                'role_name_en' => $request->role_name_en
            ]
        );

        if (!$request->has('role_id')) {
            return $role;
        }
    }
    
    public function destroy(Role $role)
    {
        $role->delete(); 
    }
}
