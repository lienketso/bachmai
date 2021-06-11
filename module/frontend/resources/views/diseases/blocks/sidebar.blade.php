<div class="adver_desi">
    <a href="#"><img src="{{public_url('frontend/assets/img/ad_1.jpg')}}" alt=""></a>
</div>
@if(!empty($catSidebar))
<div class="right_desi">
    <div class="nc_desi">
        <h4>{{$catSidebar->name}}</h4>
        <p>{{$catSidebar->description}}</p>
        <div class="list_nc_desi">
            <ul>
                @foreach($catSidebar->post as $p)
                    <li><a href="{{route('frontend::post.detail.get',$p->slug)}}">{{$p->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
