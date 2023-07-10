@extends('gcns.main')

@section('content')
 <!-- @include('form.scheduleForm.registeration') -->
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
    <div id="lgx-about" class="lgx-about">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-7">
                        <div class="lgx-about-content-area">
                            <div class="lgx-banner-info">
                                <h2 class="title" style="color: black;">About</h2>

                            </div>
                            <div class="lgx-about-content">
                                <p class="text">
                                    At the 19th National Party Congress, Party Secretary Xi Jinping announced
                                    the beginning of a “new era” which was to be driven by “socialism with
                                    Chinese characteristics”. The 20th National Party Congress has seen that
                                    mandate renewed amidst Xi’s international, regional and domestic ambitions
                                    growing to build China into a global superpower –and the CPC into a global
                                    ‘super-party’. Countries across the world have begun to view this ambition
                                    with alarm, especially as China inches closer to creating an alternative
                                    global order that is pax-Sinica driven, replacing pax-Americana. With China
                                    attempting to facilitate a transition from great power to superpower in an
                                    increasingly multipolar world, signs of this ambitious transition are
                                    visible in China’s domestic and international posturing. To glean how China
                                    is preparing for the “new era”, this conference will bring together the
                                    finest minds in Sinology to analyze the trajectory of China’s rise and its
                                    path to superpower status.
                                </p>
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
                            <img src="http://placehold.it/556x712" alt="about">
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
                            <p class="textalign mb3">Welcome to the dedicated to building remarkable Schedule!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-tab lgx-tab-vertical">
                            <ul class="nav nav-pills lgx-nav lgx-nav-nogap lgx-nav-colorful">
                                <li class="active"><a data-toggle="pill" href="#home">
                                        <h3>First <span>Day</span></h3>
                                        <p><span>29 </span>Nov, 2019</p>
                                    </a></li>
                                <li><a data-toggle="pill" href="#menu1">
                                        <h3>Second <span>Day</span></h3>
                                        <p><span>28 </span>Jul, 2019</p>
                                    </a></li>
                                
                            </ul>
                            <div class="tab-content lgx-tab-content">


                                <div id="home" class="tab-pane fade in active">

                                    <div class="panel-group" id="accordion" role="tablist"
                                        aria-multiselectable="true">
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <div class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">09:00 <span>Am</span> - 10.30
                                                                    <span>Am</span></h4>
                                                                <h3 class="title">Wait is Over! Stony Brook
                                                                    Captures Conference</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in"
                                                role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapseTwo"
                                                        aria-expanded="true" aria-controls="collapseTwo">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">10:30 <span>Am</span> - 11.30
                                                                    <span>Am</span></h4>
                                                                <h3 class="title">Team With At Least Three
                                                                    Conference Titles</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapseThree"
                                                        aria-expanded="true" aria-controls="collapseThree">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">11:30 <span>Am</span> - 01.30
                                                                    <span>Pm</span></h4>
                                                                <h3 class="title">Building an Awesome Community
                                                                    on Your Website</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingfour">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapsefour"
                                                        aria-expanded="true" aria-controls="collapsefour">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">02:00 <span>Am</span> - 03.30
                                                                    <span>Pm</span></h4>
                                                                <h3 class="title">Hungry Shawnee boys soccer
                                                                    team eyeing conference, sectional title in
                                                                    2019</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapsefour" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingfive">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#collapsefive"
                                                        aria-expanded="true" aria-controls="collapsefive">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">03:45 <span>Am</span> - 04.00
                                                                    <span>Pm</span></h4>
                                                                <h3 class="title">Business World Event
                                                                    Introduction</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapsefive" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div id="menu1" class="tab-pane fade">

                                    <div class="panel-group" id="accordion2" role="tablist"
                                        aria-multiselectable="true">
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingOne2">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion2" href="#collapseOne2"
                                                        aria-expanded="true" aria-controls="collapseOne2">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">09:00 <span>Am</span> - 10.30
                                                                    <span>Am</span></h4>
                                                                <h3 class="title">The Wait is Over! Stony Brook
                                                                    Captures First Conference Title</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseOne2" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingTwo2">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion2" href="#collapseTwo2"
                                                        aria-expanded="true" aria-controls="collapseTwo2">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">09:00 <span>Am</span> - 10.30
                                                                    <span>Am</span></h4>
                                                                <h3 class="title">Digital World Event
                                                                    Introduction</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseTwo2" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default lgx-panel">
                                            <div class="panel-heading" role="tab" id="headingThree2">
                                                <div class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion2" href="#collapseThree2"
                                                        aria-expanded="true" aria-controls="collapseThree2">
                                                        <div class="lgx-single-schedule">
                                                            
                                                            <div class="schedule-info">
                                                                <h4 class="time">09:00 <span>Am</span> - 10.30
                                                                    <span>Am</span></h4>
                                                                <h3 class="title">Digital World Event
                                                                    Introduction</h3>
                                                                
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div id="collapseThree2" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    <p class="text">
                                                        Meh synth Schlitz, tempor duis single-origin coffee ea
                                                        next level ethnic fingerstache fanny pack nostrud. Photo
                                                        booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                                        Salvia esse flexitarian Truffaut synth art party deep v
                                                        chillwave.
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
                <div class="section-btn-area schedule-btn-area">
                    <a class="lgx-btn lgx-btn-big" href="speakers.html"><span>Download Schedule (PDF)</span></a>
                    <a class="lgx-btn lgx-btn-red lgx-btn-big" href="speakers.html"><span>Connect via
                            facebook</span></a>
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
    <div id="lgx-speakers" class="lgx-speakers lgx-speakers2">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading lgx-heading-white">
                            <h2 class="heading">Who’s Speaking</h2>
                            <h3 class="subheading">Welcome to the dedicated to building remarkable Speakers!</h3>
                        </div>
                    </div>
                </div>
                <!--//.ROW-->
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                    
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                    
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                    
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                    
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-speaker"> <!--lgx-single-speaker-circle lgx-single-speaker2 lgx-single-speaker3-->
                            <figure>
                                <a class="profile-img" href="speakers.html"><img src="http://placehold.it/800x860" alt="Speaker"/></a>
                                <figcaption>
                                    
                                    <div class="speaker-info">
                                        <h3 class="title"><a href="speaker.html">Jonathon Doe</a></h3>
                                        <h4 class="subtitle">Ceo of LogicHunt</h4>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            
            </div>
            <!-- //.CONTAINER -->
        </div>
        <!-- //.INNER -->
    </div>
