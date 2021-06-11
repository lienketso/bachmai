<?php


namespace Diseases\Providers;


use Diseases\Hook\DiseasesHook;
use Illuminate\Support\ServiceProvider;

class HookProvider extends ServiceProvider
{
    public function boot(){
        $this->app->booted(function (){
            $this->booted();
        });
    }
    public function register()
    {
        parent::register(); // TODO: Change the autogenerated stub
    }
    public function booted(){
        add_action('wadmin-register-menu',[DiseasesHook::class,'handle'],12);
    }
}
