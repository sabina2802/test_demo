<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    

     protected $table =	'website';

     protected $fillable = [
        'websiteId',
        'date',
        'chats',
        'missedChats',
    ];

    public function createData($data)
    {
    	return static::create(array_only($data,$this->fillable));
    } 

    public function getdata()
    {
    	return static::count();
    }

    public function findata()
    {
    	return static::get();
    }  
}
