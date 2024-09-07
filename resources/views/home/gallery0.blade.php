<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
     integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <style>
        .gallery-image {
            width: 100%; /* يجعل العرض يغطي العنصر الأب بالكامل */
            height: 250px; /* توحيد ارتفاع الصور */
            object-fit: cover; /* يحافظ على تناسق الأبعاد ويمنع التشوه */
        }
    </style>
</head>
<body class="main-layout">
    <!-- header -->

    <!-- gallery -->
    <div class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($gallary->isNotEmpty())
                    @foreach($gallary as $item)
                        <div class="col-md-3 col-sm-6">
                            <div class="gallery_img">
                                <figure>
                                    <img src="/gallary/{{ $item->image }}" alt="#" class="gallery-image"/>
                                </figure>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <p>No gallery images available.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- end gallery -->



</body>
</html>
