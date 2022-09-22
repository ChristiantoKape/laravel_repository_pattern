<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\User\UserInterface;

class UserContoller extends Controller
{
    private $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return $user = $this->userRepository->getAllPagination(10);
    }

    public function find($id)
    {
        return $user = $this->userRepository->findByid($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = $this->userRepository->store($request->all());

        return ResponseFormatter::success($user, 'User created');
    }

    public function update($id, Request $request)
    {
        $user = $this->userRepository->update($id, $request->all());

        // find user
        $user = $this->userRepository->findByid($id);

        return ResponseFormatter::success($user, 'User updated');
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return ResponseFormatter::success(null, 'User deleted');
    }
}
