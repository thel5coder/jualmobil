<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:27
 */

namespace App\Services;


use App\Repositories\Contracts\IModelRepository;
use App\Repositories\Contracts\ITipeRepository;
use App\Services\Response\ServiceResponseDto;

class ModelService extends BaseService
{
    protected $modelRepository,$tipeRepository;

    public function __construct(IModelRepository $modelRepository, ITipeRepository $tipeRepository)
    {
        $this->modelRepository = $modelRepository;
        $this->tipeRepository = $tipeRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        if($input['merk'] == '')
        {
            $message = 'merk kosong';
            $response->addErrorMessage($message);
        }
        else{
            $this->modelRepository->create($input);
        }

        return $response;
    }

    public function ShowByMerkID($merkId)
    {
        $response = new ServiceResponseDto();
        $result = $this->modelRepository->ShowByMerkId($merkId);

        for($i=0;$i<count($result);$i++){
            $data[]=[
                'id'=>$result[$i]->id,
                'text'=>$result[$i]->model
            ];
        }

        $response->setResult($data);

        return $response;
    }

    public function showAll()
    {
        return $this->getAllObject($this->modelRepository);
    }

    public function showWithPaginate()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->modelRepository->showWithPaginate());

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();

        if( $this->tipeRepository->deleteByModel($id) )
        {
            if( !$this->modelRepository->delete($id) )
            {
                $message = ['gagal menghapus model setelah menghapus tipe'];
                $response->addErrorMessage($message);
            }
        }
        else{
            if( !$this->modelRepository->delete($id) )
            {
                $message = ['gagal menghapus model '];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

}