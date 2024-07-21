<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="news-item mb-5">
            <h1 class="mb-3">{{ $news->title }}</h1>
            <img src="{{ asset('storage/' . $news->image) }}" alt="Image" class="img-fluid mb-3">
            <p>{{ $news->description }}</p>
            <p class="text-muted"><strong>Category:</strong> {{ $news->category->name }}</p>
            <p class="text-muted"><strong>Published at:</strong> {{ $news->publish_at->format('M d, Y') }}</p>
        </div>

        <div class="comments-section mb-5">
            <h2 class="mb-4">Comments</h2>
            @foreach ($news->comments as $comment)
                <div class="comment mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="add-comment mb-5">
            <h2 class="mb-4">Add a Comment</h2>
            <form action="{{ route('news.comment', $news) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
