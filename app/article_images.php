<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_images extends Model
{
    protected $fillable = [
        'article_id',
        'filename'
        ];
    public function article()
    {
        return $this->belongsTo('App\article');
    }
}
