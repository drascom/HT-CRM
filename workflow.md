# Instructions for Coder AI Assistant: Migrate Project to Next.js

**Objective:** Recreate the frontend of the existing application in Next.js. The existing backend API handlers should remain separate and will be consumed by the new Next.js frontend.

**Current Project Overview:**

The current project is a web application primarily built with PHP for page rendering, vanilla JavaScript for frontend logic and API interaction, and CSS for styling.

**Key Files and Apparent Roles (Frontend Focus):**

*   `public/add_appointment copy.php`: Renders the page/form for adding appointments. (Note: This file was not found during analysis, its specific workflow is not detailed below).
*   `public/add_edit_surgery.php`: Renders the page/form for adding or editing surgery details.
*   `public/appointments.php`: Renders the page for displaying and managing appointments.
*   `public/google.php`: Renders a page likely related to Google integration (e.g., calendar authentication/display).
*   `public/assets/css/calendar.css`: Provides styling for calendar components.
*   `public/assets/css/style.css`: Provides general application styling.
*   `public/assets/css/tech.css`: Provides styling for specific technical components.
*   `public/assets/js/api-helper.js`: Contains JavaScript functions to assist with making API calls from the frontend.
*   `public/assets/js/patients.js`: Contains JavaScript logic related to patient management on the frontend.
*   `public/assets/js/script.js`: Contains general purpose frontend JavaScript logic.
*   `public/assets/js/transfer.js`: Contains JavaScript logic for data transfer or related operations on the frontend.
*   `public/assets/avatar.png`: A static image asset.
*   `public/calendar.php`: (Inferred) Likely provides a calendar view of appointments/surgeries.
*   `public/patient.php`: (Inferred) Likely provides a detailed view of a single patient.
*   `public/surgeries.php`: (Inferred) Likely provides a list view of surgeries.
*   `public/technicians.php`: (Inferred) Likely provides a list view of technicians.
*   `public/rooms.php`: (Inferred) Likely provides a list view of rooms.
*   `public/users.php`: (Inferred) Likely provides a list/management view of users (possibly admin only).

**Identified Entities and Related Concepts:**

Based on the file names and code analysis, the main entities and related concepts handled on the frontend include:

*   **Appointments:** Scheduled events, likely involving patients and rooms, with associated procedures and notes. Managed via `appointments.php` and potentially `add_appointment copy.php`.
*   **Patients:** Individuals receiving services. Managed via `patients.js` and forms within `add_edit_surgery.php` (for adding new patients) and `appointments.php` (for selecting patients). Patient details are likely viewed on a separate page (e.g., `patient.php` as referenced).
*   **Surgeries:** Procedures or events distinct from general appointments, potentially with specific details like graft count and assigned technicians. Managed via `add_edit_surgery.php`.
*   **Rooms:** Locations where appointments or surgeries take place. Listed and selected in forms on `appointments.php` and `add_edit_surgery.php`. Availability is checked based on date.
*   **Procedures:** Specific types of medical or cosmetic procedures associated with appointments or surgeries. Listed and selected in forms on `appointments.php` and potentially added via a modal.
*   **Technicians:** Personnel assigned to surgeries. Selected and managed via `add_edit_surgery.php`.
*   **Technician Availability:** The availability of technicians on specific dates, checked when assigning technicians to a surgery. Handled via API calls triggered from `add_edit_surgery.php`.
*   **Calendar:** A view for visualizing appointments and surgeries over time. Referenced in `appointments.php` (`calendar.php`).
*   **Users:** Individuals accessing the system with different roles (e.g., admin, editor, agent). Authentication is handled separately (`auth.php`), and roles affect frontend functionality (e.g., editor restrictions in `add_edit_surgery.php`).
*   **Patient Details:** Specific information about individual patients. While not fully detailed in the analyzed files, the reference to `patient.php` suggests a dedicated page for viewing and managing this information.

**Migration Task:**

Migrate the functionality and presentation of the pages rendered by the PHP files (`.php`) and the client-side logic in the JavaScript files (`.js`) to a Next.js application.

**Specific Requirements for the Next.js Migration:**

1.  **Project Setup:** Initialize a new Next.js project.
2.  **Page Routing:** Create corresponding pages in Next.js (using the `pages` directory or App Router) for the main PHP files (e.g., `/appointments`, `/add-appointment`, `/add-edit-surgery`, `/google`, `/calendar`, `/patients`, `/users`, `/patient/[id]`, `/surgeries`, `/technicians`, `/rooms`).
3.  **Component Development:**
    *   Recreate the UI elements and layouts currently generated by the PHP files using React components.
    *   Implement the client-side logic from the existing JavaScript files (`api-helper.js`, `patients.js`, `script.js`, `transfer.js`) within the appropriate React components or using Next.js patterns (e.g., hooks, data fetching methods).
4.  **API Interaction:** Adapt the API calls currently made using `api-helper.js` to use standard JavaScript `fetch` or a library like Axios within the Next.js components or data fetching functions (e.g., `getServerSideProps`, `getStaticProps`, or client-side fetching). The existing backend API endpoints should be consumed.
5.  **Styling:** Integrate the existing CSS styles (`.css` files) into the Next.js project. This could involve using CSS Modules, importing global stylesheets, or migrating to a different styling solution if preferred (e.g., styled-components, Tailwind CSS). Ensure the visual appearance matches the original application.
6.  **Asset Handling:** Include static assets like `avatar.png` in the appropriate Next.js directory (`public`).
7.  **Exclude Backend Logic:** This migration task is focused *only* on the frontend. Do not attempt to recreate or modify the backend API handler logic. The Next.js application should consume the existing API.

