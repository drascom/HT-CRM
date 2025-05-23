// Function to fetch data from API
async function fetchData(endpoint) {
    try {
        const response = await fetch(endpoint);
        if (!response.ok) {
            const errorText = await response.text(); // Read response text for debugging
            console.error('HTTP error response:', errorText); // Log the error response text
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const responseText = await response.text(); // Read response text
        console.log('Raw API response:', responseText); // Log the raw response
        try {
            return JSON.parse(responseText); // Manually parse JSON
        } catch (jsonError) {
            console.error('JSON parsing error:', jsonError, 'Response text:', responseText);
            throw new Error('Failed to parse JSON response.');
        }
    } catch (error) {
        console.error('Fetch error:', error);
        return null;
    }
}

function sanitizeHTML(str) {
    var temp = document.createElement('div');
    temp.textContent = str;
    return temp.innerHTML;
}

async function loadPatientProfileData(patientId) {
    if (!patientId) {
        document.getElementById('patient-details').innerText = 'Patient ID not provided.';
        return;
    }

    // Fetch patient details
    const patient = await fetchData('api.php?entity=patients&action=get&id=' + patientId);
    if (patient && patient.patient && patient.patient.name) { // Access nested patient object
        document.getElementById('patient-name').innerText = sanitizeHTML(patient.name);
    } else {
        document.getElementById('patient-name').innerText = 'Patient data not found.';
    }


    // Fetch surgeries
    const surgeriesData = await fetchData('api.php?entity=surgeries&action=list&patient_id=' + patientId);
    const surgeriesList = document.getElementById('surgeries-list');
    surgeriesList.innerHTML = ''; // Clear existing list
    if (surgeriesData && surgeriesData.surgeries && surgeriesData.surgeries.length > 0) { // Access nested surgeries array
        const surgeries = surgeriesData.surgeries;
        surgeries.forEach(surgery => {
            const li = document.createElement('li');
            li.innerText = sanitizeHTML(surgery.name) + ' - ' + sanitizeHTML(surgery.date);
            surgeriesList.appendChild(li);
        });
    } else {
        const li = document.createElement('li');
        li.innerText = 'No surgeries found.';
        surgeriesList.appendChild(li);
    }


    // Fetch photos
    const photosData = await fetchData('api.php?entity=photos&action=list&patient_id=' + patientId);
    const photosList = document.getElementById('photos-list');
    photosList.innerHTML = ''; // Clear existing list

    if (photosData && photosData.photos && photosData.photos.length > 0) { // Access nested photos array
        const photos = photosData.photos;
        // Group photos by category
        const categorizedPhotos = photos.reduce((acc, photo) => {
            const pathParts = photo.path.split('/');
            const category = pathParts.length > 1 ? pathParts[0] : 'Uncategorized';
            if (!acc[category]) {
                acc[category] = [];
            }
            acc[category].push(photo);
            return acc;
        }, {});

        // Display categorized photos
        for (const category in categorizedPhotos) {
            const categoryDiv = document.createElement('div');
            const categoryTitle = document.createElement('h3');
            categoryTitle.innerText = sanitizeHTML(category);
            categoryDiv.appendChild(categoryTitle);

            const photoContainer = document.createElement('div');
            photoContainer.style.display = 'flex'; // Simple styling for display
            photoContainer.style.flexWrap = 'wrap';

            categorizedPhotos[category].forEach(photo => {
                const img = document.createElement('img');
                img.src = 'uploads/patient_' + patientId + '/' + photo.path;
                img.alt = 'Patient Photo';
                img.style.maxWidth = '200px';
                img.style.margin = '5px'; // Add some spacing
                photoContainer.appendChild(img);
            });

            categoryDiv.appendChild(photoContainer);
            photosList.appendChild(categoryDiv);
        }
    } else {
        const p = document.createElement('p');
        p.innerText = 'No photos found.';
        photosList.appendChild(p);
    }
}

// The patientId is now passed from the PHP file
// window.onload = () => loadPatientProfileData(patientId); // This will be called from the inline script in patient.php