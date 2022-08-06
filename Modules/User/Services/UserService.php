<?php


namespace Modules\User\Services;

use Modules\User\Contracts\UserRepository as UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function insert(array $userDetails): bool
    {
        return $this->userRepository->insert($userDetails);
    }

    public function create(array $userDetails): bool
    {
        return $this->userRepository->create($userDetails);
    }

    public function paginate($perPage = null)
    {
        return $this->userRepository->paginate($perPage);
    }

    public function search(string $query)
    {
        return $this->userRepository->search($query);
    }

    public function register(array $data): array
    {
        $data['password'] = bcrypt($data['password']);

        $user = $this->userRepository->create($data);

        $accessToken = $user->createToken('authToken')->accessToken;

        return ['user' => $user, 'access_token' => $accessToken];
    }

    public function login(array $data): array
    {
        if (!auth()->attempt($data)) {
            return ['message' => 'Invalid Credentials'];
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return ['user' => auth()->user(), 'access_token' => $accessToken];
    }

}
