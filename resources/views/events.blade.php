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
    @if(Auth::check())
        <br>
        <div class="flex justify-center items-center h-screen">
            <div>
                <form action=".." method="post" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-4 px-4 border border-gray-400 rounded shadow text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="filterName" type="text" placeholder="Nom de ma sauvegarde">
                    <button class="w-full pt-2" type="submit">Sauvegarder ma recherche</button>
                </form>
                <br>
                <form action="artists?_token=" method="post" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-4 px-4 border border-gray-400 rounded shadow text-center">
                    <select multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>toto</option>
                    </select>
                    <button class="w-full pt-2" type="submit">Charger ma recherche</button>
                </form>
            </div>
        </div>
    @endif
    <div class="container overflow-y-auto">
        @foreach($eventsData as $event)
            <div class="event-card" onclick="location.href='{{$event['url']}}'">
                <div class="event-name">{{ $event['name'] }}</div>
            </div>
        @endforeach

    </div>
</x-template>
