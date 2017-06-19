<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 12/06/2017
 * Time: 8:10
 */

namespace App\Repositories\Contracts;


interface IBeritaRepository extends IBaseRepository
{
    public function addView($id);
    public function searchBerita($search);
    public function showByUser($userId);
    public function relatedPostBeritaByUser($userId);
    public function otherBerita();
    public function setStatusBerita($input);
    public function showToBanner();
    public function showPopularBerita();
    public function GetUserPost($userId);
    public function showBySlugKategori($slug);
    public function showBeritaByKategori($kategori);
    public function showBeritaToHome();
}