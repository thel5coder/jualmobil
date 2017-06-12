<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 10/06/2017
 * Time: 11:09
 */

namespace App\Repositories\Contracts;


interface IListingMobilRepository extends IBaseRepository
{
    public function showByUserId($userId);
    public function setActiveListingMobil($id);
    public function setRejectListingMobil($id,$alasan);
}