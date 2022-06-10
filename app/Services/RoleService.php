<?php

namespace App\Services;

use App\Models\Role;
use App\Request\RoleRequest;
use Illuminate\Http\Request;

class RoleService extends ModelService
{

    public function __construct()
    {
        $this->model = resolve(Role::class);
    }

    public function filter($params)
    {
        if ($params instanceof Request) {
            $params = vaild_params([
                's' => 'nullable|string|max:255',
            ], $params);
        }
        return $this->model->filter($params)->get();
    }


    /**
     * @param RoleRequest $request
     * @return mixed
     */
    public function store (RoleRequest $request) {
       return $this->model->fill([
            'name' => $request->input('name')
        ])->save();
    }

    /**
     * @param RoleRequest $request
     * @param Role $role
     * @return bool
     */
    public function update (RoleRequest $request, Role $role) {
        return $role->fill([
            'name' => $request->input('name')
        ])->save();
    }

    public function delete (int $id) {
        return $this->model->where('id', $id)->delete();
    }
}
