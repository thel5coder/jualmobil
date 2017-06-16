<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 18:45
 */

namespace App\Services;


use App\Repositories\Contracts\IKategoriRepository;

class KategoriService extends BaseService
{
    protected $kategoriRepository;

    public function __construct(IKategoriRepository $kategoriRepository)
    {
        $this->kategoriRepository = $kategoriRepository;
    }

    public function showAll()
    {
        return $this->getAllObject($this->kategoriRepository);
    }
}