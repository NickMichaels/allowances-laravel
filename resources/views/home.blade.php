<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allowances App</title>
</head>
<body>

    @auth
        <p> Congrats! you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>


        <div style="border : 3px solid black;">
            <h2><a href="/nowhere/">Future Features</a></h2>
        </div>

        <!-- Show dropbox and table showing accounts -->


    @else
    <div style="border : 3px solid black;">
        <h2>Register</h2>
        <p><a href="create-user">Create a New User</a></p>
    </div>
    <div style="border : 3px solid black;">
    <h2>Log in</h2>
    <form action="/login" method="POST">
        @csrf
        <input name="loginname" type="text" placeholder="name">
        <input name="loginpassword" type="password" placeholder="password">
        <button>Log in</button>
    </form>
    </div>
    @endauth


</body>
</html>