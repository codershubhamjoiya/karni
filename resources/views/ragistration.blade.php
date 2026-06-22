@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="{{ route('user.store')}}" method="POST">
    @csrf
    <label for="">Name-:</label> 
    <input type="text" name="name" placeholder="Enter your name" >
    <br><br>

    <label for="">Email-:</label> 
    <input type="text" name="email" placeholder="Enter your email">
    <br><br>

    <label for="">Re-Enter email-:</label> 
    <input type="text" name="confirm_email" placeholder="Re-Enter your email">
    <br><br>

    <label for=""> Phone no-:</label> 
    <input type="number" name="phone" placeholder="Enter your number" >
    <br><br>

    <label for="">Re-enter phone no-:</label> 
    <input type="number" name="confirm_phone" placeholder="Re-Enter your number">
    <br><br>

    <label for="">Password</label>
    <input type="password" name="password" placeholder="Create Password">
    <br><br>

    
    <label for="">Password</label>
    <input type="password" name="confirm_password" placeholder="Confirm Password">
    <br><br>

    <label for="">Role-:</label> 
    <select name="role" id="role">
        <option value="customer">Customer</option>
        <option value="seller">Seller</option>
    </select>
    <br><br>

    <button  type="submit" onclick="return confirm('are you sure too create account')">submit</button>

</form>