@extends('author')
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
                        <h5 class="card-title">Articles</h5>
                    </div>
                    <table class="table table-responsive align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Author
                                </th>
                                <th>Views</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            @foreach ($articles as $article)
                                <?php $category = App\Models\Category::where('id', $article->category)->first(); ?>
                                <tr>
                                    <th><?= $count ?></th>
                                    <td> {{ $article->title }} </td>
                                    <td>
                                        {{ Auth::user()->name }}
                                    </td>
                                    <td>{{ $article->views }}</td>
                                    <td>
                                        {{ $category->category }}
                                    </td>
                                    <td>
                                        <span
                                            class="badge rounded-pill text-bg-info text-white">{{ $article->status }}</span>
                                    </td>
                                    <td>
                                        <?= date_format(date_create($article->created_at), 'd M, Y') ?>
                                    </td>
                                    <td>
                                        @if ($article->status == 'approved' || $article->status == 'processing')
                                            <a href="{{ url('/article') }}/{{ $article->id }}/{{ $article->slug }}"
                                                class="btn btn-primary rounded-pill btn-sm" target="_blank">View</a>
                                        @else
                                            <a href="{{ url('/article') }}/{{ $article->id }}/{{ $article->slug }}"
                                                class="btn btn-primary rounded-pill btn-sm" target="_blank">Preview</a>
                                            <a href="{{ url('yn-author/articles') }}/{{ $article->id }}/edit"
                                                class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                            <button data-bs-toggle="modal"
                                                data-url="{{ url('yn-author/articles/' . $article['id']) }}"
                                                data-bs-target="#author_article_delete_modal"
                                                class="btn btn-danger rounded-pill btn-sm">Delete</button>
                                        @endif
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
    @include('author.delete')
@endsection
