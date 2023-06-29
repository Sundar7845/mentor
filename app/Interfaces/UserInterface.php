<?php

namespace App\Interfaces;

use App\Http\Requests\UserRequest;

interface UserInterface
{
  public function dashboard();

  public function getMentor();

  public function getMentee();

  public function create();

  public function storeUser(UserRequest $request);

  public function edit($id);

  public function requestUser(UserRequest $request, $id);

  public function deleteUser($id);

}