<?php


namespace Modules\User\Contracts;


interface UserRepository
{
    public function paginate(int $perPage = null);
    public function insert(array $userDetails);
    public function create(array $userDetails);

}
