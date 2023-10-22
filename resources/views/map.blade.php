<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chroma-js/2.1.1/chroma.min.js"></script>


<x-template :showHeader="true">
    <div id="map" style="height: 500px;"></div>
</x-template>
<script>
    var map = L.map('map').setView([21, 54], 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    var data = @json($data);
    function getColor(count) {
        var scale = chroma.scale(['yellow', 'darkred']).domain([0, 40]); // Ajustez la plage de valeurs en fonction de vos données
        return scale(count).hex();
    }

    if (Array.isArray(data)) {
        data.forEach(function (item) {
            console.log(item);
            L.circle([item.lat, item.lon], {
                color: getColor(item.count),
                fillOpacity: 0.7,
                radius: item.count *10000
            }).addTo(map);
        });
    } else {
        console.error('dataj n\'est pas un tableau JSON valide.');
    }
</script>


