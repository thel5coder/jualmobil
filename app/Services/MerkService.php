<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:24
 */

namespace App\Services;


use App\Repositories\Contracts\IMerkRepository;
use App\Repositories\Contracts\IModelRepository;
use App\Repositories\Contracts\ITipeRepository;
use App\Services\Response\ServiceResponseDto;

class MerkService extends BaseService
{
    protected $merkRepository,$modelRepository,$tipeRepository;

    public function __construct(IMerkRepository $merkRepository,IModelRepository $modelRepository,ITipeRepository $tipeRepository)
    {
        $this->merkRepository = $merkRepository;
        $this->modelRepository = $modelRepository;
        $this->tipeRepository = $tipeRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        if( !$this->merkRepository->create($input) )
        {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($response);
        }
        return $response;
    }

    public function showAll()
    {
        return $this->getAllObject($this->merkRepository);
    }

    public function showMerkWithPaginate()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->merkRepository->showMerkWithPaginate());

        return $response;
    }


    public function delete($id)
    {
        $response = new ServiceResponseDto();
        $dataModel = $this->modelRepository->ShowByMerkId($id);
        foreach ($dataModel as $item) {
            if(!$this->tipeRepository->deleteByModel($item['id'])){
                $message=['Error delete time'];
                $response->addErrorMessage($message);
            }
        }
        if($this->modelRepository->deleteByMerk($id))
        {
           if(! $this->merkRepository->delete($id))
           {
               $message=['Error delete time Merk'];
               $response->addErrorMessage($message);
           }
        } else {
            //jika model kosong hapus model
            if(!$this->merkRepository->delete($id))
            {
                $message=['Eroor Delete Merk'];
                $response->addErrorMessage($message);
            }
        }

        return $response;
    }

    protected function cekModelByMerkId($merkId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->merkRepository->cekModelByMerkId($merkId));

        return $response;
    }

    protected function cekTipeByModelId($modelId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->modelRepository->cekTipeByModelId($modelId));

        return $response;
    }
}