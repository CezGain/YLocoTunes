
    <x-template :showHeader="true">
        <!-- Styles -->
        <style>
            body {
                background-color: black;
                color: white;
            }

            .container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                grid-gap: 20px;
                justify-content: center;
                margin: 5vh 5vw;
                padding: 2%;
            }

            .artist-card {
                color : black;
                background-color: white;
                border-radius: 8px;
                padding: 10px;
                text-align: left;
            }

            .artist-name {
                font-size: 1.2rem;
                font-weight: 600;
            }
        </style>
        <div class="text-4xl text-white text-center">Résultat autour de @php echo $_COOKIE['inputValue']; @endphp</div>
        <div class="container">
            @foreach($data as $item)
                <div class="artist-card">
                    <div class="artist-name">{{ $item['name'] }}</div>
                    <div>{{ $item['musique'] }}</div>
                    <div>{{ $item['id'] }}</div>
                </div>
            @endforeach
        </div>
    </x-template>
