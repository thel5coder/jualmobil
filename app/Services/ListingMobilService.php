<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 15:23
 */

namespace App\Services;


use App\Repositories\Contracts\IListingMobil;

class ListingMobilService extends BaseService
{
    protected $listingMobil;

    public function __construct(IListingMobil $listingMobil)
    {
        $this->listingMobil = $listingMobil;
    }

    public function create($input)
    {
        $result = $this->listingMobil->create($input);
        $fileImage = $this->uploadingFile('images')->getResult();
        if($result)
        {
            $param = [
              'listing_mobile_id' => $result,
                'images' => $fileImage,
            ];
        }
    }
}