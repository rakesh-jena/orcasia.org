@extends('web')
@section('title','ORCA | Organisation for Research on China and Asia')
@section('meta_keywords', 'ORCA')
@section('meta_description', 'ORCA')

@section('content')

<!-- Banner -->
<section class="shock-section has-overlay focus-trigger">
    <div class="banner">
        <div class="content-wrapper">
            <!-- Intro -->
            <div class="basic-intro mb-35 text-center">
                <h1 class="title">
                    <span class="text-1 d-block text-style-1 white">ORCA’S</span>
                    <span class="text-2 d-block text-style-3 text-outline text-italic white-75">Community of Scholars</span>
                </h1>
            </div>
        </div>
        <!-- Image -->
        <div class="image-wrapper">
            <img src="{{ URL::asset('images/jpg/AdobeStock_215045010.jpeg') }}" class="image vh-85 fit-cover"
                alt="This is an example description for this item." />
        </div>
        <!-- Overlay -->
        <div class="overlay black-50"></div>
    </div>
</section>

<!-- Card boxed -->
<section class="shock-section pt-4 pb-4">
    <div class="container">
        <!-- Intro -->
        <div class="row g-4">
            @foreach($users->sortBy('name') as $user)
                <?php $author_meta = App\Models\UserMeta::where('user_id', $user->id)->first();?>
                <div class="col-12 col-md-6 col-xl-4">
                    <a href="{{url('author/'.$author_meta->slug)}}" class="item hover-zoom">
                        <div class="card boxed parent">
                            <!-- Image -->
                            <div class="image-wrapper" data-aos="zoom-in-up">
                                <img src="{{ URL::asset('images/author') }}/{{ $author_meta->avatar }}"
                                    alt="Image name" class="image outline white" />
                                <div class="image-overlay primary accent-hover"></div>
                            </div>
                            <!-- Box -->
                            <div class="card-body box shadow bg-color black hover-up-down" data-aos="zoom-in-up"
                                data-aos-delay="100">
                                <h3 class="title text-style-11 white">{{$user->name}}</h3>
                                <p style="color:#b0acac;" class="description gray line-clamp-3">
                                    @if($author_meta->about!=null){{ $author_meta->about }}@endif
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
