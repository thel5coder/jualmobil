<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 14/06/2017
 * Time: 19:01
 */

namespace App\Services;


use App\Repositories\Contracts\IKomentarRepository;
use App\Services\Response\ServiceResponseDto;

class KomentarService extends BaseService
{
    protected $komentarRepository;

    public function __construct(IKomentarRepository $komentarRepository)
    {
        $this->komentarRepository = $komentarRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();

        $param = [
          'userId' => auth()->user()->id,
            'beritaId' => $input['beritaId'],
            'komentar' => $input['komentar']
        ];
        $response->getResult($this->komentarRepository->create($param));

        return $response;
    }

    public function update($input)
    {
        $response = new ServiceResponseDto();

        $param = [
            'userId' => auth()->user()->id,
            'beritaId' => $input['beritaId'],
            'komentar' => $input['komentar']
        ];

        $response->setResult($this->komentarRepository->update($param));

        return $response;
    }

    public function read($id)
    {
        $response = new ServiceResponseDto();
        $response->setResult($this->komentarRepository->read($id));
        return $response;
    }
}