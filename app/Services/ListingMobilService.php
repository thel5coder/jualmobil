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
    protected $listingMobilRepository;
    protected $imageLisitngMobilRepository;

    public function __construct(IListingMobilRepository $listingMobilRepository, IImagesLmRepository $imagesLmRepository)
    {
        $this->listingMobilRepository = $listingMobilRepository;
        $this->imageLisitngMobilRepository = $imagesLmRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        $result = $this->listingMobilRepository->create($input);
        if($result)
        {
            for($i=0;$i<count($input['carImageList']);$i++){
                $param = [
                    "listing_mobile_id" =>$result,
                    "image"             =>$input['carImageList'][$i]
                ];
                $this->imageLisitngMobilRepository->create($param);
            }
        }
        else{
            $message = ['ada error'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function showIklan(){
        if(auth()->user()->tipe_user == 'admin'){
            return $this->ShowAll();
        }else{
            return $this->showByUserId();
        }
    }
    protected function ShowAll()
    {
        return $this->getAllObject($this->listingMobilRepository);
    }

    protected function showByUserId()
    {
        $response = new ServiceResponseDto();
        $dataIklan = $this->listingMobilRepository->showByUserId(auth()->user()->id);
        $dataGambarIklan = array();
        foreach($dataIklan as $iklan){
            $dataGambarIklan[$iklan->id] = $this->imageLisitngMobilRepository->showImagesByListingId($iklan->id);
        }
        $dataResult = [
            'iklan'=>$dataIklan,
            'gambarIklan'=>$dataGambarIklan
        ];

        $response->setResult($dataResult);

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();
        if($this->deleteObject($this->listingMobilRepository,$id)->isSuccess())
        {
            if(!$this->deleteObject($this->imageLisitngMobilRepository,$id)->isSuccess()){
                $message = ['gagal hapus gambar'];
                $response->addErrorMessage($message);
            }
        }else{
            $message = ['gagal hapus iklan'];
            $response->addErrorMessage($message);
        }

        return $response;
    }
}