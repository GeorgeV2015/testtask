<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'guestbook';

    protected $fillable = ['text', 'name', 'email'];

    public function edit($text)
    {
        $this->text = $text;
        $this->save();
    }
}
