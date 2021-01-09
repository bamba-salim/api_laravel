<?php


  namespace App\Http\FormValidation;


  class LoginFormValidation
  {
      public function rules()
      {
          return [
              'email' => ['required','string', 'email'],
              'password' => ['required','string']
          ];
      }

      public function messages()
      {
          return [
              'email.required' => 'Vous devez spécifiez votre email',
              'password.required' => 'Vous devez spécifiez votre mot de passe.',

          ];
      }

  }
