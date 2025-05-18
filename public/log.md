## Request Log - 2025-05-18 00:31:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:31:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-18 00:31:58

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:31:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-18 00:32:07

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-18 00:32:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient created successfully!",
    "patient": {
        "id": "1",
        "name": "Emin ayhan colak"
    }
}
```
---

## Request Log - 2025-05-18 00:32:09

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:32:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 0
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:13

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:32:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:32:13

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:32:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-18 00:32:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:32:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 0
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-18 00:32:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery created successfully!"
}
```
---

## Request Log - 2025-05-18 00:32:24

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:32:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:32:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:32:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:27

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:32:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:29

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:32:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:32:29

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:32:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:34

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:32:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:32:40

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:32:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:32:40

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:32:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:23

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:33:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 00:33:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:27

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:33:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:30

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:33:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:33:30

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:33:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:33

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 00:33:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:33:42

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:33:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:33:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:33:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:34:25

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:34:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:34:25

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:34:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:34:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:34:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:34:36

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:34:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:36:48

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:36:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:36:49

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:36:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:05

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:37:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:23

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:37:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:29

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:37:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:43

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:37:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:37:43

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 00:37:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:37:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:37:47

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 00:37:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 00:37:49

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:37:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:39:06

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:39:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:40:52

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:40:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:41:55

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:41:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:42:11

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 00:42:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:44:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:44:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 00:44:37

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 00:44:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:46:43

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:46:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:46:49

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:46:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:07

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:09

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:51

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:51

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 16:59:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 16:59:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:00:04

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:00:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:00:07

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 17:00:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:00:19

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:00:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:00:20

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 17:00:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:02:44

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:02:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:02:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:02:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:02:46

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:02:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:11:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:11:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:12:13

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:12:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:12:48

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:12:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:13:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:13:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:20:24

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:20:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:20:24

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:20:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:20:26

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 17:20:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 17:20:28

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 17:20:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:07:41

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:07:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:07:42

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:07:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:07:43

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:07:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:07:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:07:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:08:09

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:08:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:08:10

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:08:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:11:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:11:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:11:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:11:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:14:32

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:14:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:14:34

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:14:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:14:35

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:14:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:30:18

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=5

## Response Log - 2025-05-18 18:30:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:30:27

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=4

## Response Log - 2025-05-18 18:30:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:30:29

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=1

## Response Log - 2025-05-18 18:30:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:30:49

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=2

## Response Log - 2025-05-18 18:30:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:30:51

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=3

## Response Log - 2025-05-18 18:30:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:31:05

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:31:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:31:23

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:31:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:31:24

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:31:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:31:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:31:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:32:05

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=8

## Response Log - 2025-05-18 18:32:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:32:07

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=7

## Response Log - 2025-05-18 18:32:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:32:09

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=6

## Response Log - 2025-05-18 18:32:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:33:09

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 18:33:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:33:10

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 18:33:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 18:33:34

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=9

## Response Log - 2025-05-18 18:33:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:33:36

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=10

## Response Log - 2025-05-18 18:33:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 18:33:37

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=11

## Response Log - 2025-05-18 18:33:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 19:40:28

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:40:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:40:53

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:40:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:44:56

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:44:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:47:07

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:47:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:49:32

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=12

## Response Log - 2025-05-18 19:49:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 19:49:33

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:49:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:49:55

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:49:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:50:54

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:50:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:53:45

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=15

## Response Log - 2025-05-18 19:53:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 19:53:47

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=14

## Response Log - 2025-05-18 19:53:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 19:53:49

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=13

## Response Log - 2025-05-18 19:53:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 19:53:50

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:53:50

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:54:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 19:54:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:54:17

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 19:54:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:54:20

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 19:54:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 19:54:21

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 19:54:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:06:08

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:06:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:06:36

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:06:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:07:55

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:07:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:09:12

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:09:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:09:30

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:09:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 20:11:53

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 20:11:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 21:24:59

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 21:24:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 21:25:14

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=29

## Response Log - 2025-05-18 21:25:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:16

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=26

## Response Log - 2025-05-18 21:25:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:19

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=23

## Response Log - 2025-05-18 21:25:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:21

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=24

## Response Log - 2025-05-18 21:25:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:23

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=25

## Response Log - 2025-05-18 21:25:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:26

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=27

## Response Log - 2025-05-18 21:25:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:28

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=28

## Response Log - 2025-05-18 21:25:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 21:25:29

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 21:25:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:21:55

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:21:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:24:06

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:24:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:25:07

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:25:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:25:18

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:25:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:25:34

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=37

## Response Log - 2025-05-18 22:25:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:25:36

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=36

