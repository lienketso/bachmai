<?php


namespace Document\Models;


use Category\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    protected $fillable = ['name','category','file_download','file_name','count_view','meta_title','meta_desc','status','lang_code'];

    public function category(){
        return $this->belongsTo(Category::class,'category','id');
    }

    public function getCatName(){
        $cat = $this->category()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo 'Null';
        }

    }

}
