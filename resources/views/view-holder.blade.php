<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Account Holder Details</title>
    <style>
        a.button {
            padding: 1px 6px;
            border: 1px outset buttonborder;
            border-radius: 3px;
            color: buttontext;
            background-color: buttonface;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div style="border : 3px solid black;">
        <h1>Account Holder Details</h1>
    
        <div class="card" style="border: 3px solid gray;">
            <div class="card-header">
                Account Holder Information
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $holder->name }}</p>
                <p><strong>Birthdate:</strong> {{ $holder->birthday }}</p>
                <p><strong>Age:</strong> {{ $holder->age }}</p>
                <p><strong>Weekly Rate:</strong> ${{ $holder->rate }}</p>
                <p><strong>Spend Percent:</strong> {{ $holder->spend_percent }}%</p>
                <p><strong>Save Percent:</strong> {{ $holder->save_percent }}%</p>
                <p><strong>Give Percent:</strong> {{ $holder->sgive_percent }}%</p>
                <p><strong>User:</strong> {{ $holder->user->name }}</p>
            </div>
        </div>
        <div class="card" style="border: 3px solid gray;">
            <div class="card-header">
                Associated Accounts
            </div>
            <div class="card-body" style="border : 3px solid black;">
                @foreach($accounts as $account)
                    <div style="background-color: gray; padding: 10px; margin: 10px;">
                        <h3>{{$account->nickname}} | <a href="/view-account/{{$account->id}}">View</a> | <a href="/edit-account/{{$account->id}}">Edit</a></h3>
                    </div>
                @endforeach
            </div>
        </div>
        <br/>
        <a href="/" class="button">Back</a>
        <br/>
        <br/>
    </div>
</body>
</html>