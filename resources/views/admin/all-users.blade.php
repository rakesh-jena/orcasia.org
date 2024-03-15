@extends('admin')
@section('title', 'ORCA | Organisation for Research on China and Asia')
@section('meta_keywords', 'ORCA')
@section('meta_description', 'ORCA')

@section('content')
    <!-- Start #main -->
    <main id="main" class="main">
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title">Subscribers</h5>
                    </div>
                    <table class="table table-responsive align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    Added
                                </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($users as $user)
                                <tr>
                                    <th><?= $count ?></th>
                                    <td> {{ $user->name }} </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill text-bg-info text-white">{{ $user->role }}</span>
                                    </td>
                                    <td>
                                        <?= date_format(date_create($user->created_at), 'd M, Y') ?>
                                    </td>
                                    <td>
                                        <a href="{{ url('yn-admin') }}" class="btn btn-danger rounded-pill btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
