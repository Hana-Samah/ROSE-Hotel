<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
            .table_deg{
                border: 2px solid white;
                margin: auto;
                width: 80%;
                text-align: center;
                margin-top: 40px;
            }

            .th_deg{
                background-color: skyblue;
                padding: 15px;
            }

            tr{
                border: 3px solid white;
            }
            td{
                padding: 10px;
            }

        </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                <div class="container">
        <h2>All Reviews</h2>

        <table class="table_deg">
            <thead>
                <tr>
                <th class="th_deg">ID</th>
                <th class="th_deg">User Name</th>
                <th class="th_deg">Room ID</th>
                <th class="th_deg">Review</th>
                <th class="th_deg">Rating</th>
                <th class="th_deg">Created At</th>
                <th class="th_deg">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->user_name }}</td>
                        <td>{{ $review->room_id }}</td>
                        <td>{{ $review->review }}</td>
                        <td>{{ $review->rating }}</td>
                        <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a onclick="return confirm('Are you sure to Delete this!!');"
                             class="btn btn-danger" href="{{url('delete_reviews',$review->id)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

                </div>
            </div>
      </div>

    @include('admin.footer')
</body>
</html>
