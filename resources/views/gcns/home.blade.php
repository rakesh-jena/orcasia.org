@extends('gcns.main')

@section('content')

<!--BANNER-->
<section>
    <div class="lgx-banner">
        <div class="lgx-banner-style">
            <div class="lgx-inner lgx-inner-fixed">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="lgx-banner-info-area">
                                <div class="lgx-banner-info-circle">
                                    <div class="info-circle-inner">
                                        <h3 class="date"><b class="lgx-counter">25</b> <span>September</span>
                                        </h3>
                                        <div class="lgx-countdown-area">
                                            <!-- Date Format :"Y/m/d" || For Example: 1017/10/5  -->
                                            <div id="lgx-countdown" data-date="2023/09/25"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lgx-banner-info">
                                    <!--lgx-banner-info-center lgx-banner-info-black lgx-banner-info-big lgx-banner-info-bg-->
                                    <!--banner-info-margin-->
                                    <h3 class="subtitle">GLOBAL</h3>
                                    <h2 class="title">Conference on New Sinology</h2>
                                    <h3 class="location"><i class="fa fa-map-marker"></i> The Grand, New Delhi<br>
                                        <i class="fa fa-calendar"></i> 25 - 26 SEP 2023
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </div>
</section>
<!--BANNER END-->


<!--ABOUT-->
<section>
    <?php $aboutData = App\Models\Event\About::orderBy('id', 'asc')->first(); ?>
    <div id="lgx-about" class="lgx-about">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="lgx-about-content-area">
                            <div class="lgx-banner-info">
                                <h2 class="title" style="color: black;">{{$aboutData['title']}}</h2>

                            </div>
                            <div class="lgx-about-content textjustify">
                                {!! $aboutData['desc'] !!}
                                <div class="about-date-area">
                                    <h4 class="date"><span>25-26</span></h4>
                                    <p><span>September 2023</span> The Grand, New Delhi</p>
                                </div>

                                <div class="section-btn-area">
                                    <a class="lgx-btn" href="#"><span>More About</span></a>
                                    <a class="lgx-btn lgx-btn-red lgx-scroll" id="myModalLabel2" data-toggle="modal" data-target="#lgx-modal-map" href="#"><span>Register</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="lgx-about-img-sp">
                            <img src="{{ URL::asset('gcns/img/gcnslogo556.png') }}" alt="about">
                        </div>
                    </div>
                </div>
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<!--ABOUT END-->


<!--SCHEDULE-->
<section>
    <div id="lgx-schedule" class="lgx-schedule lgx-schedule-white">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-banner-info">
                            <h2 class="textalign title" style="color: black;">Schedule</h2>
                            <p class="textalign mb3">Peruse through the schedule of ORCA's inaugural Global Conference on New Sinology (GCNS)
                            </p>
                        </div>
                    </div>
                </div>
                <?php $scheduleData = App\Models\Event\Schedule::orderBy('id', 'asc')->get(); ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-tab lgx-tab-vertical">
                            <ul class="nav nav-pills lgx-nav lgx-nav-nogap lgx-nav-colorful">
                            <?php $counter = 0; ?>
                            @foreach($scheduleData as $schedule)
                                <li class="{{$counter == 0 ? 'active' : ''}}">
                                <?php $slug  = strtolower(str_replace(' ', '-', $schedule['title'])); ?>
                                    <a data-toggle="pill" href="#{{$slug}}">
                                    <h3>{{$schedule->title}}</h3>
                                    <p><?=date_format(date_create($schedule->scheduleDate), "j M, Y")?></p>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                            @endforeach
                            </ul>
                            <div class="tab-content lgx-tab-content">
                            <?php $accCounter = 0; ?>
                            @foreach($scheduleData as $schedule)
                            <?php $slug  = strtolower(str_replace(' ', '-', $schedule['title'])); ?>
                                <div id="{{$slug}}" class="tab-pane fade {{$accCounter == 0 ? 'in active' : ''}}">

                                    <div class="panel-group" id="<?php echo 'accordion'.$accCounter; ?>" role="tablist" aria-multiselectable="true">
                                    
                                    <?php $sessionData = App\Models\Event\ScheduleSession::orderBy('id', 'asc')->where('scheduleId',$schedule['id'])->get(); ?>
                                    <?php $sessionCounter = 0; ?>
                                    @foreach($sessionData as $session)
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="<?php echo 'heading'.$accCounter.$sessionCounter; ?>">
                                                <div class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                        data-parent="<?php echo '#accordion'.$accCounter; ?>" href="<?php echo '#collapse'.$accCounter.$sessionCounter; ?>"
                                                        aria-expanded="true" aria-controls="<?php echo 'collapse'.$accCounter.$sessionCounter; ?>">
                                                        <div class="lgx-single-schedule">
                                                            <?php 
                                                            $convertedStartTime = DateTime::createFromFormat('H:i:s', $session->startTime)->format('h:i A');

                                                            $convertedEndTime = DateTime::createFromFormat('H:i:s', $session->endTime)->format('h:i A');
                                                            ?>
                                                            <div class="schedule-info">
                                                                <h4 class="time">{{$convertedStartTime}} - {{$convertedEndTime}}</h4>
                                                                @if($session->sessionTag != null)
                                                                <h4 class="time sessiontag">{{$session->sessionTag}}</h4>
                                                                @endif
                                                                <h3 class="title textjustify">{{$session->title}}</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="<?php echo 'collapse'.$accCounter.$sessionCounter; ?>" class="panel-collapse collapse {{$sessionCounter == 0 ? 'in' : ''}}"
                                                role="tabpanel" aria-labelledby="<?php echo 'heading'.$accCounter.$sessionCounter; ?>">
                                                <div class="panel-body">
                                                    <p class="text textjustify">
                                                        {!! $session->description !!}
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    <?php $sessionCounter++; ?>
                                    @endforeach
                                    </div>
                                </div>
                                <?php $accCounter++; ?>
                            @endforeach                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
                <div class="section-btn-area schedule-btn-area">
                    <a class="lgx-btn lgx-btn-big" href="speakers.html"><span>Download Schedule (PDF)</span></a>
                    <a class="lgx-btn lgx-btn-red lgx-btn-big" href="https://twitter.com/GCNS_ORCA"><span>Connect via
                            Twitter</span></a>
                </div>
            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.INNER -->
    </div>
