@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('login.check') }}" method="POST">
    @csrf

    <label>User Email-:</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
    <br><br>

    <label>Password-:</label>
    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit" onclick="return confirm('Are you sure to login')">Login</button>
</form>
