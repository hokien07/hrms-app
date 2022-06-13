<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Request\RoleRequest;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    private RoleService $service;

    public function __construct(RoleService  $service)
    {
        $this->service = $service;
    }

    public function index (Request $request) {
        $roles = $this->service->filter($request);
        return view('roles.index', compact('roles'));
    }

    public function add(Request $request) {
        return view('roles.add');
    }

    public function store(RoleRequest $request) {
        if($this->service->store($request)) {
            return redirect()->route('role.home');
        }
        return redirect()->back()->withInput();
    }

    public function edit(Request $request, Role $model) {

    }

    public function update(Request $request, Role $model) {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function  delete (Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json([
                'result' => false,
                'status' => Response::HTTP_NOT_ACCEPTABLE,
                'message' => 'Id is null or not exist'
            ]);
        }
        if($this->service->delete($request->input('id'))) {
            return response()->json([
                'result' => true,
                'status' => Response::HTTP_OK,
                'message' => 'Deleted!'
            ]);
        }
        return response()->json([
            'result' => false,
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => 'Can not delete!'
        ]);
    }
}
