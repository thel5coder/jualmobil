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
        $param = [
            'user_id' => auth()->user()->id,
            'judul' => $input['judul'],
            'slug' => $slug,
            'deskripsiSingkat' => $input['deskripsiSingkat'],
            'deskripsi' => $input['deskripsi'],
            'images' => $input['images'],
            'status' => $input['moderasi']
        ];

        if (!$this->beritaRepository->create($param)) {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function update($input)
    {
        $response = new ServiceResponseDto();

        if (!$this->beritaRepository->update($input)) {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function showBerita()
    {
        $response = new ServiceResponseDto();

        if (auth()->user()->tipe_user == 'admin') {
            $response->setResult($this->beritaRepository->showAll());
        } else {
            $response->setResult($this->beritaRepository->showByUser(auth()->user()->id));
        }
        return $response;
    }

    public function read($slug)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->read($slug));

        return $response;
    }

    public function relatedPostBeritaByUser($userId)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->relatedPostBeritaByUser($userId));

        return $response;
    }

    public function otherBerita()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->otherBerita());

        return $response;
    }

    public function delete($id)
    {
        $response = new ServiceResponseDto();
        if (!$this->beritaRepository->delete($id)) {
            $message = ['gagal menghapus data'];
            $response->addErrorMessage($message);
        }
        return $response;
    }

    public function pagination($param)
    {
        return $this->getPaginationObject($this->beritaRepository, $param);
    }

    public function setStatusBerita($input)
    {
        $response = new ServiceResponseDto();
        $param = [
            'id' => $input['id'],
            'alasan' => (isset($input['alasan'])) ? $input['alasan'] : '',
            'status' => $input['status']
        ];
        $response->setResult($this->beritaRepository->setStatusBerita($param));
        return $response;
    }
}