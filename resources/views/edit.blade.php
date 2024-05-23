<!-- resources/views/posts/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <style>
        .container {
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group textarea,
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #1877f2;
            color: white;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #165edb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ url('posts/update', ['id'=>$post->u_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Post')
            <div class="form-group">
                <textarea name="status" rows="4">{{ $post->status }}</textarea>
            </div>
            <div class="form-group">
                <input type="file" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
