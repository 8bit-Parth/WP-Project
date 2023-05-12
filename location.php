<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script>
    function initMap(latitude, longitude) {
        // Create a new map centered on the image location
        let map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
            zoom: 12
        });
        // Add a marker at the image location
        let marker = new google.maps.Marker({
            position: {lat: parseFloat(latitude), lng: parseFloat(longitude)},
            map: map,
            title: 'Image location'
        });
    }
    // Call the initMap function with the appropriate latitude and longitude values
    initMap(LATITUDE_VALUE, LONGITUDE_VALUE);
</script>