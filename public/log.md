## Response Log - 2025-06-01 23:47:46

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
            "created_at": "2025-06-01 22:41:21",
            "updated_at": "2025-06-01 22:41:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "test",
            "agency_name": "Want Hair",
            "room_name": "Surgery 1"
        }
    ]
}
```
---

## Request Log - 2025-06-01 23:47:46

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-06-01 23:47:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "is_active": 1
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "is_active": 1
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "is_active": 1
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "is_active": 0
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "is_active": 0
        }
    ]
}
```
---

