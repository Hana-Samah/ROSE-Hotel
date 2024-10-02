<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
</head>
<body>
    <h1>Add a Review for Room {{ $room->id }}</h1>

    <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name" required>

        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>

        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>

        <button type="submit">Submit Review</button>
    </form>
</body>
</html>

