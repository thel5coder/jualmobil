<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 21:24
 */

namespace App\Services;


use App\Repositories\Contracts\IMerkRepository;
use App\Services\Response\ServiceResponseDto;

class MerkService extends BaseService
{
    protected $merkRepository;

    public function __construct(IMerkRepository $merkRepository)
    {
        $this->merkRepository = $merkRepository;
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
}