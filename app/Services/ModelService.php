<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:27
 */

namespace App\Services;


use App\Repositories\Contracts\IModelRepository;
use App\Services\Response\ServiceResponseDto;

class ModelService
{
    protected $modelRepository;

    public function __construct(IModelRepository $modelRepository)
    {
        $this->modelRepository = $modelRepository;
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
}