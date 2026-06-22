@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('login.check') }}" method="POST">
    @csrf

    <label>User Email-:</label>
    <input type="email" name="email"  value="test@gmail.com" placeholder="Enter your email">
    <br><br>

    <label>Password-:</label>
    <input type="password" name="password" value="123456" placeholder="Password">
    <br><br>

    <button type="submit" onclick="return confirm('Are you sure to login')">Login</button>
</form>
