<?php


namespace Post\Models;


use Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Users\Models\Users;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['name','first_name','slug','category','description','content','thumbnail','meta_desc','meta_title','meta_keyword','display','count_view','tags','user_post'
    ,'user_edit','status','post_type','lang_code'];


    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }

    public function getUserPost(){
        return $this->belongsTo(Users::class,'user_post','id');
    }

    public function getUserEdit(){
        return $this->belongsTo(Users::class,'user_edit','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category','id');
    }
    public function getCategoySlug(){
        $cat = $this->category()->first();
        if (!empty($cat)) {
            return $cat->slug;
        } else {
            echo '';
        }
    }
    public function getCategory()
    {
        $cat = $this->category()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn danh mục</span>';
        }
    }

}
