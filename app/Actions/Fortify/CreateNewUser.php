<?php

namespace App\Actions\Fortify;

use App\Models\Medewerker;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): Medewerker
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:Medewerkers,emailadres'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return Medewerker::create([
            'naam' => $input['name'],
            'rol_id' => 1,
            'emailadres' => $input['email'],
            'wachtwoord' => Hash::make($input['password'], ['algo' => PASSWORD_DEFAULT]),
        ]);
    }
}
