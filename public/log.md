## Response Log - 2025-06-04 16:43:06

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

## Request Log - 2025-06-04 16:43:06

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "appointments": {
        "4-2025-06-03": {
            "room_id": 4,
            "date": "2025-06-03",
            "consult_count": 1,
            "cosmetic_count": 0
        }
    },
    "surgeries": {
        "1-2025-06-01": {
            "room_id": 1,
            "date": "2025-06-01",
            "patient_name": "agenta 1",
            "status": "confirmed"
        },
        "1-2025-06-02": {
            "room_id": 1,
            "date": "2025-06-02",
            "patient_name": "dsadadas",
            "status": "confirmed"
        }
    }
}
```
---

## Request Log - 2025-06-04 16:43:09

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:09

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

## Request Log - 2025-06-04 16:43:09

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 5,
            "name": "Test Patient 1748974160746",
            "dob": "1990-01-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-03 18:09:20",
            "updated_at": "2025-06-03 18:09:20",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 4,
            "name": "agenta 1",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-03 11:59:00",
            "updated_at": "2025-06-03 15:45:11",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-06-01",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "dsadadas",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 01:08:00",
            "updated_at": "2025-06-02 01:08:00",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-06-02",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "qqqq",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 16:17:47",
            "updated_at": "2025-06-02 16:17:47",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 2,
            "name": "test",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 11:02:18",
            "updated_at": "2025-06-02 11:02:18",
            "avatar": null,
            "agency_id": "",
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-06-04 16:43:09

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "appointments": [
        {
            "id": 4,
            "room_id": 4,
            "patient_id": 4,
            "appointment_date": "2025-06-03",
            "start_time": "10:00",
            "end_time": "11:00",
            "type": "consult",
            "subtype": "",
            "notes": "",
            "created_at": "2025-06-03 18:00:22",
            "updated_at": "2025-06-03 18:00:22",
            "patient_name": "agenta 1",
            "room_name": "Consultation"
        }
    ]
}
```
---

## Request Log - 2025-06-04 16:43:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:11

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

## Request Log - 2025-06-04 16:43:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-06-04 16:43:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 5,
            "name": "Test Patient 1748974160746",
            "dob": "1990-01-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-03 18:09:20",
            "updated_at": "2025-06-03 18:09:20",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 4,
            "name": "agenta 1",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-03 11:59:00",
            "updated_at": "2025-06-03 15:45:11",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-06-01",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "dsadadas",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 01:08:00",
            "updated_at": "2025-06-02 01:08:00",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-06-02",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "qqqq",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 16:17:47",
            "updated_at": "2025-06-02 16:17:47",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 2,
            "name": "test",
            "dob": "2025-06-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-06-02 11:02:18",
            "updated_at": "2025-06-02 11:02:18",
            "avatar": null,
            "agency_id": "",
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