## Response Log - 2025-05-18 22:25:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:25:38

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=38

## Response Log - 2025-05-18 22:25:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:25:40

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=34

## Response Log - 2025-05-18 22:25:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:25:42

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=33

## Response Log - 2025-05-18 22:25:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:25:45

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=35

## Response Log - 2025-05-18 22:25:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:28:42

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:28:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:28:56

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:28:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:29:09

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:29:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:29:30

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=45

## Response Log - 2025-05-18 22:29:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:32

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=47

## Response Log - 2025-05-18 22:29:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:35

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=46

## Response Log - 2025-05-18 22:29:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:37

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=42

## Response Log - 2025-05-18 22:29:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:40

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=43

## Response Log - 2025-05-18 22:29:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:42

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=44

## Response Log - 2025-05-18 22:29:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:45

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=39

## Response Log - 2025-05-18 22:29:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:47

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=41

## Response Log - 2025-05-18 22:29:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:29:49

**Method:** POST
**URL:** /api.php
**Body:** entity=photos&amp;action=delete&amp;id=40

## Response Log - 2025-05-18 22:29:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Photo deleted successfully."
}
```
---

## Request Log - 2025-05-18 22:32:23

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:32:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:34:32

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:34:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:34:34

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:34:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:34:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:34:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:34:48

**Method:** GET
**URL:** /api.php?entity=photo_album_types&action=list

## Response Log - 2025-05-18 22:34:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "photo_album_types": [
        {
            "id": 1,
            "name": "Pre-Surgery"
        },
        {
            "id": 2,
            "name": "Post-Surgery"
        },
        {
            "id": 3,
            "name": "Follow-up"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:35:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:35:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:35:07

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:35:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:35:07

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 22:35:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:36:26

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:36:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:36:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:36:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:36:34

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=undefined

## Response Log - 2025-05-18 22:36:34

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-18 22:36:34

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=undefined

## Response Log - 2025-05-18 22:36:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-18 22:36:38

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:36:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:37:06

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:37:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:37:07

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-18 22:37:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-09",
        "status": "booked",
        "notes": "caxsdcxac",
        "patient_id": 1,
        "patient_name": "Emin ayhan colak"
    }
}
```
---

## Request Log - 2025-05-18 22:37:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-18 22:37:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully!"
}
```
---

## Request Log - 2025-05-18 22:37:14

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:37:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:37:14

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 22:37:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:37:26

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:37:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:37:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-18 22:37:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-09",
        "status": "booked",
        "notes": "caxsdcxac",
        "patient_id": 1,
        "patient_name": "Emin ayhan colak"
    }
}
```
---

## Request Log - 2025-05-18 22:37:34

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:37:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:49:31

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-18 22:49:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-09",
        "status": "booked",
        "notes": "caxsdcxac",
        "patient_id": 1,
        "patient_name": "Emin ayhan colak"
    }
}
```
---

## Request Log - 2025-05-18 22:49:33

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:49:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:50:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:50:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:50:44

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-18 22:50:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient created successfully!",
    "patient": {
        "id": "2",
        "name": "test"
    }
}
```
---

## Request Log - 2025-05-18 22:53:46

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-18 22:53:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery created successfully!"
}
```
---

## Request Log - 2025-05-18 22:53:48

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:53:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test"
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:57:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:38

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:57:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:57:38

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 22:57:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:41

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:57:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:42

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-18 22:57:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "test",
        "dob": "2025-05-04"
    }
}
```
---

## Request Log - 2025-05-18 22:57:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=2

## Response Log - 2025-05-18 22:57:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:44

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:57:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:46

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:57:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:57:46

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 22:57:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:49

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:57:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:57:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:57:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        },
        {
            "id": 2,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:58:26

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:58:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:58:28

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-18 22:58:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "Emin ayhan colak",
            "dob": "2025-05-18",
            "surgery_count": 1
        },
        {
            "id": 2,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_count": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:58:32

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:58:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:58:37

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-18 22:58:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "Emin ayhan colak",
        "dob": "2025-05-18"
    }
}
```
---

## Request Log - 2025-05-18 22:58:37

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&patient_id=1

## Response Log - 2025-05-18 22:58:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak"
        }
    ]
}
```
---

## Request Log - 2025-05-18 22:58:45

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-18 22:58:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-16",
            "status": "booked",
            "notes": "",
            "patient_name": "test",
            "patient_id": 2
        },
        {
            "id": 1,
            "date": "2025-05-09",
            "status": "booked",
            "notes": "caxsdcxac",
            "patient_name": "Emin ayhan colak",
            "patient_id": 1
        }
    ]
}
```
---

