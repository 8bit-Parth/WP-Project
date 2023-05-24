<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
    function initMap(latitude, longitude) {
        let map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
            zoom: 12
        });
        let marker = new google.maps.Marker({
            position: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
            map: map,
            title: 'Image location'
        });
    }
    initMap(LATITUDE_VALUE, LONGITUDE_VALUE);
</script>