</section>
<!--SPEAKERS END-->



    <!--Sponsors-->
<section>
    <div id="lgx-news" class="lgx-news">
        <div class="lgx-inner">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="lgx-heading">
                            <h2 class="heading">Sponsors</h2>
                            <h3 class="subheading">Conferences dedicated to building remarkable events.</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                            </figure>
                            <div class="single-news-info">
                            
                                <h3 class="title"><a href="news-single.html">Title</a></h3>
                                <p>Conferences dedicated to building remarkable events.</p>
                                <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Know More</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                            </figure>
                            <div class="single-news-info">
                            
                                <h3 class="title"><a href="news-single.html">Title</a></h3>
                                <p>Conferences dedicated to building remarkable events.</p>
                                <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Know More</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="lgx-single-news">
                            <figure>
                                <a href="news-single.html"><img src="http://placehold.it/1144x690" alt=""></a>
                            </figure>
                            <div class="single-news-info">
                            
                                <h3 class="title"><a href="news-single.html">Title</a></h3>
                                <p>Conferences dedicated to building remarkable events.</p>
                                <a class="lgx-btn lgx-btn-white lgx-btn-sm" href="#"><span>Know More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div><!-- //.CONTAINER -->
        </div><!-- //.INNER -->
    </div>
</section>
<!--Sponsors END-->
@endsection
      
      
      
