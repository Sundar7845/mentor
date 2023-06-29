<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Interfaces\CategoryInterface;



class CategoriesController extends Controller
{
    protected $CategoryInterface;

    public function __construct(CategoryInterface $CategoryInterface)
    {
        $this->CategoryInterface = $CategoryInterface;
    }
    public function categorizethequestion ()
    {
       return $this->CategoryInterface->categorizethequestion();
    }
}
