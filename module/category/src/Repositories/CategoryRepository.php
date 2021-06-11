<?php


namespace Category\Repositories;


use Category\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
        return Category::class;
    }

    public function optionCategory($id=0, $level=0,$max=5, $selected,$ids,$type){
        $language = session('lang');
        $category = $this->scopeQuery(function ($e) use($id,$level,$max,$selected,$ids,$language,$type){
           return $e->where('parent',$id)->where('lang_code',$language)->where('type',$type);
        })->all();
        if($category){
            foreach ($category as $row){
                echo "<option value='".$row->id."'";
                if($selected==$row->id){
                    echo " selected=''";
                }
                if($row->id==$ids){
                    echo " disabled=''";
                }
                echo">".str_repeat("<span>&brvbar;---</span>",$level-1).$row->name."</option>";
                if($level<$max){
                    $this->optionCategory($row->id, $level+1,$max=5, $selected,$ids,$type);
                }
            }
        }
    }

    public function getCatFoot(){
        $catFoot = $this->scopeQuery(function($e) {
            return $e->orderBy('sort_order','asc')->where('lang_code',session('lang'))
                ->where('status','active')
                ->where('display',2)
                ->where('type','post')
                ->where('parent',0)
                ->get();
        })->limit(2);
        return $catFoot;
    }

}
