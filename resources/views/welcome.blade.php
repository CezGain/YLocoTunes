<x-template>
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-lighter bg-center bg-gray-800 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Panel</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-400 hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inscription</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="https://cdn.discordapp.com/attachments/1158671272331460638/1159073991739314206/5dfcbb2ebf5a4492911803a08e44ccc0-removebg-preview.png?ex=651e8f46&is=651d3dc6&hm=f0dea518a8a8a083e98a9be9fd721314bbfeeb666f524350d397a1b9f93b0d94&"
                    alt="logo" border="0" class="w-20 h-20">
            </div>
            <div class="p-4 m-10">
                <form class="flex justify-center items-center" onsubmit="return validateForm()">
                    <input type="text" id="myInput" placeholder="Cliquez pour localiser"
                        class="text-center text-white bg-gray-800 min-w-[250px] p-2 border rounded-l-lg w-1/2" readonly
                        required>
                    <button type="submit">
                        <div
                            class="bg-green-700 border border-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-r-lg">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19  19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
            <script>
                function validateForm() {
                    var inputValue = document.getElementById("myInput").value;
                    if (inputValue.trim() === "") {
                        alert("Veuillez cliquer dans le champ pour connaitre votre localisation.");
                        return false; // Empêche l'envoi du formulaire
                    }
                    document.cookie = "inputValue=" + inputValue +";";
                    window.location.href = "/filters";
                    return false; // Le formulaire sera soumis si le champ de texte contient une valeur
                }

                document.getElementById('myInput').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        document.getElementById('myInput').placeholder = 'Chargement en cours...';
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;

                            // Appel à l'API de géocodage inversé OpenStreetMap Nominatim
                            var apiUrl =
                                `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;

                            fetch(apiUrl)
                                .then(function(response) {
                                    return response.json();
                                })
                                .then(function(data) {
                                    // Récupération de la ville à partir des résultats
                                    var city = data.address.city;

                                    // Mise à jour du texte de myInput avec le nom de la ville
                                    if (city) {
                                        document.getElementById('myInput').value = city;
                                    } else {
                                        document.getElementById('myInput').value =
                                            'Impossible de déterminer la ville.';
                                    }
                                })
                                .catch(function(error) {
                                    // Gérer les erreurs de géocodage ici
                                    document.getElementById('myInput').value =
                                        'Erreur lors de la récupération de la ville : ' + error.message;
                                });
                        }, function(error) {
                            // Gérer les erreurs de géolocalisation ici
                            document.getElementById('myInput').value = 'Impossible d\'obtenir votre position : ' +
                                error.message;
                        });
                    } else {
                        // Le navigateur ne prend pas en charge la géolocalisation
                        document.getElementById('myInput').value =
                            'La géolocalisation n\'est pas prise en charge par votre navigateur.';
                    }
                });
            </script>
            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4 select-none">
                        <a href="https://github.com/CezGain/YLocoTunes/tree/main" target="_blank"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <script src="https://kit.fontawesome.com/f98f7366b1.js" crossorigin="anonymous"></script>
                            <i class="fa-brands fa-github text-base"></i>
                        </a>
                    </div>
                </div>

                <div
                    class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0 select-none">
                    YLocoTunes v1.0.0
                </div>
            </div>
        </div>
    </div>
</x-template>
