<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Patient Profile</h1>
        <div id="patient-details">
            <h2>Patient Name: <span id="patient-name"></span></h2>
        </div>

        <div>
            <h2>Surgeries:</h2>
            <ul id="surgeries-list"></ul>
        </div>

        <div>
            <h2>Photos:</h2>
            <div id="photos-list"></div>
        </div>
    </div>

    <script>
    // Function to extract patient ID from URL
    function getPatientId() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('id');
    }

    // Function to fetch data from API
    async function fetchData(endpoint) {
        const response = await fetch(endpoint);
        return response.json();
    }

    async function loadPatientData() {
        const patientId = getPatientId();

        if (patientId) {
            // Fetch patient details
            const patient = await fetchData('api.php?action=get_patient&id=' + patientId);
            document.getElementById('patient-name').innerText = patient.name;

            // Fetch surgeries
            const surgeries = await fetchData('api.php?action=get_surgeries&patient_id=' + patientId);
            const surgeriesList = document.getElementById('surgeries-list');
            surgeries.forEach(surgery => {
                const li = document.createElement('li');
                li.innerText = surgery.name + ' - ' + surgery.date;
                surgeriesList.appendChild(li);
            });

            // Fetch photos
            const photos = await fetchData('api.php?action=get_photos&patient_id=' + patientId);
            const photosList = document.getElementById('photos-list');
            photos.forEach(photo => {
                const img = document.createElement('img');
                img.src = 'uploads/patient_' + patientId + '/' + photo.path;
                img.alt = 'Patient Photo';
                img.style.maxWidth = '200px';
                photosList.appendChild(img);
            });
        } else {
            document.getElementById('patient-details').innerText = 'Patient ID not provided.';
        }
    }

    // Load data on page load
    window.onload = loadPatientData;
    </script>
</body>

</html>