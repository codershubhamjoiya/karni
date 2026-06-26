@include('layouts.header')

<div style="max-width: 600px; margin: 30px auto; padding: 25px; border: 1px solid #ddd; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); background: #fff;">
    <h2 style="margin-top: 0; color: #333;">My Profile</h2>

    <div style="margin-bottom: 12px;">
        <strong>Name:</strong> {{ $user->name }}
    </div>
    <div style="margin-bottom: 12px;">
        <strong>Email:</strong> {{ $user->email }}
    </div>
    <div style="margin-bottom: 12px;">
        <strong>Phone:</strong> {{ $user->phone }}
    </div>
    <div style="margin-bottom: 20px;">
        <strong>Role:</strong> {{ ucfirst($user->role) }}
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" style="padding: 10px 16px; background: #dc3545; color: white; border: none; border-radius: 6px; cursor: pointer;">
            Logout
        </button>
    </form>
</div>
