<div class="col-lg-4 sidebar-area">
    <div class="single_widget search_widget">
        <div id="imaginary_container">
            <form action="{{route('search')}}" method="get">
            <div class="input-group stylish-input-group">
                <input
                    type="text" name="search"
                    class="form-control"
                    placeholder="Search"/>
                <span class="input-group-addon">
                      <button type="submit">
                        <span class="lnr lnr-magnifier"></span>
                      </button>
                    </span>
            </div>
            </form>
        </div>
    </div>

    <div class="single_widget cat_widget">
        <h4 class="text-uppercase pb-20">post categories</h4>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{route('categoryPost', $category->slug)}}">{{$category->name}} <span>{{$category->post->count()}}</span></a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="single_widget recent_widget">
        <h4 class="text-uppercase pb-20">Recent Posts</h4>
        <div class="active-recent-carusel">
            @foreach($recentPosts as $recentPost)
                <div class="item">
                    <img src="{{asset('storage/post/'. $recentPost->image)}}" width="200px" alt="" />
                    <a class="mt-20 title text-uppercase" href="{{route('singlepost', $recentPost->slug)}}">
                        {{$recentPost->title}}
                    </a>
                    <p>
                        {{$recentPost->created_at->diffForHumans()}}
                        <span>
                        <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                        <i class="fa fa-comment-o" aria-hidden="true"></i
                        >02</span
                        >
                    </p>
                </div>
            @endforeach

        </div>
    </div>
    <div class="single_widget tag_widget">
        <h4 class="text-uppercase pb-20">Tag Clouds</h4>
        <ul>
            @foreach($recenttags->unique('name')->take(10) as $recenttag)
                <li><a href="{{route('tagPost',$recenttag->name)}}">{{$recenttag->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
