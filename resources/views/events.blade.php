<x-template showHeader="true">
    <div class="relative sm:flex sm:justify-center sm:items-center selection:bg-red-500 selection:text-white"
        style="height: 100%">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="https://cdn.discordapp.com/attachments/1158671272331460638/1159073991739314206/5dfcbb2ebf5a4492911803a08e44ccc0-removebg-preview.png?ex=651e8f46&is=651d3dc6&hm=f0dea518a8a8a083e98a9be9fd721314bbfeeb666f524350d397a1b9f93b0d94&"
                    alt="logo" border="0" class="w-20 h-20">
            </div>
            <div class="p-4 m-10">
                <input type="text" id="myInput" placeholder="Cliquez pour localiser"
                    class="text-center text-white bg-gray-800 min-w-[250px] p-2 border rounded w-1/2"
                    style="cursor: pointer;" readonly required/>
            </div>
            <script>
                function isLocation() {
                    const inputValue = document.getElementById("myInput").value;
                    if (inputValue.trim() === "") {
                        alert("Veuillez cliquer dans le champ pour connaitre votre localisation.");
                        return false; // Empêche l'envoi du formulaire
                    }
                    document.cookie = "inputValue=" + inputValue + ";";
                    return true; // Le formulaire sera soumis si le champ de texte contient une valeur
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
                                        document.getElementById('myInput').placeholder =
                                            'Ville introuvable.';
                                    }
                                })
                                .catch(function(error) {
                                    // Gérer les erreurs de géocodage ici
                                    document.getElementById('myInput').placeholder =
                                        'Erreur de récupération';
                                });
                        }, function(error) {
                            // Gérer les erreurs de géolocalisation ici
                            document.getElementById('myInput').placeholder = 'Position introuvable';
                        });
                    } else {
                        // Le navigateur ne prend pas en charge la géolocalisation
                        document.getElementById('myInput').placeholder =
                            'La localisation n\'est pas dispo.';
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
