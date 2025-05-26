document.addEventListener('DOMContentLoaded', function() {
    // Find all buttons with the class 'create-record-btn'
    const buttons = document.querySelectorAll('.create-record-btn');

    buttons.forEach(button => {
        // Check the data-recorded attribute on page load
        const isRecorded = button.getAttribute('data-recorded') === 'true';

        if (isRecorded) {
            button.textContent = 'Recorded';
            button.classList.remove('btn-primary');
            button.classList.add('btn-success');
            button.disabled = true; // Disable the button if already recorded
        }

        // Add a click event listener to each button (only active for non-disabled buttons)
        button.addEventListener('click', async function() {
            // Get the date and patient name from data attributes
            const date = this.getAttribute('data-date');
            let patientName = this.getAttribute('data-patient-name'); // Use let as we might modify it

            // Disable the button and show loading indicator
            this.disabled = true;
            this.textContent = 'Processing...'; // Changed text to Processing

            try {
                // Remove "C", "-", and any surrounding spaces prefix from patient name if it exists
                // Use regex to remove "C", optional spaces, "-", optional spaces at the beginning
                const cleanedPatientName = patientName.replace(/^C\s*-\s*/, '').trim(); // Use a new variable for cleaned name

                let patientId;
                let createNewPatient = true; // Assume creating new by default

                // 1. Check if patient already exists
                const lookupResponse = await fetch(`api.php?entity=patient_lookup&action=find_by_name&name=${encodeURIComponent(cleanedPatientName)}`);
                const lookupData = await lookupResponse.json();

                if (lookupData.success && lookupData.patient) {
                    // Patient found, prompt user with rephrased message
                    const confirmMessage = `Patient "${cleanedPatientName}" already exists. Click OK to create a NEW patient record with this name, or Cancel to use the EXISTING patient record.`;
                    createNewPatient = confirm(confirmMessage); // true if OK (create new), false if Cancel (use existing)

                    if (!createNewPatient) {
                        patientId = lookupData.patient.id; // Use existing patient ID
                        this.textContent = 'Using existing patient...';
                    } else {
                        // User chose to create a new patient with the same name
                        this.textContent = 'Creating new patient...';
                        // Proceed to create a new patient as before
                    }
                } else {
                    // Patient not found, proceed to create a new patient (createNewPatient is already true)
                    this.textContent = 'Creating new patient...';
                }

                // If user chose to create a new patient OR patient was not found
                if (createNewPatient) { // Logic updated based on user feedback
                    const patientFormData = new FormData();
                    patientFormData.append('entity', 'patients');
                    patientFormData.append('action', 'add');
                    patientFormData.append('name', cleanedPatientName); // Use cleaned name
                    patientFormData.append('dob', '');
                    // Omitting user_id

                    const patientResponse = await fetch('api.php', {
                        method: 'POST',
                        body: patientFormData,
                    });

                    const patientData = await patientResponse.json();

                    if (!patientData.success) {
                        throw new Error('Error creating patient: ' + (patientData.error || 'Unknown error'));
                    }
                    patientId = patientData.patient.id; // Get ID of the newly created patient
                }

                // 2. Create Surgery Record using the determined patientId
                this.textContent = 'Creating surgery...';
                const surgeryFormData = new FormData();
                surgeryFormData.append('entity', 'surgeries');
                surgeryFormData.append('action', 'add');
                surgeryFormData.append('patient_id', patientId);
                surgeryFormData.append('date', date); // Use the original date format from data attribute (yyyy-mm-dd)
                surgeryFormData.append('is_recorded', true);
                surgeryFormData.append('status', 'booked');
                surgeryFormData.append('graft_count', 0);
                surgeryFormData.append('notes', '');

                const surgeryResponse = await fetch('api.php', {
                    method: 'POST',
                    body: surgeryFormData,
                });

                const surgeryData = await surgeryResponse.json();

                if (surgeryData.success) {
                    this.textContent = 'Recorded'; // Change text to Recorded on successful creation
                    this.classList.remove('btn-primary');
                    this.classList.add('btn-success');
                    this.disabled = true; // Disable button after successful creation
                    // Optionally, do something else on success, like refreshing the table
                } else {
                    throw new Error('Error creating surgery: ' + (surgeryData.error || 'Unknown error'));
                }

            } catch (error) {
                this.textContent = 'Error';
                this.classList.remove('btn-primary');
                this.classList.add('btn-danger');
                console.error('API Error:', error);
                alert('Error creating records: ' + error.message); // Show an alert with the error message
                // Re-enable button on error if it wasn't initially recorded
                 if (!isRecorded) {
                    this.disabled = false;
                    this.textContent = 'Create Records'; // Revert text on error
                    this.classList.remove('btn-danger');
                    this.classList.add('btn-primary');
                }
            }
        });
    });
});