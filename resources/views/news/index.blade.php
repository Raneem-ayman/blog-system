<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        img{
  height:150px;
  width:100%;
}

.item{
  padding-left:5px;
  padding-right:5px;
}
.item-card{
  transition:0.5s;
  cursor:pointer;
}
.item-card-title{
  font-size:15px;
  transition:1s;
  cursor:pointer;
}
.item-card-title i{
  font-size:15px;
  transition:1s;
  cursor:pointer;
  color:#ffa710
}
.card-title i:hover{
  transform: scale(1.25) rotate(100deg);
  color:#18d4ca;

}
.card:hover{
  transform: scale(1.05);
  box-shadow: 10px 10px 15px rgba(0,0,0,0.3);
}
.card-text{
  height:80px;
}

.card::before, .card::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  transform: scale3d(0, 0, 1);
  transition: transform .3s ease-out 0s;
  background: rgba(255, 255, 255, 0.1);
  content: '';
  pointer-events: none;
}
.card::before {
  transform-origin: left top;
}
.card::after {
  transform-origin: right bottom;
}
.card:hover::before, .card:hover::after, .card:focus::before, .card:focus::after {
  transform: scale3d(1, 1, 1);
}
    </style>
    <div class="container mt-2">
        <h1 class="mb-4">News</h1>
        <div class="row">
            @foreach ($news as $newsItem)
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card item-card card-block">
                        <img src="{{ asset('storage/' . $newsItem->image) }}" class="card-img-top" alt="Image">
                        <div class="card-body">
                            <h5 class="card-title mt-3 mb-3"><a href="{{ route('news.show', $newsItem) }}">{{ $newsItem->title }}</a></h5>
                            <p class="card-text">{{ Str::limit($newsItem->description, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Category: {{ $newsItem->category->name }}</small><br>
                            <small class="text-muted">Published at: {{ $newsItem->publish_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $news->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
