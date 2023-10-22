<div
    style="height: 10%; width: 100%; background-color: rgba(0, 0, 0, 0.25); display: flex; align-items:center; justify-content: flex-end; padding-right: 6%">
    @auth
        <a href="{{ url('..') }}" style="color: white; font-size: 140%; margin-right: 20px">Accueil</a>
        <a href="{{ url('/map') }}" style="color: white; font-size: 140%; margin-right: 20px">Carte</a>
        <a href="{{ url('/profile') }}" style="color: white; font-size: 140%; margin-right: 20px">Profil</a>
        <a href="{{ url('/delete-favorite-artist/2/sqds') }}" style="color: white; font-size: 140%; margin-right: 20px">siuuu</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" style="color: white; font-size: 140%;">Déconnexion</button>
        </form>
    @else
        <a href="{{ url('..') }}" style="color: white; font-size: 140%; margin-right: 20px">Accueil</a>
        <a href="{{ url('/map') }}" style="color: white; font-size: 140%; margin-right: 20px">Carte</a>
        <a href="{{ route('login') }}" style="color: white; font-size: 140%;">Connexion</a>
    @endauth
</div>
