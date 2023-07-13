@extends('gcns.main')

@section('content')



<style>
                        .allspeakers {
                            width:100%!important;
                           max-height:375px;
                           min-height:375px!important;
                            object-fit:cover!important;
                        }
                        
                        .container {
                            width:100%!important;
                            padding:0!important;
                        }
                    </style>
                    
                    
<!--Banner Inner-->
<section>
        <div class="lgx-banner">
            <div class="lgx-page-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-heading-area">
                                <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading">Who’s Speaking</h2>
                            <h3 class="subheading">Our speakers for ORCA's Global Conference on New Sinology 2023</h3>
                        </div>
                                
                            </div>
                        </div>
                    </div><!--//.ROW-->
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section> <!--//.Banner Inner-->
    
<!--SPEAKERS-->


 <!--News-->
            <section>
                <div class="container">
               
                    

                        <div class="col-sm-12">
                            <div class="lgx-photo-gallery lgx-gallery-area">
                                <?php $speakerData = App\Models\Event\Speaker::orderBy('id', 'asc')->get(); ?>
                                 @foreach($speakerData as $speaker)
                                <div  class="lgx-gallery-single">
                                    <figure>
                                        <img class="allspeakers" title="Memories One" src="{{url('images/event/speaker/'.$speaker->image)}}" alt="{{$speaker->name}}"/>
                                        <figcaption class="lgx-figcaption">
                                            <div class="lgx-hover-link">
                                                <div class="lgx-vertical">
                                                    <a title="Memories One" href="{{ url('event/speaker/') }}/{{ $speaker->id }}">
                                                        <div>
                                    <h3 class="slidername">{{$speaker->name}}</h3>
                                    <p class="slidername">{{$speaker->designation}}</p>
                                </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div> <!--Single photo-->
                                @endforeach
                               
                            </div>
                        </div> <!--//.COL-->
                  
               

               </div>

            </section>
            <!--News END-->




@endsection
      
      
      
