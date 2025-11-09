<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border : 3px solid black;">
        <h1>Create a New Account Holder</h1>
        <form action="/register" method="POST">
            @csrf
            <label for="name">Name</label>
            <br/>
            <input name="name" type="text" placeholder="name">
            <br/>
            <label for="email">Email</label>
            <br/>
            <input name="email" type="text" placehollder="email">
            <br/>
            <label for="password">Password</label>
            <br/>
            <input name="password" type="password" placeholder="password">
            <br/>
            <label for="birthday">Birthdate</label>
            <br/>
            <input type="date" name="birthday" placeholder="birthday"><br/>
            <br/>
            <label for="spend_percent">Spend %</label>
            <br/>
            <input type="text" name="spend_percent" placeholder="spend %"><br/>
            <br/>
            <label for="save_percent">Save %</label>
            <br/>
            <input type="text" name="save_percent" placeholder="save %"><br/>
            <br/>
            <label for="give_percent">Give %</label>
            <br/>
            <input type="text" name="give_percent" placeholder="give %"><br/>
            <br/>
            <button>Register</button>
        </form>
    </div>
</body>
</html>