<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Bordered form */
        form {
            border: 3px solid #f1f1f1;
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Full-width inputs */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for the login button */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Center the form on small screens */
        @media screen and (max-width: 600px) {
            form {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <form action="{{$url}}" method="Post">
        @csrf
         <label for="email"><b>Email*</b></label>
        <input type="text" placeholder="Enter  email" name="email" required>
        <span class="text-danger">
            @error('email')
             {{$message}}
            @enderror
        </span>
        <label for="password"><b>Password*</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <span class="text-danger">
            @error('password')
             {{$message}}
            @enderror
        </span>
        <button type="submit">Login</button>
    </form>
</body>
</html>
