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
                    <h5 class="card-title">Add Media Files</h5>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- @if(session('message'))
                    <div class="alert alert-info">
                        {{'Your file link is: '}}<input type="text" value="{{session('message')}}" id="myInput">
                        <button onclick="copyText()">Copy Link</button>
                    </div>
                @endif -->
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{url('yn-admin/event/media')}}">
                    @csrf
                    <div class="col-12 col-md-6">
                        <label for="sequence" class="form-label">Sequence No</label>
                        <input type="number" class="form-control" id="sequence" name="sequence">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="#formFile1" class="form-label">File</label>
                        <input class="form-control" type="file" id="formFile1" name="fileToUpload">
                        <span style="font-size:12px;color:blue">*Please use these file formats only jpeg,png,pdf,mp3,mp4</span>
                    </div>
                    <!-- <div class="col-12 col-md-6">
                        <label for="link" class="form-label">Sequence No</label>
                        <input type="number" class="form-control" id="sequence" name="sequence">
                    </div> -->
                    <div class="text-start">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">Merdia Files</h5>
                </div>
                
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>Sequence</th>
                            <th>Files</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($mediaFiles as $media)
                            <tr>
                                <!-- <th><?=$count?></th> -->
                                <td> {{ $media['sequence_no'] }} </td>
                                <td>
                                    @if($media['fileType'] == 'video')
                                        <video controls width="100" height="100" > <source src="{{url('images/event/media/'.$media['files'])}}" type="video/mp4" > </video>
                                    @elseif($media['fileType'] == 'pdf')
                                        <embed src="{{url('images/event/media/'.$media['files'])}}" width="100" height="100" type="application/pdf">
                                    @else
                                        <img class="" style="height:100px;widht:100px;" src="{{url('images/event/media/'.$media['files'])}}" width="100" height="100" alt="">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('yn-admin/event/media') }}/{{ $media['id'] }}/edit" class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                    <button data-bs-toggle="modal" data-id="{{$media['id']}}" data-aurl="{{ url('check-category') }}" data-url="{{ url('yn-admin/event/media/'.$media['id']) }}"
                                    data-bs-target="#category_delete_modal" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                                </td>
                            </tr>
                        <?php $count++;?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@include('admin.category.delete')
@endsection

<script>
    function copyText() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
    }
</script>
