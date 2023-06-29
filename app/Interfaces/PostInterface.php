<?php

namespace App\Interfaces;

use App\Http\Requests\PostRequest;

interface PostInterface
{

    public function requestPost(PostRequest $request);

}