<table border="dark">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Password</th>
    </thead>
    @foreach($data as $user)
    <tbody>
        <td>{{ $user->id }}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->password}}</td>
        
    </tbody>
    @endforeach
</table>