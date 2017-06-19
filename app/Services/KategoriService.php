<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 18:45
 */

namespace App\Services;


use App\Repositories\Contracts\IKategoriRepository;
use App\Services\Response\ServiceResponseDto;

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

    public function showAllWithPaginate()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->kategoriRepository->showAllWithPaginate());

        return $response;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();
        $slug = $this->generateSlug($input['kategori']);
        $param = [
            'slug_kategori' => $slug,
            'kategori' => $input['kategori']
        ];

        $this->kategoriRepository->create($param);

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();

        $this->kategoriRepository->delete($id);

        return $response;
    }
}