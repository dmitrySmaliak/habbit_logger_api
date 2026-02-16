<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Lorisleiva\Actions\Concerns\AsAction;

class ResolveSocialUserAction
{
    use AsAction;

    /**
     * @param array<string, mixed> $attributes
     */
    public function handle(string $provider, string $token, array $attributes = []): User
    {
        /** @var AbstractProvider $driver */
        $driver = Socialite::driver($provider);
        $socialUser = $driver->stateless()->userFromToken($token);

        return $this->findOrCreateUser($provider, $socialUser, $attributes);
    }

    /**
     * @param array<string, mixed> $attributes
     */
    private function findOrCreateUser(string $provider, SocialiteUser $socialUser, array $attributes): User
    {
        $socialId = (string) $socialUser->getId();
        if ('' === $socialId) {
            throw ValidationException::withMessages([
                'token' => ['Social token is invalid.'],
            ]);
        }

        $user = User::query()
            ->where('social_provider', $provider)
            ->where('social_id', $socialId)
            ->first();

        if ($user instanceof User) {
            return $user;
        }

        $email = $socialUser->getEmail() ?? ($attributes['email'] ?? null);
        if (!is_string($email) || '' === $email) {
            throw ValidationException::withMessages([
                'email' => ['Email is required for first social login.'],
            ]);
        }

        $user = User::query()->where('email', $email)->first();
        if ($user instanceof User) {
            $user->forceFill([
                'social_provider' => $provider,
                'social_id' => $socialId,
            ])->save();

            return $user;
        }

        $name = $socialUser->getName() ?? ($attributes['name'] ?? null);
        $gender = $attributes['gender'] ?? null;
        $birthDate = $attributes['birth_date'] ?? null;

        $errors = [];
        if (!is_string($name) || '' === $name) {
            $errors['name'] = ['Name is required for first social login.'];
        }
        if (!is_string($gender) || '' === $gender) {
            $errors['gender'] = ['Gender is required for first social login.'];
        }
        if (!is_string($birthDate) || '' === $birthDate) {
            $errors['birth_date'] = ['Birth date is required for first social login.'];
        }

        if ([] !== $errors) {
            throw ValidationException::withMessages($errors);
        }

        return User::create([
            'name' => $name,
            'gender' => $gender,
            'birth_date' => $birthDate,
            'hobby' => $attributes['hobby'] ?? null,
            'email' => $email,
            'social_provider' => $provider,
            'social_id' => $socialId,
            'email_verified_at' => now(),
            'password' => Str::password(32),
        ]);
    }
}
