<x-template showHeader="true">
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

        .event-card  {
            color : black;
            background-color: white;
            border-radius: 8px;
            padding: 10px;
            text-align: left;
            cursor: pointer;
        }

        .event-name {
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
    <div class="text-4xl text-white text-center">Résultats autour de @php echo $_COOKIE['inputValue']; @endphp</div>
    <div class="container overflow-y-auto">
        @foreach($eventsData as $event)
            <div class="event-card" onclick="location.href='{{$event['url']}}'">
                <div class="event-name">{{ $event['name'] }}</div>
            </div>
        @endforeach

    </div>
</x-template>
