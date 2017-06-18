<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 16/06/2017
 * Time: 19:24
 */

namespace App\Repositories\Contracts;


interface IGrupKategoriBeritaRepository extends IBaseRepository
{
    public function showGrupKategoriBerita($beritaId);
    public function showByKategoriSlug($slug);
}