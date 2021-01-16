<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Picture extends Model
    {
        protected $fillable = [
            'title',
            'description',
            'image',
            'user_id'
        ];

        protected $with = [
          'user'
        ];

        protected $hidden = [
            'user_id'
        ];

        public function user() {
            return $this->belongsTo('App\Models\User');
        }
    }
