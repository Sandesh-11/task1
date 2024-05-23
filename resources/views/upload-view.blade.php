<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <style>
        .container {
            margin: 20px;
        }

        .post {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: white;
        }

        .post img {
            max-width: 100%;
            border-radius: 4px;
        }

        .comments {
            margin-top: 15px;
        }

        .comments h4 {
            margin-bottom: 10px;
        }

        .comment {
            border-top: 1px solid #eee;
            padding-top: 10px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group textarea {
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
        @foreach ($uploads as $post)
            <div class="post">
                <p>{{ $post->status }}</p>
                @if ($post->photo_path)
                    <img src="{{ Storage::url($post->photo_path) }}" alt="Post Image">
                @endif

                <div class="actions">
                    <a href="{{url('posts/edit',['id'=>$post->u_id]) }}">Edit</a>
                    <a href="{{url('posts/force.delete',['id'=>$post->u_id])}}">
                
                    <button type="submit">Delete</button>
                </a>
                     
        
                </div>

                <div class="comments">
    <h4>Comments</h4>
    @if ($post->comments)
        @foreach ($post->comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif

    <form action="{{ route('uploads.addComment') }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="comment" placeholder="Add a comment" rows="2"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Comment</button>
        </div>
    </form>
</div>

                    
            </div>
        @endforeach
    </div>
</body>
</html>
