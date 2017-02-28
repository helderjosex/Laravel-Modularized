<?php

namespace App\Domains\Users\Repositories;

use App\Domains\Users\User;

class UserRepository
{

    /**
     * @param bool $paginate
     * @param int $take
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($paginate = false, $take = 15)
    {
        $query = User::query();
        $query->orderBy('name');

        if($paginate) {
            return $query->paginate($take);
        }

        if(is_int($take)){
            $query->take($take);
        }

        return $query->get();
    }
}