<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'fileImage',
        'title'
        
    ];

        public static function valid() {
            return array(
                'title' => 'required'
                );
            }

        public function article() {
            return $this->belongsTo('App\Article', 'title');
        }
}
