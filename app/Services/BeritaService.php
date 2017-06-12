<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:39
 */

namespace App\Services;


use App\Repositories\Contracts\IBeritaRepository;
use App\Services\Response\ServiceResponseDto;

class BeritaService extends BaseService
{
    protected $beritaRepository;

    public function __construct(IBeritaRepository $beritaRepository)
    {
        $this->beritaRepository = $beritaRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        if(!$this->beritaRepository->create($input))
        {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function update($input)
    {
        $response = new ServiceResponseDto();
        if(!$this->beritaRepository->update($input))
        {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function delete()
    {

    }
}