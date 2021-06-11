<?php


namespace Frontend\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Barryvdh\Debugbar\LaravelDebugbar;
use Category\Repositories\CategoryRepository;
use Comment\Http\Requests\CommentCreateRequest;
use Comment\Repositories\CommentRepository;
use Company\Repositories\CompanyRepository;
use Contact\Http\Requests\ContactCreateRequest;
use Contact\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Media\Repositories\MediaRepository;
use Newsletter\Repositories\NewsletterRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Transaction\Http\Requests\TransactionCreateRequest;
use Transaction\Models\Transaction;
use Transaction\Repositories\TransactionRepository;

class HomeController extends BaseController
{
    protected $com;
    protected $lang;
    protected $cat;
    public function __construct(CompanyRepository $companyRepository,CategoryRepository $categoryRepository)
    {
        $this->lang = session('lang');
        $this->com = $companyRepository;
        $this->cat = $categoryRepository;
    }

    private $langActive = ['vn','en'];
    public function changeLang(Request $request, $lang){
        if(in_array($lang,$this->langActive)){
            $request->session()->put(['lang'=>$lang]);
            return redirect()->back();
        }
    }
    function getIndex(PostRepository $postRepository, MediaRepository $mediaRepository){

        $hotBlog = $postRepository->scopeQuery(function ($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('post_type','blog')
                ->where('display',2)
                ->where('lang_code',$this->lang);
        })->limit(2);

        $homeBlog = $postRepository->scopeQuery(function($e){
           return $e->orderBy('created_at','desc')->where('status',1)
               ->where('lang_code',$this->lang)
               ->where('post_type','blog')
               ->where('display',1)
               ->get();
        })->limit(5);

        $allTopic = $this->cat
            ->orderBy('sort_order','asc')
            ->findWhere(['status'=>1,'type'=>'health','lang_code'=>$this->lang])
            ->all();
        //danh sách các viện, khoa
        $hospitalHome = $this->cat->scopeQuery(function($e){
            return $e->orderBy('sort_order','asc')->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('type','hospital')
                ->get(['name','slug']);
        })->limit(9);
        //video clips home
        $videoHot = $postRepository->findWhere(['post_type'=>'video','display'=>2,'lang_code'=>$this->lang])->first();
        $videoHome = $postRepository->scopeQuery(function ($e) {
            return $e->orderBy('created_at','desc')
                ->where('lang_code',$this->lang)
                ->where('status','active')
                ->where('post_type','video')
                ->where('display',1);
        })->limit(5);
        //pageHome
        $pageAbout = $postRepository->findWhere(['lang_code'=>$this->lang,'status'=>'active','display'=>2,'post_type'=>'page'])->first();
        //logo footer
        $logoFooter = $mediaRepository->orderBy('sort_order','asc')
            ->findWhere(['status'=>'active','lang_code'=>$this->lang,'table'=>'adver'])->all();

        return view('frontend::home.index',[
            'hotBlog'=>$hotBlog,
            'homeBlog'=>$homeBlog,
            'allTopic'=>$allTopic,
            'hospitalHome'=>$hospitalHome,
            'videoHot'=>$videoHot,
            'videoHome'=>$videoHome,
            'pageAbout'=>$pageAbout,
            'logoFooter'=>$logoFooter
        ]);
    }

    public function contact(){
        return view('frontend::contact.contact');
    }
    public function postContact(ContactCreateRequest $request, ContactRepository $contactRepository){
            $input = $request->except(['_token']);
            $contactRepository->create($input);
            return view('frontend::contact.success',['data'=>$input]);
    }

    public function createNewletter(Request $request, NewsletterRepository $newsletterRepository){
        $email = $request->get('email');
        $input = ['email'=>$email];
        $newsletterRepository->create($input);
        echo 'Subscribe successful !';
    }

    public function createPartner(TransactionCreateRequest $request, TransactionRepository $transactionRepository){
        $input = $request->except(['_token']);
        try{
            $create = $transactionRepository->create($input);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    //ajax create comment post
    public function createComment(CommentRepository $commentRepository, CommentCreateRequest $request){
        $input = $request->except(['_token']);
        try{
            $create = $commentRepository->create($input);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

}
