<?php

/**
 * Created by PhpStorm.
 * User: AhmadShobirin
 * Date: 07/06/2017
 * Time: 13:16
 */
namespace App\Repositories\Actions;

use App\Models\JmImagesLM;
use App\Repositories\Contracts\IImagesLmRepository;

class ImagesLmRepository implements IImagesLmRepository
{

    public function create($input)
    {
        $create = new JmImagesLM();
        $create->listing_mobile_id = $input['listingMobilId'];
        $create->images = $input['images'];
        return $create->save();
    }

    public function update($input)
    {
        $update = JmImagesLM::find($input['id']);
        $update->images = $input['images'];
        return $update->save();
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function read($id)
    {
        // TODO: Implement read() method.
    }

    public function showAll()
    {
        // TODO: Implement showAll() method.
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }
}