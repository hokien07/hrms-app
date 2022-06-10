<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class ModelService
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Set the model
     *
     * @param Model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the model
     *
     * @return Model
     */
    public function getModel()
    {

        return $this->model;
    }

}
