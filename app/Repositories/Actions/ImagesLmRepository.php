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
        $create->listing_mobile_id = $input['listing_mobile_id'];
        $create->images = $input['image'];
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
        return JmImagesLM::where('listing_mobile_id','=',$id)->delete();
    }

    public function read($id)
    {
        return JmImagesLM::where('listing_mobile_id','=',$id)->orderBy('listing_mobile_id','asc')->get();
    }

    public function showAll()
    {
       return JmImagesLM::all();
    }

    public function paginationData(\App\Repositories\Contracts\Pagination\PaginationParam $param)
    {
        // TODO: Implement paginationData() method.
    }

    public function showImagesByListingId($listingID)
    {
        return JmImagesLM::where('listing_mobile_id','=',$listingID)->orderBy('listing_mobile_id','asc')->get();
    }


}