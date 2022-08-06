<?php


namespace Modules\User\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\User\Contracts\UserRepository as UserRepositoryInterface;
use Modules\User\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $table = 'users';

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function insert(array $userDetails): bool
    {
        $sql = "INSERT INTO {$this->table}
                (
                first_name,
                last_name,
                email, avatar
                )
                VALUES (?, ?, ?, ?)";

        return \DB::insert($sql, [
                $userDetails['first_name'],
                $userDetails['last_name'],
                $userDetails['email'],
                $userDetails['avatar']
            ]
        );
    }

    public function create(array $userDetails): User
    {
        return $this->user->create($userDetails);
    }

    public function paginate(int $perPage = null): LengthAwarePaginator
    {
        return $this->user->paginate($perPage);
    }

    public function search(string $query): LengthAwarePaginator
    {
        return $this->user->where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(10);
    }
}
