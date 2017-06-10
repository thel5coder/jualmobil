<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 15:23
 */

namespace App\Services;


use App\Repositories\Contracts\IImagesLmRepository;
use App\Repositories\Contracts\IListingMobilRepository;
use App\Services\Response\ServiceResponseDto;

class ListingMobilService extends BaseService
{
    protected $listingMobil;
    protected $imageLisitngMobil;

    public function __construct(IListingMobilRepository $listingMobil,IImagesLmRepository $imagesLmRepository)
    {
        $this->listingMobil = $listingMobil;
        $this->imageLisitngMobil = $imagesLmRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        $result = $this->listingMobil->create($input);
        if($result)
        {
            for($i=0;$i<count($input['carImageList']);$i++){
                $param = [
                    "listing_mobile_id"=>$result,
                    "image"=>$input['carImageList'][$i]
                ];
                $this->imageLisitngMobil->create($param);
            }
        }
        else{
            $message = ['ada error'];
            $response->addErrorMessage($message);
        }

        return $response;
    }
}