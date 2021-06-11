<?php


namespace Donate\Models;


use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $table = 'donate';
    protected $fillable = ['title','full_name','country','zip_code','phone','address','city','email','amount','donate_for','status'];
}
