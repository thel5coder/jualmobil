<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:16
 */

namespace App\Repositories\Contracts;


interface ITipeRepository extends IBaseRepository
{
    public function ShowModelById($modelId);
    public function deleteByModel($modelId);
    public function showWithPaginate();
}