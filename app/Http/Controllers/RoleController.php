<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleService $service;

    public function __construct(RoleService  $service)
    {
        $this->service = $service;
    }

    public function index (Request $request) {
        return view('roles.index');
    }

    public function add(Request $request) {
        return view('roles.add');
    }

    public function store(Request $request) {

    }

    public function edit(Request $request, Role $model) {

    }

    public function update(Request $request, Role $model) {

    }
}
