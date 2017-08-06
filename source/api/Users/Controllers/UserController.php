<?php

namespace Api\Users\Controllers;

use Illuminate\Http\Request;
use Infrastructure\Http\Controller;
use Api\Users\Requests\CreateUserRequest;
use Api\Users\Requests\LoginUserRequest;
use Api\Users\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAll()
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->userService->getAll($resourceOptions);
        // $parsedData = $this->parseData($data, $resourceOptions, 'users');
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function getById($userId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $data = $this->userService->getById($userId, $resourceOptions);
        // $parsedData = $this->parseData($data, $resourceOptions, 'user');
        $parsedData = $this->parseData($data, $resourceOptions);

        return $this->response($parsedData);
    }

    public function create(CreateUserRequest $request)
    {
        return $this->response($this->userService->create($request->all()), 201);
    }

    public function update($userId, Request $request)
    {
        return $this->response($this->userService->update($userId, $request->all()));
    }

    public function delete($userId)
    {
        return $this->response($this->userService->delete($userId));
    }

    public function login(LoginUserRequest $request)
    {
        return $this->response($this->userService->login($request->all()));
    }

    public function getSideBar($appId, $rolId)
    { 
        return $this->response($this->userService->getSideBar($appId, $rolId));
    }
}
