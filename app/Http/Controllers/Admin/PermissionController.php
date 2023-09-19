<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:permissions.index']);
    } 

    /**
     * function index
     *
     * @return void
     */
    public function index()
    {

        //query basic 
        // $permissions = Permission::latest()->when(request()->q, function($permissions) {
        //     $permissions = $permissions->where('name', 'like', '%'. request()->q . '%');
        // })->paginate(5);
            $query = Permission::latest();

            if (request()->q) {
                $query->where('name', 'like', '&' . request()->q . '%');
            }
            $permissions = $query->paginate(5);

        return view('admin.permission.index', compact('permissions'));
    }

    public function delete($id)
{
    try {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Izin berhasil dihapus.');
    } catch (\Exception $e) {
        // Tangani kesalahan jika terjadi
        return redirect()->route('permissions.index')->with('error', 'Gagal menghapus izin. Silakan coba lagi.');
    }
}



}