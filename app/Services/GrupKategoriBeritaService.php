<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 19:29
 */

namespace App\Services;


use App\Repositories\Contracts\IGrupKategoriBeritaRepository;
use App\Services\Response\ServiceResponseDto;

class GrupKategoriBeritaService
{
    protected $GrupKategoriBeritaRepository;

    public function __construct(IGrupKategoriBeritaRepository $grupKategoriBeritaRepository)
    {
        $this->GrupKategoriBeritaRepository = $grupKategoriBeritaRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();

        $this->GrupKategoriBeritaRepository->create($input);

        return $response;
    }
}