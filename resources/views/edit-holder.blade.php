<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="border : 3px solid black;">
        <h1>Edit Account Holder</h1>
        <form action="/edit-holder/{{$holder->id}}" method="POST">
            <!-- 'name', 'birthday', 'age', 'rate', 'spend_percent', 'save_percent', 'give_percent' -->
            @csrf
            <label for="name">Account Holder Name</label>
            <br/>
            <input type="text" name="name" placeholder="name" value="{{$holder->name}}"><br/>
            <br/>
            <label for="birthday">Account Holder Birthdate</label>
            <br/>
            <input type="date" name="birthday" placeholder="birthday" value="{{$holder->birthday}}"><br/>
            <br/>
            <label for="spend_percent">Account Holder Spend %</label>
            <br/>
            <input type="text" name="spend_percent" placeholder="spend %" value="{{$holder->spend_percent}}"><br/>
            <br/>
            <label for="save_percent">Account Holder Save %</label>
            <br/>
            <input type="text" name="save_percent" placeholder="save %" value="{{$holder->save_percent}}"><br/>
            <br/>
            <label for="give_percent">Account Holder Give %</label>
            <br/>
            <input type="text" name="give_percent" placeholder="give %" value="{{$holder->give_percent}}"><br/>
            <br/>
            <label for="user_id">Select a User</label>
            <br/>
            <select name="user_id" id="user_id">
                <option value="">Select a User{{$holder->user_id}}</option>
            @foreach($users as $user)
                <option value="{{$user['id']}}" {{ $holder->user_id == $user['id'] ? 'selected="selected"' : ''}} >{{$user['name']}}</option>
            @endforeach
            </select>
            <br/>
            <br/>
            <br/>

            <button>Edit Account Holder</button>
        </form>
    </div>
</body>
</html>