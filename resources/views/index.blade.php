@include('layouts.header')
<div style="padding: 20px;">
    <h2>Admin Users Panel</h2>
    <p>All registered users are listed below.</p>
    <p>Total users: {{ $totalUsers }}</p>

    @if($data->isEmpty())
        <p>No users found.</p>
    @else
    <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>