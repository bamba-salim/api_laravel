<?php


    namespace App\Http\FormValidation;


    class LoginFormValidation
    {
        public function rules(): array
        {
            return [
                'password' => ['required', 'string'],
                'email' => ['required', 'email'],

            ];
        }

        public function messages(): array
        {
            return [
                'password.required' => 'Vous devez spécifiez votre mot de passe.',
                'email.required' => 'Vous devez spécifiez votre email'


            ];
        }

    }
