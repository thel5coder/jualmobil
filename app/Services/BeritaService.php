<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:39
 */

namespace App\Services;


use App\Events\NewBeritaPost;
use App\Events\ResultModerationBerita;
use App\Repositories\Contracts\IBeritaRepository;
use App\Repositories\Contracts\IGrupKategoriBeritaRepository;
use App\Services\Response\ServiceResponseDto;
use Illuminate\Support\Facades\Event;

class BeritaService extends BaseService
{
    protected $beritaRepository, $grupKategoriBeritaRepository;

    public function __construct(IBeritaRepository $beritaRepository, IGrupKategoriBeritaRepository $grupKategoriBeritaRepository)
    {
        $this->beritaRepository = $beritaRepository;
        $this->grupKategoriBeritaRepository = $grupKategoriBeritaRepository;
    }

    public function create($input)
    {
        $response = new ServiceResponseDto();

        $slug = $this->generateSlug($input['judul']);
        $param = [
            'userId' => auth()->user()->id,
            'judul' => $input['judul'],
            'slug' => $slug,
            'deskripsiSingkat' => $input['deskripsiSingkat'],
            'deskripsi' => $input['deskripsi'],
            'images' => $input['images'],
            'status' => $input['status']
        ];
        $idBerita = $this->beritaRepository->create($param);
        if ($idBerita) {

            for ($i = 0; $i < count($input['kategori']); $i++) {
                $param = [
                    'beritaId' => $idBerita,
                    'kategoriId' => $input['kategori'][$i]
                ];
                $this->grupKategoriBeritaRepository->create($param);
            }
            Event::fire(new NewBeritaPost(auth()->user()->email, auth()->user()->name, $slug));
        } else {
            $message = ['gagal menambah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function update($input)
    {
        $response = new ServiceResponseDto();

        $slug = $this->generateSlug($input['judul']);
        $param = [
            'id' => $input['id'],
            'judul' => $input['judul'],
            'slug' => $slug,
            'deskripsiSingkat' => $input['deskripsiSingkat'],
            'deskripsi' => $input['deskripsi'],
            'images' => $input['images']
        ];

        if ($this->beritaRepository->update($param)) {
            for ($i = 0; $i < count($input['kategori']); $i++) {
                $param = [
                    'beritaId' => $input['id'],
                    'kategoriId' => $input['kategori'][$i]
                ];
                $this->grupKategoriBeritaRepository->create($param);
            }
        }
        else
        {
            $message = ['gagal merubah data'];
            $response->addErrorMessage($message);
        }

        return $response;
    }

    public function showAllBerita()
    {
        $response = new ServiceResponseDto();

        $berita = $this->beritaRepository->showAll();
        $datakategori = array();
        foreach ($berita as $dataBerita) {
            $datakategori[$dataBerita->id] = $this->grupKategoriBeritaRepository->showGrupKategoriBerita($dataBerita->id);
        }
        $result = [
            'berita' => $berita,
            'kategori' => $datakategori
        ];

        $response->setResult($result);

        return $response;
    }

    public function showAllBySlugKategori($slug){
        $response = new ServiceResponseDto();

        $berita = $this->beritaRepository->showBySlugKategori($slug);
        $datakategori = array();
        foreach ($berita as $dataBerita) {
            $datakategori[$dataBerita->id] = $this->grupKategoriBeritaRepository->showGrupKategoriBerita($dataBerita->id);
        }
        $result = [
            'berita' => $berita,
            'kategori' => $datakategori
        ];

        $response->setResult($result);

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

        $berita = $this->beritaRepository->read($slug);
        $datakategori = $this->grupKategoriBeritaRepository->showGrupKategoriBerita($berita->id);
        $result = [
            'berita' => $berita,
            'kategori' => $datakategori
        ];
        $response->setResult($result);

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
        if ($this->deleteObject($this->beritaRepository,$id)->isSuccess()) {
            if ( ! $this->deleteObject($this->grupKategoriBeritaRepository,$id)->isSuccess())
            {
                $message = ['gagal mengahpus grup kategori iklan'];
                $response->addErrorMessage($message);
            }
        }
        else{
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
        $alasan = (isset($input['alasan'])) ? $input['alasan'] : '';
        $param = [
            'id' => $input['id'],
            'alasan' => $alasan,
            'status' => $input['status']
        ];
        $response->setResult($this->beritaRepository->setStatusBerita($param));
        Event::fire(new  ResultModerationBerita($input['slug'], $input['name'], $input['email'], $alasan));
        return $response;
    }

    public function showToBanner()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->showToBanner());

        return $response;
    }

    public function showPopularBerita()
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->showPopularBerita());

        return $response;
    }

    public function showBeritaByKategori($kategori)
    {
        $response = new ServiceResponseDto();

        $response->setResult($this->beritaRepository->showBeritaByKategori($kategori));

        return $response;
    }
}