</section>
<!--SCHEDULE END-->


<!--SPEAKERS-->
<section>
<?php $speakerData = App\Models\Event\Speaker::orderBy('id', 'asc')->get(); ?>
    <div id="lgx-speakers" class="lgx-speakers lgx-speakers2">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading">Who’s Speaking</h2>
                            <h3 class="subheading">Our speakers for ORCA's Global Conference on New Sinology 2023</h3>
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
                <div class="row">
                    <div class="my-slider">
                    @foreach($speakerData as $speaker)
                        <div>
                            <div class="slide slidemr">
                                <div class="slide-img">
                                    <img src="{{url('images/event/speaker/'.$speaker->image)}}" alt="{{$speaker->name}}">
                                    <a href="{{ url('event/speaker/') }}/{{ $speaker->id }}">
                                        Learn More
                                    </a>
                                    <!-- <a href="{{url('event/speaker/'.$speaker->id)}}"></a> -->
                                </div>
                                <br>
                                <div>
                                    <h3 class="slidername">{{$speaker->name}}</h3>
                                    <p class="slidername">{{$speaker->designation}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <!--//.my-slider-->
                </div>
                <!--//.ROW-->
                <div class="section-btn-area schedule-btn-area">
                    <a class="lgx-btn lgx-btn-red lgx-btn-big" href="#"><span>View all Speakers</span></a>
                </div>
            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.INNER -->
    </div>
</section>
<!--SPEAKERS END-->


<script>
        // TINY SLIDER
let slider = tns({
  container: ".my-slider",
  animateIn: "jello",
  animateOut: "rollOut",
  slideBy: 1,
  speed: 200,
  nav: false,
  swipeAngle: false,
  controls: false,
  autoplay: true,
  autoplayButtonOutput: false,
  responsive: {
    1600: {
      items: 4,
      gutter: 20
    },
    1024: {
      items: 3,
      gutter: 20
    },
    768: {
      items: 2,
      gutter: 20
    },
    480: {
      items: 1
    }
  }
});
  </script>

    <!--Sponsors-->
<section>
<?php $partnerData = App\Models\Event\Partner::orderBy('id', 'asc')->get(); ?>
    <div id="lgx-partners" class="lgx-news">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h2 class="heading">Partners</h2>
                            <h3 class="subheading">GCNS Event Partners for 2023</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($partnerData as $partner)
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="{{$partner->link}}">
                                <img src="{{url('images/event/partner/'.$partner->logo)}}" alt="{{$partner->title}}">
                                </a>
                            </figure>
                            <div class="single-news-info">
                            
                                <h3 class="title"><a href="{{$partner->link}}">{{$partner->title}}</a></h3>
                                <p>{{$partner->content}}</p>
                                <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="{{$partner->link}}"><span>Know More</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<!--Sponsors END-->
@endsection
      
      
      
