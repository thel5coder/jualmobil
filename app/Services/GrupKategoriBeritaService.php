<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 19:29
 */

namespace App\Services;


use App\Repositories\Contracts\IBeritaRepository;
use App\Repositories\Contracts\IGrupKategoriBeritaRepository;
use App\Services\Response\ServiceResponseDto;

class GrupKategoriBeritaService
{
    protected $GrupKategoriBeritaRepository;
    protected $beritaRepository;

    public function __construct(IGrupKategoriBeritaRepository $grupKategoriBeritaRepository, IBeritaRepository $beritaRepository)
    {
        $this->GrupKategoriBeritaRepository = $grupKategoriBeritaRepository;
        $this->beritaRepository = $beritaRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();

        $this->GrupKategoriBeritaRepository->create($input);

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();

        $this->GrupKategoriBeritaRepository->delete($id);

        return $response;
    }
}