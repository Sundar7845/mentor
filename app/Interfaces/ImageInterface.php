<?php 

namespace App\Interfaces;

interface ImageInterface
{
    public function displayImage($id);

    public function companyLogo($id);

    public function ProfileLogo($id);

    public function mediafile($id);
}