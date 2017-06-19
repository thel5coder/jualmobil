<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 06/06/2017
 * Time: 16:20
 */

namespace App\Repositories\Contracts;

interface IImagesLmRepository extends IBaseRepository
{
    public function showImagesByListingId($listingID);
    public function showImagesFirstByListingId($listingId);
}