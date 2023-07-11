@extends('gcns.main')

@section('content')

<!--Banner Inner-->
<section>
        <div class="lgx-banner lgx-banner-inner">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                                    <h2 class="heading">{{$speaker->name}}</h2>
                                </div>
                                <ul class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
                                    <li><a href="#">Speakers</a></li>
                                    <li class="active">{{$speaker->name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->


    <main>
        <div class="lgx-post-wrapper">
            <!--News-->
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <article>
                                <header>
                                    <figure>
                                        <img src="{{url('images/event/speaker/'.$speaker->image)}}" alt="{{$speaker->name}}"/>
                                    </figure>
                                    <div class="text-area">
                                        <div class="speaker-info">
                                            <h1 class="title"><a href="speaker.html">{{$speaker->name}}</a></h1>
                                            <h4 class="subtitle">{{$speaker->designation}}</h4>
                                        </div>
                                      
                                    </div>
                                </header>
                                <section>
                                    <p>
                                    {{$speaker->content}}
                                    </p>
                                   
                                </section>
                                
                            </article>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </section>
            <!--News END-->
        </div>
    </main>
@endsection
      
      
      
