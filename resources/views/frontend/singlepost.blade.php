@extends('layouts.frontend.app')
@section('content')
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">All Post of Category 1</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a
                            ><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li>
                            <a href="category.html"></a
                            ><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li><a href="single.html">Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->

    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <div class="single-page-post">
                            <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="" />
                            <div class="top-wrapper">
                                <div class="row d-flex justify-content-between">
                                    <h2 class="col-lg-8 col-md-12 text-uppercase">
                                        {{$post->title}}

                                    </h2>
                                    <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                        <div class="desc">
                                            <h2>{{$post->user->name}}</h2>
                                            <h3>{{$post->created_at->diffForHumans()}}</h3>
                                        </div>
                                        <div class="user-img">
                                            <img src="{{asset('storage/user/'.$post->user->image)}}" width="60" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tags">
                                <ul>
                                    @foreach($post->tag as $tag)
                                    <li><a href="#">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-post-content">
                                    <p>
                                        {!! $post->body !!}
                                    </p>
                            </div>
                            <div class="bottom-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        @guest
                                            <i class="fa fa-heart" aria-hidden="true">
                                                lily and 4 people like this</i>
                                                @else
                                                    <a href="#" onclick="document.getElementById('like-{{$post->id}}').submit();" ><i class="fa fa-heart" aria-hidden="true" style="color:{{Auth::user()->postLike()->where('post_id', $post->id)->count()> 0 ? 'red': ' '}}"></i></a> {{$post->userLike->count()}} people like this
                                                    <form action="{{route('PostLike',$post->id)}}" method="POST" style="display: none" id="like-{{$post->id}}">
                                                        @csrf
                                                    </form>
                                        @endguest
                                    </div>
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <i class="fa fa-comment-o" aria-hidden="true"></i> {{$post->message->count()}}
                                        comments
                                    </div>
                                    <div class="col-lg-4 single-b-wrap col-md-12">
                                        <i class="fa fa-eye" aria-hidden="true"></i> {{$post->view_count}}
                                        views
                                    </div>
                                    <div class="row mx-1">
                                        <div class="col-lg-6 single-b-wrap col-md-12 pt-4">
                                            <h5>Share it on your social media account.</h5>
                                        </div>
                                        <div class="col-lg-6 single-b-wrap col-md-12 mt-3" id="social-links">
                                            <ul class="social-icons">
                                                <li>
                                                    <a href="#" id="gmail-btn"
                                                    ><i class="fa fa-envelope-o" aria-hidden="true" style="color: #cf3e39; font-size: 2rem"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" id="facebook-btn"
                                                    ><i class="fa fa-facebook-square" aria-hidden="true" style="color: #3b5998; font-size: 2rem"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" id="gplus-btn"
                                                    ><i class="fa fa-google-plus-square" aria-hidden="true" style="color: #dd4b39; font-size: 2rem"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" id="twitter-btn"
                                                    ><i class="fa fa-twitter-square" aria-hidden="true" style="color: #1da1f2; font-size: 2rem"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" id="linkedin-btn"
                                                    ><i class="fa fa-linkedin-square" aria-hidden="true" style="color: #0077b5; font-size: 2rem"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" id="whatsapp-btn"
                                                    ><i class="fa fa-whatsapp" aria-hidden="true" style="color: #25d366; font-size: 2rem"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 single-b-wrap col-md-12 mt-3">
                                            <button class="btn btn-primary" id="shareBtn" style="display: none"><i class="fa fa fa-share text-white" aria-hidden="true"></i> Share</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section class="comment-sec-area pt-80 pb-80">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h5 class="text-uppercase pb-80">05 Comments</h5>
                                        <br />
                                        <!-- Frist Comment -->
                                        <div class="comment">
                                            @foreach($post->message as $comment)
                                            <div class="comment-list">
                                                <div
                                                    class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="{{asset('storage/user/'.$comment->user->image)}}" width="30px" alt="" />
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">{{$comment->user->name}}</a></h5>
                                                            <p class="date">{{date('D, d M Y H:i')}}</p>
                                                            <p class="comment">
                                                               {{$comment->message}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class=""><button class="btn-reply text-uppercase" id="reply-btn"
                                                                onclick="showReplyForm('{{$comment->id}}','{{$comment->user->name}}')">reply</button>
                                                    </div>

                                                </div>
                                            </div>

                                            @if($comment->replycomment->count() > 0)
                                                @foreach($comment->replycomment as $reply)
                                                        <div class="comment-list left-padding">
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb">
                                                                        <img src="{{asset('storage/user/'.$reply->user->image)}}" width="40" alt="" />
                                                                    </div>
                                                                    <div class="desc">
                                                                        <h5><a href="#">{{$reply->user->name}}</a></h5>
                                                                        <p class="date">{{date('D, d M Y H:i')}}</p>
                                                                        <p class="comment">
                                                                            {{$reply->replycomment}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                    <div class="">
                                                                        <button class="btn-reply text-uppercase" id="reply-btn"
                                                                                          onclick="showReplyForm('{{$comment->id}}','{{$reply->user->name}}')">reply</button>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            <div class="comment-list left-padding" id="reply-form-{{$comment->id}}" style="display: none">
                                                <div
                                                    class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb">
                                                            <img src="img/asset/c2.jpg" alt="" />
                                                        </div>
                                                        <div class="desc">
                                                            <h5><a href="#">Goerge Stepphen</a></h5>
                                                            <p class="date">December 4, 2017 at 3:12 pm</p>
                                                            <div class="row flex-row d-flex">
                                                                    <div class="col-lg-12">
                                                                        <form action="{{route('reply.comment',$comment->id)}}" method="POST">
                                                                            @csrf
                                                                            <textarea
                                                                                id="reply-form-{{$comment->id}}-text"
                                                                                cols="60"
                                                                                name="replycomment"
                                                                                rows="2"
                                                                                class="form-control mb-10"
                                                                                placeholder="Messege"
                                                                                onfocus="this.placeholder = ''"
                                                                                onblur="this.placeholder = 'Messege'"
                                                                                required="">
                                                                            </textarea>
                                                                            <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                                                        </form>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End comment-sec Area -->

                            <!-- Start commentform Area -->
                            <section class="commentform-area pb-120 pt-80 mb-100">
                                <div class="container">
                                    <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                    <div class="row flex-row d-flex">
                                            <div class="alert"><h4>You Must be login to comments</h4></div>
                                            <div class="col-lg-12">
                                                <form action="{{route('message', $post->id)}}" method="post">
                                                    @csrf
                                                    <textarea
                                                        class="form-control mb-10"
                                                        name="message"
                                                        rows="6"
                                                        placeholder="Messege"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Messege'"
                                                        required=""
                                                    ></textarea>
                                                    <button type="submit" class="primary-btn mt-20" href="#">Comment</button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End commentform Area -->
                        </div>
                    </div>
                    @include('layouts.frontend.partials.sideber')
                </div>
            </div>
        </section>
        <!-- End post Area -->
    </div>


@endsection
@push('footer')
    <script type="text/javascript">
        function showReplyForm(commentId,user) {
            var x = document.getElementById(`reply-form-${commentId}`);
            var input = document.getElementById(`reply-form-${commentId}-text`);

            if (x.style.display === "none") {
                x.style.display = "block";
                input.innerText=`@${user} `;

            } else {
                x.style.display = "none";
            }
        }

        // Social Share links.
        const gmailBtn = document.getElementById('gmail-btn');
        const facebookBtn = document.getElementById('facebook-btn');
        const gplusBtn = document.getElementById('gplus-btn');
        const linkedinBtn = document.getElementById('linkedin-btn');
        const twitterBtn = document.getElementById('twitter-btn');
        const whatsappBtn = document.getElementById('whatsapp-btn');
        const socialLinks = document.getElementById('social-links');

        // posturl posttitle
        let postUrl = encodeURI(document.location.href);
        let postTitle = encodeURI('{{$post->title}}');

        facebookBtn.setAttribute("href",`https://www.facebook.com/sharer.php?u=${postUrl}`);
        twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
        linkedinBtn.setAttribute("href", `https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);
        whatsappBtn.setAttribute("href",`https://wa.me/?text=${postTitle} ${postUrl}`);
        gmailBtn.setAttribute("href",`https://mail.google.com/mail/?view=cm&su=${postTitle}&body=${postUrl}`);
        gplusBtn.setAttribute("href",`https://plus.google.com/share?url=${postUrl}`);


    </script>

@endpush
