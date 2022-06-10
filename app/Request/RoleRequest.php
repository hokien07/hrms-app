<?php

namespace App\Request;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $route = $this->route()->getName();
        switch ($route) {
            case "role.store":
                return [
                    'name' => "required|unique:roles,name",
                ];
            case "role.update":
                return [
                    'name' => "required|unique:roles,name," . $this->role->name,
                ];
            default:
                return [];
        }
    }
}
