<?php


namespace Frontend\Providers;


use Barryvdh\Debugbar\ServiceProvider;
use Base\Supports\Helper;
use Category\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Menu\Models\Menu;
use Menu\Repositories\MenuRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Setting\Repositories\SettingRepositories;

class ModuleProvider extends \Illuminate\Support\ServiceProvider
{
    protected $lang;
    public function boot(MenuRepository $menuRepository, SettingRepositories $settingRepositories, PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views','frontend');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        \view()->composer('frontend::*',function ($views) use($settingRepositories, $postRepository,$categoryRepository){
            //setting all page
            if(!$views->offsetExists('setting')){
                $setting = $settingRepositories->getAllSetting();
                $lang = \session('lang');
                $views->with(['setting'=>$setting,'lang'=>$lang]);
            }
            //page footer
            if(!$views->offsetExists('pageFoot')){
                $pageFoot = $postRepository->getPageFoot();
                $views->with(['pageFoot'=>$pageFoot]);
            }
            //category footer
            if(!$views->offsetExists('catFoot')){
                $catFoot = $categoryRepository->getCatFoot();
                $views->with(['catFoot'=>$catFoot]);
            }
        });
    }

    public function register()
    {
        Helper::loadModuleHelpers(__DIR__);
        $this->app->register(RouteProvider::class);
    }
}
