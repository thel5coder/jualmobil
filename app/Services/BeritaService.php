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
        $slug = $this->generateSlug($input['judul']);
        $param=[
            'judul'=>$input['judul'],
            'slug'=>$slug
        ];

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

    public function showBerita()
    {
        $response = new ServiceResponseDto();

        if(auth()->user()->tipe_user == 'admin')
        {
            $response->setResult($this->beritaRepository->showAll());
        }
        else{
            $response->setResult($this->beritaRepository->showByUser(auth()->user()->id));
        }
        return $response;
    }

    public function read($id)
    {
        $result = $this->readObject($this->beritaRepository,$id)->getResult();

    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();
        if( ! $this->beritaRepository->delete($id) )
        {
            $message = ['gagal menghapus data'];
            $response->addErrorMessage($message);
        }
        return $response;
    }

    public function pagination($param)
    {
        return $this->getPaginationObject($this->beritaRepository,$param);
    }
}