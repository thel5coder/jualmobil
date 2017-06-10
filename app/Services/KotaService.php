<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 22:08
 */

namespace App\Services;


use App\Repositories\Actions\KotaRepository;
use App\Services\Response\ServiceResponseDto;

class KotaService
{
    protected $kotaRepository;

    public function __construct(KotaRepository $kotaRepository)
    {
        $this->kotaRepository = $kotaRepository;
    }

    public function ShowByProvinsiId($provinsiId)
    {
        $response = new ServiceResponseDto();
        $result = $this->kotaRepository->ShowByProvinsiId($provinsiId);
        for( $i=0; $i<count($result); $i++ )
        {
            $param [] = [
              'id' => $result[$i]->id,
              'text' => $result[$i]->nama
            ];
        }
        $response->setResult($param);
        return $response;
    }
}