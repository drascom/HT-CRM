document.addEventListener('DOMContentLoaded', function() {
    // Find all buttons with the class 'create-record-btn'
    const buttons = document.querySelectorAll('.create-record-btn');

    // Add a click event listener to each button
    buttons.forEach(button => {
        button.addEventListener('click', async function() {
            // Get the date and patient name from data attributes
            const date = this.getAttribute('data-date');
            let patientName = this.getAttribute('data-patient-name'); // Use let as we might modify it

            // Disable the button and show loading indicator
            this.disabled = true;
            this.textContent = 'Creating...';

            try {
                // Remove "C-" prefix from patient name if it exists
                if (patientName.startsWith('C-')) {
                    patientName = patientName.substring(2).trim(); // Remove "C-" and trim whitespace
                }

                // 1. Create Patient Record
                const patientFormData = new FormData();
                patientFormData.append('entity', 'patients'); // Corrected parameter name
                patientFormData.append('action', 'add');
                patientFormData.append('name', patientName);
                patientFormData.append('dob', ''); // Include dob as an empty string as requested
                // Omitting user_id as it is not available from the sheet

                const patientResponse = await fetch('api.php', {
                    method: 'POST',
                    body: patientFormData,
                });

                const patientData = await patientResponse.json();

                if (!patientData.success) {
                    throw new Error('Error creating patient: ' + (patientData.error || 'Unknown error'));
                }

                const patientId = patientData.patient.id; // Assuming the patient ID is returned in patient.id

                // 2. Create Surgery Record
                const surgeryFormData = new FormData();
                surgeryFormData.append('entity', 'surgeries'); // Corrected parameter name
                surgeryFormData.append('action', 'add');
                surgeryFormData.append('patient_id', patientId);
                surgeryFormData.append('date', date);
                surgeryFormData.append('status', 'booked'); // Updated status as requested
                surgeryFormData.append('graft_count', 0); // Added graft_count as requested
                surgeryFormData.append('notes', ''); // Added notes as an empty string

                const surgeryResponse = await fetch('api.php', {
                    method: 'POST',
                    body: surgeryFormData,
                });

                const surgeryData = await surgeryResponse.json();

                if (surgeryData.success) {
                    this.textContent = 'Created!';
                    this.classList.remove('btn-primary');
                    this.classList.add('btn-success');
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
            }
        });
    });
});