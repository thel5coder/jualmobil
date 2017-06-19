<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:23
 */

namespace App\Repositories\Contracts;

interface IMerkRepository extends IBaseRepository
{
    public function showMerkWithPaginate();
    public function cekModelByMerkId($merkId);
    public function deleteModelByMerkId($merkId);
}