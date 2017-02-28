<?php

namespace App\Applications\Api\Http\Controllers;

use App\Domains\Users\Repositories\UserRepository;

class UsersController extends BaseController
{

    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->users->getAll(false, null);
    }
}