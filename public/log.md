## Response Log - 2025-06-05 17:47:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "types": "consultation",
            "is_active": 1
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "types": "treatment",
            "is_active": 1
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "types": "surgery",
            "is_active": 1
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "types": "surgery",
            "is_active": 0
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "types": "surgery",
            "is_active": 0
        }
    ]
}
```
---

## Request Log - 2025-06-05 17:47:06

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-06-01",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "types": "consultation",
            "is_active": 1,
            "status": "available",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "types": "treatment",
            "is_active": 1,
            "status": "available",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "types": "surgery",
            "is_active": 1,
            "status": "booked",
            "graft_count": "",
            "surgery_id": 1,
            "reservation_surgery_id": 1,
            "patient_name": "Emin ayhan colak"
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "types": "surgery",
            "is_active": 0,
            "status": "inactive",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "types": "surgery",
            "is_active": 0,
            "status": "inactive",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        }
    ],
    "statistics": {
        "total_rooms": 5,
        "active_rooms": 3,
        "available_rooms": 2,
        "booked_rooms": 1
    }
}
```
---

## Request Log - 2025-06-05 17:47:30

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-06-01",
        "notes": "",
        "status": "confirmed",
        "graft_count": "",
        "room_id": 1,
        "created_at": "2025-06-05 15:35:26",
        "updated_at": "2025-06-05 15:37:36",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "Emin ayhan colak",
        "agency_name": "Hospital",
        "room_name": "Surgery 1",
        "technicians": [
            {
                "id": 9,
                "name": "Beverly",
                "specialty": null,
                "phone": "07775434126"
            },
            {
                "id": 10,
                "name": "Claduio",
                "specialty": null,
                "phone": "00393341817614"
            }
        ],
        "technician_ids": [
            9,
            10
        ]
    }
}
```
---

## Request Log - 2025-06-05 17:47:30

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 1,
            "name": "Hospital"
        },
        {
            "id": 3,
            "name": "Other Agency"
        },
        {
            "id": 2,
            "name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-06-05 17:47:30

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "types": "consultation",
            "is_active": 1
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "types": "treatment",
            "is_active": 1
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "types": "surgery",
            "is_active": 1
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "types": "surgery",
            "is_active": 0
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "types": "surgery",
            "is_active": 0
        }
    ]
}
```
---

## Request Log - 2025-06-05 17:47:30

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-06-01",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "types": "consultation",
            "is_active": 1,
            "status": "available",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "types": "treatment",
            "is_active": 1,
            "status": "available",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "types": "surgery",
            "is_active": 1,
            "status": "booked",
            "graft_count": "",
            "surgery_id": 1,
            "reservation_surgery_id": 1,
            "patient_name": "Emin ayhan colak"
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "types": "surgery",
            "is_active": 0,
            "status": "inactive",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "types": "surgery",
            "is_active": 0,
            "status": "inactive",
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null,
            "patient_name": null
        }
    ],
    "statistics": {
        "total_rooms": 5,
        "active_rooms": 3,
        "available_rooms": 2,
        "booked_rooms": 1
    }
}
```
---

## Request Log - 2025-06-05 17:47:38

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-05 17:47:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-06-01",
            "notes": "",
            "status": "confirmed",
            "graft_count": "",
            "room_id": 1,
            "created_at": "2025-06-05 15:35:26",
            "updated_at": "2025-06-05 15:37:36",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "Emin ayhan colak",
            "agency_name": "Hospital",
            "room_name": "Surgery 1"
        }
    ]
}
```
---

