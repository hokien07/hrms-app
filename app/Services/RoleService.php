<?php

namespace App\Services;

use App\Models\Role;

class RoleService extends ModelService
{

    public function __construct()
    {
        $this->model = resolve(Role::class);
    }
}
