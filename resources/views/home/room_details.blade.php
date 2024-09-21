<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
.narrow-container {
    width: 60%; /* تقليل العرض إلى 60% من عرض الصفحة */
    margin: 0 auto; /* لضبط المحتوى في المنتصف */
}

.review-box {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    
}

.add-review-form {
    margin-top: 40px;
}

.form-group {
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #A52A2A;
    border-color:  #A52A2A;
 
}
.btn-primary:hover {
    background-color: #A52A2A;
    border-color:  #A52A2A;
}

.social-share {
    display: flex;
    justify-content: center; /* لضبط المحتوى في المنتصف */
    margin-top: 20px;
    gap: 15px; /* لإضافة مسافات بين الروابط */
}

.social-share a {
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    background-color: #A52A2A;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.3s;
    font-size: 14px;
    font-weight: bold;
}

.social-share a i {
    margin-right: 8px; /* لإضافة مسافة بين الأيقونة والنص */
    font-size: 16px;
}



/* إخفاء النص وإظهار الأيقونات فقط على الشاشات الصغيرة */
@media (max-width: 768px) {
    .social-share {
        flex-direction: row;
        gap: 10px;
    }

    .social-share a {
        font-size: 0; /* إخفاء النص */
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:  #A52A2A;
        border-radius: 50%;
    }

    .social-share i {
        font-size: 20px;
        margin-right: 0;
    }

    .social-share .share-text {
        display: none; /* إخفاء النص */
    }
    .social-share a i {
    margin-right: 0px; /* لإضافة مسافة بين الأيقونة والنص */
}
}

    </style>
</head>
<body class="main-layout">

    <header>
        @include('home.header')
    </header>

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px" class="room_img">
                            <img style="height: 300px; width: 800px" src="/room/{{$room->image}}" alt="#"/>
                        </div>
                        <div class="bed_room">
                            <h2>{{$room->room_title}}</h2>
                            <p style="padding: 12px">{{$room->description}}</p>
                            <h6 style="padding: 10px">Free wifi: {{$room->wifi}}</h6>
                            <h6 style="padding: 10px">Room Type: {{$room->room_type}}</h6>
                            <h3 style="padding: 12px">Price: {{$room->price}}</h3>
                        </div>
                    </div>
                </div> 
                <div class="col-md-4">
                    <h1 style="font-size: 40px ! important">Book Room</h1>
                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                                {{session()->get('message')}}
                            </div>  
                        @endif
                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li style="color: red">{{ $error }}</li>
                        @endforeach
                    @endif
                    <form action="{{url('add_booking', $room->id)}}" method="post">
                        @csrf
                        <!-- Booking Form Fields -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" 
                            @if(Auth::id())
                                value="{{Auth::user()->name}}"
                            @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                            @if(Auth::id())
                                value="{{Auth::user()->email}}"
                            @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" id="phone" name="phone" class="form-control"
                            @if(Auth::id())
                                value="{{Auth::user()->phone}}"
                            @endif
                            >
                        </div>
                        <div class="form-group">
                            <label for="startDate">Start Date</label>
                            <input type="date" id="startDate" name="startDate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="endDate">End Date</label>
                            <input type="date" id="endDate" name="endDate" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Book Room">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="social-share">
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
        <i class="fab fa-facebook-f"></i><span class="share-text"> Share on Facebook</span>
    </a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($room->room_title) }}" target="_blank">
        <i class="fab fa-twitter"></i><span class="share-text"> Share on Twitter</span>
    </a>
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank">
        <i class="fab fa-linkedin-in"></i><span class="share-text"> Share on LinkedIn</span>
    </a>
</div>

<br>
<br>

<div class="review-container narrow-container">
    <h1>Reviews for Room {{ $room->id }}</h1>
    <br>

    @foreach ($reviews as $review)
        <div class="review-box">
            <h3>{{ $review->user_name }} <span class="rating">({{ $review->rating }} / 5)</span></h3>
            <p>{{ $review->review }}</p>
            <p><small>Reviewed at {{ $review->created_at->format('M d, Y') }}</small></p>
        </div>
    @endforeach
</div>

<div class="add-review-form narrow-container">
    <h2>Add a Review</h2>
    <form action="{{ url('add_review', $room->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">Name</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="review">Review</label>
            <textarea id="review" name="review" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="rating">Rating (1-5)</label>
            <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit Review">
        </div>
    </form>
</div>


    @include('home.footer')

    <script type="text/javascript">
        $(function(){
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if(month < 10)
                month = '0' + month.toString();

            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#startDate').attr('min', maxDate);
            $('#endDate').attr('min', maxDate);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" 
    crossorigin="anonymous"></script>
</body>
</html>
