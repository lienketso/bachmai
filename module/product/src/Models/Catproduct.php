<?php


namespace Product\Models;


use Illuminate\Database\Eloquent\Model;

class Catproduct extends Model
{
    protected $table='catproduct';
    protected $fillable = ['name','slug','parent','thumnail','meta_title','meta_desc','sort_order','status','lang_code'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

}
