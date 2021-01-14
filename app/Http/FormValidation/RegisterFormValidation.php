<?php


  namespace App\Http\FormValidation;


  class RegisterFormValidation
  {
      public function rules(): array
      {
          return [
              'name' => ['required', 'string', 'max:50', 'min:3'],
              'email' => ['required', 'string', 'email', 'max:150', 'min:3','unique:users'],
              'password' => ['required','string','min:8'],
              'confirm_password' => ['required', 'same:password']
          ];
      }

      public function messages(): array
      {
          return [
              'name.required' => 'Vous devez spécifiez votre nom',
              'email.required' => 'Vous devez spécifiez votre email',
              'email.unique' => 'Cet email est déjà utilisé',
              'password.min' => 'Votre mot de passe doit faire au minimum 8 caractères',
              'confirm_password.same' => 'Vos mots de passes doivent être identique'

          ];
      }
  }
