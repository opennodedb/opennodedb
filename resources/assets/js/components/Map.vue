<template>
<div id="map">
</div>
</template>

<style>
html, body, #app {
    height: 100%;
    margin: 0;
}
.navbar-default {
    background-color:rgba(255,255,255,0.3);
    color: #000;
}
.navbar-default .navbar-brand, .navbar-default .navbar-nav {
    color: #000;
}
#map-container {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    padding: 0;
    margin: 0;
    display: block;
}
#map {
    min-height: 100%;
    height: 100%;
    width: 100%;
}
.leaflet-top {
    top: 50px;
}
</style>

<script>
export default {
    mounted() {
        var map = L.map('map').setView([-34.9285, 138.6007], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        kitsu.get('nodes').then((response) => {
            response.data.forEach((node) => {
               L.marker([node.lat, node.lng]).addTo(map)
                    .bindPopup(node.name);
            });
        });

        kitsu.get('links', {include: 'source,destination'}).then((response) => {
            response.data.forEach((link) => {
            console.log(link);
                L.polyline([
                    [link.source.lat, link.source.lng],
                    [link.destination.lat, link.destination.lng],
                ], {color: 'green'}).addTo(map);
            });
        });

       }
}
</script>
