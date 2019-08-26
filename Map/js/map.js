var map;
var geocoder;

function loadMap() {
    var latLng = { lat: 14.5794, lng: 121.0359 };
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: latLng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });


    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    geocoder = new google.maps.Geocoder();
    codeAddress(cdata);

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showAllColleges(allData)
}

function showAllColleges(allData) {
    var infoWind = new google.maps.InfoWindow;
    Array.prototype.forEach.call(allData, function (data) {
        var content = document.createElement('div');
        var strong = document.createElement('strong');

        strong.textContent = data.address;
        content.appendChild(strong);

        var content = document.createElement('div');
        var address = document.createElement('p');
        var text = document.createElement('p');
        var output = [];
        var output_symptoms = [];
        var output_result = [];
        address.textContent = "Street: " + data.address;
        text.textContent = "List of disease";
        content.appendChild(address);
        content.appendChild(text);

        for (var results in allData) {
            if (data.address == allData[results].address) {
                var result = {
                    disease: allData[results].disease_name,
                    total: allData[results].total,
                    symptoms: []
                }

                //check if disease already exist in array of object
                if (output_result.filter(item => item.disease == allData[results].disease_name).length == 0) {
                    output_result.push(result)
                }

                //loop yugn disease
                //then push yugn symptoms sa disease na meron siya
                output_result.forEach(function (output) {
                    if (output.disease === allData[results].disease_name) {
                        output.symptoms.push("Symptoms (" + allData[results].symptoms_name + ") Total: (" + allData[results].count + ")")
                    }
                });

            }
        }

           for(i=0; i<output_result.length;i++)
           {
        	var disease = document.createElement('p');
        	disease.textContent = "Type of disease: (" + output_result[i].disease + ") Total cases: (" + output_result[i].total + ")"
            content.appendChild(disease);

            for(i=0; i<output_result.length;i++)
            {
                output_result.forEach(function (output) {
                        var symptoms = document.createElement('p');
                        symptoms.textContent = output_result[i].symptoms[x];
                        content.appendChild(symptoms);  
                });
            }

           }



        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map: map
        });

        marker.addListener('click', function () {
            infoWind.setContent(content);
            infoWind.open(map, marker);
        })


    })
}


function codeAddress(cdata) {
    Array.prototype.forEach.call(cdata, function (data) {
        var address = data.address;
        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var points = {};
                points.id = data.id;
                points.lat = map.getCenter().lat();
                points.lng = map.getCenter().lng();
                updateCollegeWithLatLng(points);
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    });
}

function updateCollegeWithLatLng(points) {
    $.ajax({
        url: "action.php",
        method: "post",
        data: points,
        success: function (res) {
            console.log(res)
        }
    })

}