<?php
/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 14/06/2017
 * Time: 18:51
 */

namespace App\Repositories\Actions;


use App\Models\JmKomentar;
use App\Repositories\Contracts\IKomentarRepository;
use App\Repositories\Contracts\Pagination\PaginationParam;

class KomentarRepository implements IKomentarRepository
{

    public function create($input)
    {
        $create =  new JmKomentar();
        $create->user_id = $input['userId'];
        $create->berita_id = $input['beritaId'];
        $create->komentar = $input['komentar'];
        return $create->save();
    }

    public function update($input)
    {
        $update = JmKomentar::find($input['id']);
        $update->user_id = $input['userId'];
        $update->berita_id = $input['beritaId'];
        $update->komentar = $input['berita'];
        return $update->save();
    }

    public function delete($id)
    {
        return JmKomentar::find($id)->delete();
    }

    public function read($id)
    {
        return JmKomentar::join('users','users.id','=','jm_komentar.user_id')
            ->select('jm_komentar.komentar','jm_komentar.created_at','users.name','users.image')
            ->where('jm_komentar.berita_id','=',$id)
            ->get();
    }

    public function showAll()
    {
        return false;
    }

    public function paginationData(PaginationParam $param)
    {
        return false;
    }
}