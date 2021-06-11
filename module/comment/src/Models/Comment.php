<?php


namespace Comment\Models;


use Illuminate\Database\Eloquent\Model;
use Post\Models\Post;


class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['parent','post_id','post_type','content','guest_name','guest_mail','lang_code','status'];

    public function childs() {
        return $this->hasMany(Comment::class,'parent','id')
            ->where('status','active')->limit(6);
    }

    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function getPostName(){
        $cat = $this->post()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo '';
        }
    }


}
