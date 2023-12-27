<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthService
{

    /**
     * Create new account based the given data
     * @param array $data <int, string>
     * @return array <string, string>
     */
    public function createAccount(array $data = []): array
    {
        if (empty($data)) return ['status' => false, 'message' => 'Data is empty.'];
        if ($this->emailIsExists($data['email'])) return ['status' => false, 'message' => 'Email has been taken.'];

        try {
            $user = new User();
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);

            $user->save();
            return [
                'status' => true,
                'data' => $user,
            ];
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [
                'status' => false,
                'message' => 'Failed to create account. Please try again later.',
            ];
        }
    }

    /**
     * To check whether email is already used
     * @param string|null $email
     * @return bool
     */
    public function emailIsExists(?string $email): bool
    {
        $parameterNotValid = is_null($email) || strlen($email) === 0;
        if ($parameterNotValid) return false;

        return User::query()->where('email', $email)->exists();
    }
}
