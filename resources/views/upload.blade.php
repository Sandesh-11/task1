<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo and Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .upload-box {
            text-align: center;
        }

        .upload-box h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }

        .custom-file-upload {
            display: inline-block;
            padding: 10px 20px;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f9fa;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #1877f2;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #165edb;
        }

        .image-preview {
            margin-top: 15px;
        }

        .image-preview img {
            max-width: 100%;
            border-radius: 4px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-box">
            <h2>Upload Photo and Status</h2>
            <form action="/upload" method="post" enctype="multipart/form-data">
            @csrf    
            <div class="form-group">
                    <textarea name="status" placeholder="What's on your mind?" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="photo-upload" class="custom-file-upload">
                        <input type="file" id="photo-upload" name="photo" accept="image/*">
                        Choose Photo
                    </label>
                </div>
                <div class="form-group image-preview">
                    <img id="image-preview" src="#" alt="Image Preview">
                </div>
                <div class="form-group">
                    <button type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('photo-upload').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
            }
        });
    </script>
</body>
</html>
