<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function dashboard()
    {
        return $this->userInterface->dashboard();
    }

    public function create()
    {
        return $this->userInterface->create();
    }

    public function store(UserRequest $request)
    {
        return $this->userInterface->storeUser($request);
    }

    public function mentor(Request $request)
    {
        return $this->userInterface->getMentor($request);
    }

    public function mentee()
    {
        return $this->userInterface->getMentee();
    }

    public function edit($id)
    {
        return $this->userInterface->edit($id);
    }

    public function update(UserRequest $request, $id)
    {
        return $this->userInterface->requestUser($request, $id);
    }

    public function destroy($id)
    {
        return $this->userInterface->deleteUser($id);
    }
}