**Frontend Interaction with Entities/Concepts (Inferred Workflows):**

Based on the analyzed files and common web application patterns, here's how the frontend likely interacts with the requested entities/concepts:

### Calendar Workflow (`calendar.php` - Inferred):

*   **Purpose:** To provide a visual representation of scheduled appointments and surgeries over a period (day, week, month).
*   **Initial Load:** Requires user authentication. Fetches appointment and surgery data for the relevant time period using API calls (e.g., `apiRequest('appointments', 'listByDateRange')`, `apiRequest('surgeries', 'listByDateRange')`).
*   **User Interaction:**
    *   **Navigation:** Users navigate between different time periods (e.g., next/previous week/month). This triggers re-fetching data for the new period.
    *   **Viewing Details:** Clicking on an appointment or surgery event on the calendar likely navigates the user to a detail page (e.g., `appointments.php` for appointments, `add_edit_surgery.php` for surgeries, or dedicated detail pages).
    *   **Adding from Calendar:** Clicking on a specific date/time slot might navigate the user to an add form (e.g., `add_appointment.php` or `add_edit_surgery.php`), potentially pre-filling the date and time.
*   **Dynamic Elements:** Dynamically rendered calendar view, events populated from API data, navigation controls.

### Surgeries Workflow (`surgeries.php` - Inferred List View, `add_edit_surgery.php` - Form View):

*   **Purpose:** To list existing surgeries and provide functionality to add or edit them.
*   **List View (`surgeries.php` - Inferred):**
    *   **Initial Load:** Requires user authentication. Fetches a list of surgeries using an API call (e.g., `apiRequest('surgeries', 'list')`). Displays the surgeries in a table or list format. May include filtering or sorting options.
    *   **User Interaction:** Clicking on a surgery in the list navigates to the edit surgery form (`add_edit_surgery.php`) with the surgery ID. A button/link is likely available to navigate to the add surgery form (`add_edit_surgery.php` without an ID).
*   **Form View (`add_edit_surgery.php` - Analyzed):** See the detailed workflow for `public/add_edit_surgery.php` above. This page handles the adding and editing of individual surgery records, including assigning rooms and technicians.

### Technicians Workflow (`technicians.php` - Inferred List View, used in `add_edit_surgery.php`):

*   **Purpose:** To list technicians and manage their availability/assignment.
*   **List View (`technicians.php` - Inferred):**
    *   **Initial Load:** Requires user authentication. Fetches a list of technicians using an API call (e.g., `apiRequest('technicians', 'list')`). Displays technician information. May include filtering or sorting.
    *   **User Interaction:** May allow viewing/editing technician details (potentially on a separate form page) or managing their availability.
*   **Assignment (`add_edit_surgery.php` - Analyzed):** Technicians are selected and assigned to surgeries via a modal on the add/edit surgery form. This involves fetching available technicians for a specific date (`apiRequest('techAvail', 'byDate')`).

### Technician Availability Workflow (Used in `add_edit_surgery.php`):

*   **Purpose:** To determine and display which technicians are available on a given date at selected month for surgery assignment.
*   **Workflow:** Triggered by date selection on the add/edit surgery form. Makes an API call (`apiRequest('techAvail', 'byDate')`) with the selected date. The frontend receives a list of available technicians and their periods (e.g., AM, PM, Full). This information is used to populate the technician selection modal, showing which technicians can be assigned.

### Rooms Workflow (`rooms.php` - Inferred List View, used in `appointments.php` and `add_edit_surgery.php`):

*   **Purpose:** To list available rooms and manage their usage for appointments and surgeries.
*   **List View (`rooms.php` - Inferred):**
    *   **Initial Load:** Requires user authentication. Fetches a list of rooms using an API call (e.g., `apiRequest('rooms', 'list')`). Displays room information, potentially including their active status.
    *   **User Interaction:** May allow viewing/editing room details (potentially on a separate form page).
*   **Selection and Availability (`appointments.php` and `add_edit_surgery.php` - Analyzed):** Rooms are selected from a dropdown when adding/editing appointments and surgeries. On the surgery form, selecting a date triggers a check for room availability (`apiRequest('availability', 'byDate')`), which updates the room dropdown to indicate booked rooms and displays an availability summary.

### Users Workflow (`users.php` - Inferred List/Management View):

*   **Purpose:** To manage user accounts and roles within the system.
*   **Workflow (Inferred):** Requires appropriate user permissions (likely admin). Fetches a list of users using an API call (e.g., `apiRequest('users', 'list')`). Displays user information, including roles. Allows adding, editing, or deleting users. Frontend logic would handle form submissions for user management actions. User roles (`is_admin()`, `is_editor()`, `is_agent()`) are checked in the PHP files to conditionally display UI elements or restrict functionality.

### Patient Details Workflow (`patient.php` - Inferred Detail View, used in `appointments.php` and `add_edit_surgery.php`):

*   **Purpose:** To display detailed information about a specific patient and potentially list their associated appointments or surgeries.
*   **Workflow (Inferred):** Requires user authentication. Accessed by navigating from a list of patients (if one exists) or from an appointment/surgery record. Fetches patient details using an API call (e.g., `apiRequest('patients', 'get', { id: patientId })`). Displays patient information. May also fetch and display a list of appointments or surgeries related to that patient. Frontend logic would handle displaying this data and potentially providing links to edit patient details or add new related records.

**Deliverable:**

A functional Next.js application that replicates the frontend behavior and appearance of the original application, consuming the existing backend API, with the page-specific workflows and entity interactions detailed above implemented in React components and Next.js pages.