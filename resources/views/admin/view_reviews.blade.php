<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                <div class="container">
        <h2>All Reviews</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Room ID</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Created At</th>
                    <th>Actions</th>
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
                            <!-- Add actions if needed -->
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
