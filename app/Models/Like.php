<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Like extends Model
    {

        protected $table = 'picture_user';
        protected $fillable = [
            'user_id',
            'picture_id'
        ];

        protected $hidden = [

        ];

        public function pictures(): HasMany
        {
            return $this->hasMany('App\Picture');
        }

        public function liked(): BelongsTo
        {
            return $this->belongsTo('App\Picture');
        }
    }
