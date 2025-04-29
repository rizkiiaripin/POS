<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $permissions = Permission::latest()->get();
        return response()->json(['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Buat parent permission
        $parent = Permission::create([
            'name' => $request->parent_name,
            'parent_id' => null,
        ]);

        // 2. Buat sub permission dengan parent_id
        foreach ($request->sub_permissions as $subName) {
            Permission::create([
                'name' => $subName,
                'parent_id' => $parent->id,
            ]);
        }
        return response()->json(['success' => 'Parent Permission & Permission is created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
