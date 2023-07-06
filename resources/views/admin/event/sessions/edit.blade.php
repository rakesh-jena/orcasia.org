@extends('admin')
@section('title','ORCA | Organisation for Research on China and Asia')
@section('meta_keywords', 'ORCA')
@section('meta_description', 'ORCA')

@section('content')
<!-- Start #main -->
<main id="main" class="main">
    <section class="section"> 
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Edit Schedule</h5>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{ url('yn-admin/event/schedule') }}/{{ $schedule->id }}/{{$sessionData->id}}/sessionUpdate">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$schedule->id}}" id="scheduleId" name="scheduleId">
                    <div class="col-12 col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="{{$sessionData->title}}" name="title">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="startTime" class="form-label">Start Time</label>
                        <input type="time" class="form-control" value="{{$sessionData->startTime}}" id="startTime" name="startTime">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="endTime" class="form-label">End Time</label>
                        <input type="time" class="form-control" value="{{$sessionData->endTime}}" id="endTime" name="endTime">
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" style="height: 100px">{{$sessionData->description}}</textarea>
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection