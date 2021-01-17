<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

        public function user(): BelongsTo
        {
            return $this->belongsTo('App\Models\User');
        }

        public function likes(): BelongsTo
        {
            return $this->belongsTo('App\User');
        }
    }
