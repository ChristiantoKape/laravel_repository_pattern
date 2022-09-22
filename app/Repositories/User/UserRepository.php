<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\User\UserInterface as UserInterface;

class UserRepository implements UserInterface
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findByid($id)
    {
        return $this->user->find($id);
    }

    public function getAllPagination($page)
    {
        return $this->user->paginate($page);
    }

    public function store(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'email_verified_at' => '2022-09-22 15:04:56',
        ]);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);

        return $user->update([
            'name' => isset($data['name']) ? $data['name'] : $user->name,
            'email' => isset($data['email']) ? $data['email'] : $user->email,
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);
    }

    public function delete($id)
    {
        return User::destroy($id);
    }
}
