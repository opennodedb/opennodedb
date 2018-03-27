<template>
<div id="map">
</div>
</template>

<style>
#map {
    height: 600px;
    width: 100%;
}
</style>

<script>
export default {
    mounted() {
        var map = L.map('map').setView([-34.9285, 138.6007], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        kitsu.get('nodes').then((response) => {
            response.data.forEach((node) => {
               L.marker([node.lat, node.lng]).addTo(map)
                    .bindPopup(node.name);
            });
        });

        kitsu.get('connections', {include: 'source,destination'}).then((response) => {
            response.data.forEach((connection) => {
            console.log(connection);
                L.polyline([
                    [connection.source.lat, connection.source.lng],
                    [connection.destination.lat, connection.destination.lng],
                ], 'red').addTo(map);
            });
        });

       }
}
</script>
