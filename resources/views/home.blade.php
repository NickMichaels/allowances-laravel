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

    @if(auth()->id() === 1)
        <div style="border : 3px solid black;">
            <h2><a href="/create-holder/">Create a New Account Holder</a></h2>
        </div>
    @else
        <div style="border : 3px solid black;">
            <h2><a href="/nowhere/">Future Features</a></h2>
        </div>
    @endif


    @else
    <div style="border : 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="text" placehollder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
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