
@extends("layouts.frontend")


<!-- ... End Header -->

@section("content")

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{$title}}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">

            <div class="row">
                        <div class="case-item-wrap">


                            @foreach($posts as $post)


                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                        <img src="{{asset($post->featured)}}" alt="our case">
                                    </div>
                                    <a href="{{route("singlepost",$post->slug)}}">  <h6 class="case-item__title">{{$post->title}}</h6></a>
                                </div>
                            </div>

                            @endforeach



                        </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->



            <!-- End Sidebar-->

            <div class="links">
                {{$posts->links()}}
            </div>

        </main>



    </div>

</div>



<!-- Subscribe Form -->
@endsection




<!-- Footer -->

