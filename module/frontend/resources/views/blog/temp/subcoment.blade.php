@foreach($childs as $child)
<div class="comment_rep">
    <h5>{{$child->guest_name}}</h5>
    <p>{{stringDate($child->created_at)}} lúc {{showtime($child->created_at)}}</p>
    <div class="content_comment">
        {{$child->content}}
    </div>
</div>
    @endforeach
