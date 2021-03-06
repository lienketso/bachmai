<?php


namespace Acl\Models;


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['name','display_name','description','module'];

    public function roles(){
        return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }

}
