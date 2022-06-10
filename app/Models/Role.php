<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    protected $fillable = ['name'];

    public function scopeFilter($query, $request, $option = [])
    {
        $table = $this->table;
        $request = (object)array_merge(
            [
                'id' => ''
            ],
            $request
        );
        $query = $query->select("*");
        $query->orderBy("$table.id", 'desc');

        return $query;
    }
}
