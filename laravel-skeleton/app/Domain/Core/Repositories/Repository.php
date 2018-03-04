<?php
/**
* Created by PhpStorm.
* User: Edwin Setiawan
* Date: 10/13/2016
* Time: 2:38 PM
*/


namespace App\Domain\Core\Repositories;

/**
 * Class Repository
 * @package App\Domain\Core\Repositories
 */
class Repository
{
    protected $model;

    public function __construct()
    {

    }

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}
