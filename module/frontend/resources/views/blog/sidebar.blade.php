 <div class="sidebar_list">
                    @if($categoryChild && count($categoryChild)>0)
                       <div class="cat_sidebar">
                           <h3 class="title_sidebar">{{trans('frontend.category')}}</h3>
                           <ul>
                               @foreach($categoryChild as $d)
                                <li><a href="{{route('frontend::blog.index.get',$d->slug)}}">{{$d->name}}</a></li>
                               @endforeach
                           </ul>
                       </div>
                        @endif

                    @if($popularPost)
                       <div class="latest_sidebar">
                           <h3 class="title_sidebar">{{trans('frontend.popular_post')}}</h3>
                           @foreach($popularPost as $d)
                           <div class="list_po_sidebar">
                               <div class="img_po_sidebar">
                                   <a href="{{route('frontend::post.detail.get',$d->slug)}}">
                                       <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$d->name}}">
                                   </a>
                               </div>
                               <div class="title_po_sidebar">
                                    <p class="date_po_sibar"><i class="fa fa-clock-o"></i> {{stringDate($d->created_at)}}</p>
                                   <h4><a href="{{route('frontend::post.detail.get',$d->slug)}}">{{$d->name}}</a></h4>
                               </div>
                           </div>
                           @endforeach
                       </div>
                    @endif

 </div>
