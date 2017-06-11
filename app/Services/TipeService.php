<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:31
 */

namespace App\Services;

use App\Repositories\Contracts\ITipeRepository;
use App\Services\Response\ServiceResponseDto;

class TipeService
{
    protected $tipeRepository;

    public function __construct(ITipeRepository $tipeRepository)
    {
        $this->tipeRepository = $tipeRepository;
    }

    public function ShowByModelId($modelId)
    {
        $response = new ServiceResponseDto();
        $result = $this->tipeRepository->ShowModelById($modelId);
//    dd($result);
        for ($i = 0; $i < count($result); $i++) {
            $param [] = [
                'id' => $result[$i]->id,
                'text' => $result[$i]->tipe
            ];
        }
        $response->setResult($param);

        return $response;
    }
}