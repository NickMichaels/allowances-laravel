<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a New Account Holder</title>
</head>
<body>

    <div style="border : 3px solid black;">
        <h1>Create a New Account Holder</h1>
        <form action="/create-holder/" method="POST">
            <!-- 'name', 'birthday', 'age', 'rate', 'spend_percent', 'save_percent', 'give_percent' -->
            @csrf
            <label for="name">Account Holder Name</label>
            <br/>
            <input type="text" name="name" placeholder="name"><br/>
            <br/>
            <label for="birthday">Account Holder Birthdate</label>
            <br/>
            <input type="date" name="birthday" placeholder="birthday"><br/>
            <br/>
            <label for="spend_percent">Account Holder Spend %</label>
            <br/>
            <input type="text" name="spend_percent" placeholder="spend %"><br/>
            <br/>
            <label for="save_percent">Account Holder Save %</label>
            <br/>
            <input type="text" name="save_percent" placeholder="save %"><br/>
            <br/>
            <label for="give_percent">Account Holder Give %</label>
            <br/>
            <input type="text" name="give_percent" placeholder="give %"><br/>
            <br/>
            <label for="user_id">Select a User</label>
            <br/>
            <select name="user_id" id="user_id">
                <option value="">Select a User</option>
            @foreach($users as $user)
                <option value="{{$user['id']}}">{{$user['name']}}</option>
            @endforeach
            </select>
            <br/>
            <br/>
            <br/>

            <button>Create Account Holder</button>
        </form>
    </div>
</body>
</html>