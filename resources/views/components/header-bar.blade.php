<div
    style="height: 10%; width: 100%; background-color: rgba(0, 0, 0, 0.25); display: flex; align-items:center; justify-content: flex-end; padding-right: 6%">
    @auth
        <a href="{{ url('/profile') }}" style="color: white; font-size: 140%;">Profile</a>
    @else
        <a href="{{ route('login') }}" style="color: white; font-size: 140%;">Login</a>
    @endauth
</div>
