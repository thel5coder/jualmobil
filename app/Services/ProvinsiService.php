<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 09/06/2017
 * Time: 22:04
 */

namespace App\Services;


use App\Repositories\Contracts\IProvinsiRepository;
use App\Services\Response\ServiceResponseDto;

class ProvinsiService extends BaseService
{
    protected $provinsiRepository;

    public function __construct(IProvinsiRepository $provinsiRepository)
    {
        $this->provinsiRepository = $provinsiRepository;
    }

    public function ShowAll()
    {
        return $this->getAllObject($this->provinsiRepository);
    }
}