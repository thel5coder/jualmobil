<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:31
 */

namespace App\Services;

use App\Repositories\Contracts\IModelRepository;
use App\Repositories\Contracts\ITipeRepository;
use App\Services\Response\ServiceResponseDto;

class TipeService extends  BaseService
{
    protected $tipeRepository;

    public function __construct(ITipeRepository $tipeRepository)
    {
        $this->tipeRepository = $tipeRepository;
    }
    public function create($input)
    {
        $response = new ServiceResponseDto();
        $response = new ServiceResponseDto();
        if( !$this->tipeRepository->create($input) )
        {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($response);
        }
        return $response;
    }
    public function ShowByModelId($modelId)
    {
        $response = new ServiceResponseDto();
        $result = $this->tipeRepository->ShowModelById($modelId);
        for ($i = 0; $i < count($result); $i++) {
            $param [] = [
                'id' => $result[$i]->id,
                'text' => $result[$i]->tipe
            ];
        }
        $response->setResult($param);

        return $response;
    }

    public function showWithPaginate()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->tipeRepository->showWithPaginate());

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();

        $this->tipeRepository->delete($id);

        return $response;
    }
}