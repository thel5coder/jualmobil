<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:16
 */

namespace App\Repositories\Contracts;
interface IModelRepository extends IBaseRepository
{
    public function ShowByMerkId($merkId);
    public function deleteByMerk($merkId);
    public function showWithPaginate();
}