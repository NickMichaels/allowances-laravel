<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a New Account</title>
</head>
<body>

    <div style="border : 3px solid black;">
        <h1>Create a New Account</h1>
        <form action="/create-account/" method="POST">
            @csrf
            <label for="nickname">Account Nickname</label>
            <br/>
            <input type="text" name="nickname" placeholder="account nickname"><br/>
            <br/>
            <label for="account_type">Account Type</label>
            <br/>
            <select name="account_type">
                @foreach($accountTypes::values() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            <br/>
            <br/>
            <label for="holder_id">Select an Account Holder</label>
            <br/>
            <select name="holder_id" id="holder_id">
                <option value="">Select an Account Holder</option>
                @foreach($holders as $holder)
                    <option value="{{$holder['id']}}">{{$holder['name']}}</option>
                @endforeach
            </select>
            <br/>
            <br/>
            <br/>

            <button>Create Account</button>
        </form>
    </div>
</body>
</html>