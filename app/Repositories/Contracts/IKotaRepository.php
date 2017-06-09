<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 14:44
 */

namespace App\Repositories\Contracts;


interface IKotaRepository extends IBaseRepository
{
    public function ShowByProvinsiId($provinsiId);
}