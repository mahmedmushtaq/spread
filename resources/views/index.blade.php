@extends("layouts.frontend")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset($first_post->featured)}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{asset($first_post->featured)}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route("singlepost",$first_post->slug)}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route("singlepost",$first_post->slug)}}">{{$first_post->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="{{$first_post->updated_at}}">
                                               {{$first_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route("category.all_posts",$first_post->category)}}">{{$first_post->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset($second_post->featured)}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{asset($second_post->featured)}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route("singlepost",$second_post->slug)}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route("singlepost",$second_post->slug)}}">{{$second_post->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                             {{$second_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route("category.all_posts",$second_post->category)}}">{{$second_post->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{asset($third_post->featured)}}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{asset($third_post->featured)}}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{route("singlepost",$third_post->slug)}}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                            <h2 class="post__title entry-title ">
                                <a href="{{route("singlepost",$third_post->slug)}}">{{$third_post->title}}</a>
                            </h2>

                            <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$third_post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="{{route("category.all_posts",$third_post->category)}}">{{$third_post->category->name}}</a>
                                        </span>

                                <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            0
                                        </span>

                            </div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <a href="{{route("category.all_posts",3)}}">
                                    <h4 class="h1 heading-title">Motivation</h4>
                                    </a>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">



                                @foreach($motivationPost as $post)

                                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <a href="{{route("singlepost",$post->slug)}}" class="link-post">
                                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                <img src="{{asset($post->featured)}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title">
                                                {{$post->title}}
                                            </h6>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach



                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>
                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <a href="{{route("category.all_posts",2)}}">
                                    <h4 class="h1 heading-title">News Post</h4>
                                    </a>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">


                                @foreach($newsPost as $post)

                                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">

                                        <div class="case-item">
                                            <a href="{{route("singlepost",$post->slug)}}" class="link-post">
                                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                <img src="{{asset($post->featured)}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title">{{$post->title}}</h6>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach



                            </div>
                        </div>
                    </div>

                    <div class="padded-50"></div>

                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <a href="{{route("category.all_posts",4)}}">
                                    <h4 class="h1 heading-title">

                                        Self Improvement
                                    </h4>
                                    </a>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">



                                @foreach($selfImprovementPost as $post)

                                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <a href="{{route("singlepost",$post->slug)}}" class="link-post">
                                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                <img src="{{asset($post->featured)}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title">{{$post->title}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="padded-50"></div>


                    <div class="offers">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <div class="heading">
                                    <a href="{{route("category.all_posts",1)}}">
                                    <h4 class="h1 heading-title">Programming Post</h4>
                                    </a>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="case-item-wrap">


                                @foreach($programmingPost as $post)

                                    <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <a href="{{route("singlepost",$post->slug)}}" class="link-post">
                                            <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                                <img src="{{asset($post->featured)}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title">{{$post->title}}</h6>
                                            </a>
                                        </div>
                                    </div>

                                @endforeach



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

