<?php


  namespace App\Http\FormValidation;


  class PictureFormValidation
  {
      public function rules(): array
      {
          return [
              'title' => ['required', 'string', 'max:150', 'min:3'],
              'description' => ['required', 'max:250'],
              'image' => ['required','image']
          ];
      }

      public function messages(): array
      {
          return [
              'title.required' => 'Vous devez spécifiez un titre',
              'description.required' => 'Vous devez spécifiez une description',
              'image.required' => 'Vous devez charger une image',
              'image.image' => "Format de fichier incorect"

          ];
      }

  }
