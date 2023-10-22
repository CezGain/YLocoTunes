
    <x-template :showHeader="true">
        <script src="https://kit.fontawesome.com/f98f7366b1.js" crossorigin="anonymous"></script>
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
        <div class="text-4xl text-white text-center">Filtres actifs : @php echo $_GET['styleData'] ?? ''; @endphp</div><br>
        @if(Auth::check())
        <div class="flex justify-center items-center h-screen">
            <div>
                <form action="/add-filters-template" method="get" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-4 px-4 border border-gray-400 rounded shadow text-center">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="filterName" name="nameTemplate" type="text" placeholder="Nom de ma sauvegarde">
                    <input type="hidden" name="styleData" value="{{$_GET['styleData']}}">
                    <input type="hidden" name="type" value="artists">
                    <button class="w-full pt-2" type="submit">Sauvegarder ma recherche</button>
                </form>
                <br>
                <form action="/loadsearch" method="get" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-4 px-4 border border-gray-400 rounded shadow text-center">
                    <select name="styleData" multiple id="countries_multiple" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($filtersTemplates as $filter)
                            <option value="{{ $filter['lines'] }}">{{ $filter['template']['nameTemplate'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="type" value="artists">
                    <button class="w-full pt-2" type="submit">Charger ma recherche</button>
                </form>
            </div>
        </div>
        @endif

        <div class="container overflow-y-auto">
            @foreach($data as $index => $item)
                @dump($item)
                <div class="artist-card">
                    <div class="artist-name">{{ $item['artistLabel']['value'] }}</div>
                    {{-- @if($index < sizeof($data))
                        @foreach($musics[$index] as $music)
                            <div>{{$music['title']}}</div>
                        @endforeach
                    @else
                        <div>No music.</div>
                    @endif --}}

                    @if(Auth::check())
                    <div class="flex">
                            @if(Auth::check())
                            <form action="" method="post" class="px-2">
                                <button type="submit"><i class="fa-regular fa-heart"></i></button>
                                <label for="artist" name="nbLikes" class="sr-only">0</label>
                            </form>
                            @else
                            <form action="" method="post" class="px-2">
                                <button type="submit"><i class="fa-solid fa-heart"></i></button>
                                <label for="artist" name="nbLikes" class="sr-only">0</label>
                            </form>
                            @endif

                            @if(in_array($item['artistLabel']['value'], $favoriteArtists))
                                    <form action="/delete-favorite-artist/{{ Auth::user()->getAuthIdentifier() }}/{{ $item['artistLabel']['value'] }}" method="get" class="px-2">
                                        <button type="submit"><i class="fa-solid fa-star"></i></button>
                                    </form>
                            @else
                                    <form action="/add-favorite-artist/{{ $item['artistLabel']['value'] }}" method="get" class="px-2">
                                        <button type="submit"><i class="fa-regular fa-star"></i></button>
                                    </form>
                            @endif
                    </div>
                    @endif

                </div>
            @endforeach
        </div>
    </x-template>

