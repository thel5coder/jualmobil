<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:10
 */

namespace App\Repositories\Contracts;


interface IBeritaRepository extends IBaseRepository
{
    public function addView($id);
    public function searchBerita($search);
}