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
                    <div class="col-6">
                        <h5 class="card-title">Registration list</h5>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <a href="{{ route('download.csv') }}" class="btn btn-primary">Download CSV</a>
                    </div>
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
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-body">                
                <table class="table table-responsive align-middle">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>ID</th>
                            <th>Schdeule</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Occupation</th>
                            <th>Organization</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1;?>
                        @foreach ($registerations as $registeration)
                            <tr>
                                <!-- <th><?=$count?></th> -->
                                <td> {{ $registeration->id }} </td>
                                <?php  
                                    $schedule = 'Session '. implode(', ', json_decode($registeration->schedule_id))
                                ?>
                                <td> {{ $schedule }}</td>
                                <td> {{ $registeration->fname }} {{$registeration->lname}}</td>
                                <td> {{ $registeration->email }}</td>
                                <td> {{ $registeration->phonenumber }}</td>
                                <td> {{$registeration->occupation}} </td>
                                <td> {{$registeration->organization}} </td>
                                <td>
                                    <button data-bs-toggle="modal" data-id="{{$registeration->id}}" data-aurl="{{ url('check-category') }}" data-url="{{ url('yn-admin/event/registeration/'.$registeration['id']) }}"
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