## Request Log - 2025-05-29 22:45:28

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 22:45:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta a",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 13:49:17",
            "updated_at": "2025-05-29 21:32:20",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-30",
            "agency_name": "Branch Office A"
        },
        {
            "id": 3,
            "name": "acenta b",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 18:10:07",
            "updated_at": "2025-05-29 21:32:32",
            "avatar": null,
            "agency_id": 3,
            "last_surgery_date": null,
            "agency_name": "Branch Office B"
        },
        {
            "id": 4,
            "name": "acentasiz",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 18:13:25",
            "updated_at": "2025-05-29 21:32:44",
            "avatar": null,
            "agency_id": "",
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "main",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 13:48:39",
            "updated_at": "2025-05-29 21:32:09",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-30",
            "agency_name": "Main Office"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:45:40

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 22:45:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 5,
        "name": "acentali",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 22:45:40

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 22:45:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta a",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 13:49:17",
            "updated_at": "2025-05-29 21:32:20",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-30",
            "agency_name": "Branch Office A"
        },
        {
            "id": 3,
            "name": "acenta b",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 18:10:07",
            "updated_at": "2025-05-29 21:32:32",
            "avatar": null,
            "agency_id": 3,
            "last_surgery_date": null,
            "agency_name": "Branch Office B"
        },
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 21:45:40",
            "updated_at": "2025-05-29 21:45:40",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 4,
            "name": "acentasiz",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 18:13:25",
            "updated_at": "2025-05-29 21:32:44",
            "avatar": null,
            "agency_id": "",
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "main",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 13:48:39",
            "updated_at": "2025-05-29 21:32:09",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-30",
            "agency_name": "Main Office"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:47:20

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 22:47:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 2,
            "name": "Branch Office A"
        },
        {
            "id": 3,
            "name": "Branch Office B"
        },
        {
            "id": 1,
            "name": "Main Office"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:47:20

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 22:47:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "test@example.com",
            "username": "admin",
            "role": "admin",
            "agency_id": null,
            "created_at": "2025-05-29 12:04:10",
            "updated_at": "2025-05-29 12:04:10"
        },
        {
            "id": 2,
            "email": "agent@a.com",
            "username": "agent",
            "role": "agent",
            "agency_id": null,
            "created_at": "2025-05-29 15:38:32",
            "updated_at": "2025-05-29 18:04:19"
        },
        {
            "id": 3,
            "email": "a@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 1,
            "created_at": "2025-05-29 15:38:52",
            "updated_at": "2025-05-29 15:38:52"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:54:07

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 22:54:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 22:54:11

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 22:54:11

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

## Request Log - 2025-05-29 22:54:11

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 22:54:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:54:07",
            "updated_at": "2025-05-29 21:54:07"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent",
            "role": "admin",
            "agency_id": 3,
            "created_at": "2025-05-29 21:54:07",
            "updated_at": "2025-05-29 21:54:07"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "admin",
            "agency_id": 2,
            "created_at": "2025-05-29 21:54:07",
            "updated_at": "2025-05-29 21:54:07"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:55:07

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 22:55:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 22:55:09

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 22:55:09

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

## Request Log - 2025-05-29 22:55:09

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 22:55:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 2,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:55:16

**Method:** GET
**URL:** /api.php?entity=agencies&action=get_all

## Response Log - 2025-05-29 22:55:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 1,
            "name": "Hospital",
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 3,
            "name": "Other Agency",
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 2,
            "name": "Want Hair",
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:55:24

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 22:55:24

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

## Request Log - 2025-05-29 22:55:24

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 22:55:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 2,
            "created_at": "2025-05-29 21:55:07",
            "updated_at": "2025-05-29 21:55:07"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:57:05

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 22:57:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 22:57:07

**Method:** GET
**URL:** /api.php?entity=agencies&action=get_all

## Response Log - 2025-05-29 22:57:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 1,
            "name": "Hospital",
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 3,
            "name": "Other Agency",
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 2,
            "name": "Want Hair",
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:57:10

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 22:57:10

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

## Request Log - 2025-05-29 22:57:10

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 22:57:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent 1",
            "role": "agent",
            "agency_id": 2,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 4,
            "email": "d@d.com",
            "username": "agent 2",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        }
    ]
}
```
---

## Request Log - 2025-05-29 22:57:21

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Request Log - 2025-05-29 22:57:40

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Request Log - 2025-05-29 22:58:29

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Request Log - 2025-05-29 22:59:33

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 22:59:33

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

## Request Log - 2025-05-29 22:59:33

**Method:** GET
**URL:** /api.php?entity=availability&action=range&start=2025-05-25&end=2025-05-31

## Response Log - 2025-05-29 22:59:33

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Database error: SQLSTATE[HY000]: General error: 1 no such column: r.capacity"
}
```
---

## Request Log - 2025-05-29 23:02:57

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:02:57

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

## Request Log - 2025-05-29 23:02:57

**Method:** GET
**URL:** /api.php?entity=availability&action=range&start=2025-05-25&end=2025-05-31

## Response Log - 2025-05-29 23:02:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "start": "2025-05-25",
    "end": "2025-05-31",
    "availability": {
        "2025-05-25": [
            {
                "room_id": 4,
                "room_name": "Consultation",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 5,
                "room_name": "Cosmetology",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 1,
                "room_name": "Surgery 1",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 2,
                "room_name": "Surgery 2",
                "reserved_date": null,
                "status": "inactive",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 3,
                "room_name": "Surgery 3",
                "reserved_date": null,
                "status": "inactive",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            }
        ]
    }
}
```
---

## Request Log - 2025-05-29 23:03:08

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:03:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:03:08

**Method:** GET
**URL:** /api.php?entity=reservations&action=list

## Response Log - 2025-05-29 23:03:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "reservations": []
}
```
---

## Request Log - 2025-05-29 23:03:11

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:03:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:03:12

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:03:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:03:12

**Method:** GET
**URL:** /api.php?entity=reservations&action=list

## Response Log - 2025-05-29 23:03:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "reservations": []
}
```
---

## Request Log - 2025-05-29 23:03:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:03:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:03:25

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:03:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:04:03

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:04:03

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

## Request Log - 2025-05-29 23:04:03

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 23:04:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent 1",
            "role": "agent",
            "agency_id": 2,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 4,
            "email": "d@d.com",
            "username": "agent 2",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:04:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:04:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:04:33

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:04:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:04:35

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:04:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:04:38

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:04:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:04:38

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:04:38

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

## Request Log - 2025-05-29 23:04:44

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=2

## Response Log - 2025-05-29 23:04:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 2,
        "email": "b@b.com",
        "username": "editor",
        "role": "editor",
        "agency_id": 1,
        "created_at": "2025-05-29 21:57:05",
        "updated_at": "2025-05-29 21:57:05"
    }
}
```
---

## Request Log - 2025-05-29 23:04:49

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:04:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:04:49

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:04:49

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

## Request Log - 2025-05-29 23:05:02

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:05:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:05:06

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:05:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:05:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:05:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "1",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-29 23:05:23

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:05:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:05:26

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:05:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:05:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:05:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:05:32

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:05:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:05:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:05:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:05:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:05:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:05:49

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:05:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:05:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:05:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:05:56

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:05:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:06:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:06:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:06:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:06:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:06:49

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:06:49

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

## Request Log - 2025-05-29 23:06:49

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 23:06:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent 1",
            "role": "agent",
            "agency_id": 2,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 4,
            "email": "d@d.com",
            "username": "agent 2",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 1,
            "created_at": "2025-05-29 21:57:05",
            "updated_at": "2025-05-29 21:57:05"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:07:07

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:07:07

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:07:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:07:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:07:44

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:07:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:07:44

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:07:44

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

## Request Log - 2025-05-29 23:07:55

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:07:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:07:59

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:07:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:08:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:08:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "2",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-29 23:08:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:08:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:08:31

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:08:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:08:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:08:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:08:37

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:08:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:08:42

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:08:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:07:55",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:08:43

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:08:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": null
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:09:49

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:09:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": null
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:09:54

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:09:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:09:58

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:09:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:10:46

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:10:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:05:02",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:10:47

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-29 23:10:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-15",
        "notes": "ebru aldi",
        "status": "completed",
        "graft_count": 1000,
        "created_at": "2025-05-29 22:05:21",
        "updated_at": "2025-05-29 22:05:21",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "editor hasta 1",
        "agency_name": null
    }
}
```
---

## Request Log - 2025-05-29 23:10:47

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:10:47

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

## Request Log - 2025-05-29 23:10:47

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:10:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:10:47

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:10:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:10:53

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:10:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": null
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:10:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:10:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:07:55",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:10:56

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:10:56

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

## Request Log - 2025-05-29 23:10:56

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:10:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:07:55",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:10:56

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:10:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:07:55",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:00

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:11:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-29 23:11:01

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:11:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:00",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:05:02",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": "2025-05-15",
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:03

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:11:03

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

## Request Log - 2025-05-29 23:11:03

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:05:02",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:03

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:05:02",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:06

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:11:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-29 23:11:06

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:11:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:00",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:06",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:10

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:11:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:12

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:11:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:22

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:06",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:23

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-29 23:11:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-15",
        "notes": "ebru aldi",
        "status": "completed",
        "graft_count": 1000,
        "created_at": "2025-05-29 22:05:21",
        "updated_at": "2025-05-29 22:05:21",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "editor hasta 1",
        "agency_name": "Want Hair"
    }
}
```
---

## Request Log - 2025-05-29 23:11:23

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:11:23

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

## Request Log - 2025-05-29 23:11:23

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:11:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:23

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:11:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:26

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:11:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Want Hair"
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:29

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:06",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:30

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-29 23:11:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-15",
        "notes": "ebru aldi",
        "status": "completed",
        "graft_count": 1000,
        "created_at": "2025-05-29 22:05:21",
        "updated_at": "2025-05-29 22:05:21",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "editor hasta 1",
        "agency_name": "Want Hair"
    }
}
```
---

## Request Log - 2025-05-29 23:11:30

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:11:30

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

## Request Log - 2025-05-29 23:11:30

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:11:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:30

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:11:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:31

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:11:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Want Hair"
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:35

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:06",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:36

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:11:36

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

## Request Log - 2025-05-29 23:11:36

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:06",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:36

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:11:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:06",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:39

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:11:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-29 23:11:40

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:11:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:00",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:41

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:11:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:11:00",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:43

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:11:43

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

## Request Log - 2025-05-29 23:11:43

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:11:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:11:00",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:43

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:11:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:11:00",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:11:46

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:11:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-29 23:11:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:11:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:51

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:11:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:11:52

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:11:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:12:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:19

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:12:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:21

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:12:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:12:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:37

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-29 23:12:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-15",
        "notes": "ebru aldi",
        "status": "completed",
        "graft_count": 1000,
        "created_at": "2025-05-29 22:05:21",
        "updated_at": "2025-05-29 22:05:21",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "editor hasta 1",
        "agency_name": "Hospital"
    }
}
```
---

## Request Log - 2025-05-29 23:12:37

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:12:37

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

## Request Log - 2025-05-29 23:12:37

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:37

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:44

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:12:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "completed",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:05:21",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:47

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=1

## Response Log - 2025-05-29 23:12:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 1,
        "date": "2025-05-15",
        "notes": "ebru aldi",
        "status": "completed",
        "graft_count": 1000,
        "created_at": "2025-05-29 22:05:21",
        "updated_at": "2025-05-29 22:05:21",
        "patient_id": 1,
        "is_recorded": 1,
        "patient_name": "editor hasta 1",
        "agency_name": "Hospital"
    }
}
```
---

## Request Log - 2025-05-29 23:12:47

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:12:47

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

## Request Log - 2025-05-29 23:12:47

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:47

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:51

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:12:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-29 23:12:52

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-29 23:12:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "editor hasta 1",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:05:02",
        "updated_at": "2025-05-29 22:11:39",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "booked",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:12:51",
            "patient_id": 1,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:12:55

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:12:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "booked",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:12:51",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        },
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "completed",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:08:27",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:56

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-29 23:12:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-15",
        "notes": "acenta ekledi",
        "status": "completed",
        "graft_count": 2000,
        "created_at": "2025-05-29 22:08:27",
        "updated_at": "2025-05-29 22:08:27",
        "patient_id": 2,
        "is_recorded": 1,
        "patient_name": "agent patient 1",
        "agency_name": "Want Hair"
    }
}
```
---

## Request Log - 2025-05-29 23:12:56

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:12:56

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

## Request Log - 2025-05-29 23:12:56

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:56

**Method:** GET
**URL:** /api.php?entity=availability&action=byDate&date=2025-05-15

## Response Log - 2025-05-29 23:12:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "date": "2025-05-15",
    "rooms": [
        {
            "id": 4,
            "name": "Consultation",
            "notes": "Consultation",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 5,
            "name": "Cosmetology",
            "notes": "Cosmetology",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 1,
            "name": "Surgery 1",
            "notes": "Surgery 1",
            "status": "available",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 2,
            "name": "Surgery 2",
            "notes": "Surgery 2",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        },
        {
            "id": 3,
            "name": "Surgery 3",
            "notes": "Surgery 3",
            "status": "inactive",
            "patient_name": null,
            "graft_count": null,
            "surgery_id": null,
            "reservation_surgery_id": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:12:59

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:12:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-29 23:13:01

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-29 23:13:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "agent patient 1",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-29 22:07:55",
        "updated_at": "2025-05-29 22:11:46",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "booked",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:12:59",
            "patient_id": 2,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:13:03

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:13:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "booked",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:12:51",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:04

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list&agency=2

## Response Log - 2025-05-29 23:13:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-15",
            "notes": "acenta ekledi",
            "status": "booked",
            "graft_count": 2000,
            "created_at": "2025-05-29 22:08:27",
            "updated_at": "2025-05-29 22:12:59",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "agent patient 1",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:10

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:13:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:13:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:17

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:13:17

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

## Request Log - 2025-05-29 23:13:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:13:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 3,
        "name": "editor hasta 2",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:13:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:13:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:41

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:13:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:13:59

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:13:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 4,
        "name": "agent patient 2",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:14:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:14:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:14:02

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:14:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:14:04

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:14:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:13:59",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:14:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:14:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:13:59",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:14:14

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-29 23:14:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "agent patient 2",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 22:13:59",
        "updated_at": "2025-05-29 22:13:59",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:14:15

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:14:15

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

## Request Log - 2025-05-29 23:14:15

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-29 23:14:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "agent patient 2",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 22:13:59",
        "updated_at": "2025-05-29 22:13:59",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:14:15

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-29 23:14:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "agent patient 2",
        "dob": "2025-05-15",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 22:13:59",
        "updated_at": "2025-05-29 22:13:59",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-29 23:14:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:14:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-29 23:14:22

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:14:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:16:27

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:16:27

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

## Request Log - 2025-05-29 23:16:29

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:16:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:17:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:17:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 5,
        "name": "aaa",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:17:23

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:17:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:22

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:18:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 5,
            "name": "aaa",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:17:23",
            "updated_at": "2025-05-29 22:17:23",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:18:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-29 23:18:26

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:18:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:18:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:39

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-29 23:18:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 6,
        "name": "aaaa",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-29 23:18:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:18:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:18:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:55

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:18:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "aaaa",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:18:39",
            "updated_at": "2025-05-29 22:18:39",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:18:57

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:18:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "aaaa",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:18:39",
            "updated_at": "2025-05-29 22:18:39",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:19:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:19:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:23:41

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:23:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-15",
            "notes": "ebru aldi",
            "status": "booked",
            "graft_count": 1000,
            "created_at": "2025-05-29 22:05:21",
            "updated_at": "2025-05-29 22:12:51",
            "patient_id": 1,
            "is_recorded": 1,
            "patient_name": "editor hasta 1",
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:23:44

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:23:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "aaaa",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:18:39",
            "updated_at": "2025-05-29 22:18:39",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:23:44

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:23:44

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

## Request Log - 2025-05-29 23:30:22

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:30:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "aaaa",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:18:39",
            "updated_at": "2025-05-29 22:18:39",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 2,
            "name": "agent patient 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:07:55",
            "updated_at": "2025-05-29 22:11:46",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Want Hair"
        },
        {
            "id": 4,
            "name": "agent patient 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 22:13:59",
            "updated_at": "2025-05-29 22:14:21",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "editor hasta 1",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-29 22:05:02",
            "updated_at": "2025-05-29 22:11:39",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": "2025-05-15",
            "agency_name": "Hospital"
        },
        {
            "id": 3,
            "name": "editor hasta 2",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 22:13:33",
            "updated_at": "2025-05-29 22:13:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:31:09

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-29 23:31:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-29 23:31:12

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-29 23:31:12

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

## Request Log - 2025-05-29 23:31:12

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-29 23:31:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "users": [
        {
            "id": 1,
            "email": "a@b.com",
            "username": "admin",
            "role": "admin",
            "agency_id": 1,
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 3,
            "email": "c@c.com",
            "username": "agent 1",
            "role": "agent",
            "agency_id": 2,
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 4,
            "email": "d@d.com",
            "username": "agent 2",
            "role": "agent",
            "agency_id": 3,
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 2,
            "email": "b@b.com",
            "username": "editor",
            "role": "editor",
            "agency_id": 1,
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:31:15

**Method:** GET
**URL:** /api.php?entity=agencies&action=get_all

## Response Log - 2025-05-29 23:31:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 1,
            "name": "Hospital",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 3,
            "name": "Other Agency",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 2,
            "name": "Want Hair",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:33:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:33:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:33:16

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-29 23:33:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:33:27

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-29 23:33:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-29 23:37:31

**Method:** GET
**URL:** /api.php?entity=agencies&action=get_all

## Response Log - 2025-05-29 23:37:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "agencies": [
        {
            "id": 1,
            "name": "Hospital",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 3,
            "name": "Other Agency",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        },
        {
            "id": 2,
            "name": "Want Hair",
            "created_at": "2025-05-29 22:31:09",
            "updated_at": "2025-05-29 22:31:09"
        }
    ]
}
```
---

## Request Log - 2025-05-29 23:38:24

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-29 23:38:24

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

## Request Log - 2025-05-29 23:38:24

**Method:** GET
**URL:** /api.php?entity=availability&action=range&start=2025-05-25&end=2025-05-31

## Response Log - 2025-05-29 23:38:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "start": "2025-05-25",
    "end": "2025-05-31",
    "availability": {
        "2025-05-25": [
            {
                "room_id": 4,
                "room_name": "Consultation",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 5,
                "room_name": "Cosmetology",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 1,
                "room_name": "Surgery 1",
                "reserved_date": null,
                "status": "available",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 2,
                "room_name": "Surgery 2",
                "reserved_date": null,
                "status": "inactive",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            },
            {
                "room_id": 3,
                "room_name": "Surgery 3",
                "reserved_date": null,
                "status": "inactive",
                "patient_name": null,
                "graft_count": null,
                "surgery_id": null
            }
        ]
    }
}
```
---

## Request Log - 2025-05-30 00:02:42

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:02:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:02:42

**Method:** GET
**URL:** /api.php?entity=rooms&action=list

## Response Log - 2025-05-30 00:02:42

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

## Request Log - 2025-05-30 00:02:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:02:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:06:58

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:06:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:07:01

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:07:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:07:22

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:07:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:07:47

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:07:47

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

## Request Log - 2025-05-30 00:07:57

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:07:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 1,
        "name": "hastane hasra 1",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:07:58

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:07:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:08:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:01

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:02

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:02

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:02

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:08:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:08:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:08:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:23:46

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:23:46

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

## Request Log - 2025-05-30 00:23:48

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:23:48

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

## Request Log - 2025-05-30 00:30:32

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:30:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:30:32

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:30:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:30:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:30:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:30:40

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:30:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:30:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:30:45

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:30:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:30:46

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:30:46

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

## Request Log - 2025-05-30 00:30:46

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:30:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:30:46

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:30:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:31:18

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:31:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:30:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:31:21

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:31:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:31:23

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:31:23

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

## Request Log - 2025-05-30 00:31:23

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:31:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:31:23

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=2

## Response Log - 2025-05-30 00:31:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 2,
        "name": "acenta hasta 1",
        "dob": "2025-05-03",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:30:32",
        "updated_at": "2025-05-29 23:30:32",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:31:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:31:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:31:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:31:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:31:58

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:31:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:31:58

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:31:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:31:58",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:31:58",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:08

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:32:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 3,
        "name": "test3",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:32:08

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:31:58",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:17

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:32:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:31:58",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 3,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:08",
            "updated_at": "2025-05-29 23:32:08",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:32:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:32:20

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:32:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "acenta hasta 1",
            "dob": "2025-05-03",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:30:32",
            "updated_at": "2025-05-29 23:31:58",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:32:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:32:24

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:32:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:32:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:32:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:32:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:32:38

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:32:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "acenta 1",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:33",
            "updated_at": "2025-05-29 23:32:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:32:41

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:32:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:32:42

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:32:42

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

## Request Log - 2025-05-30 00:32:42

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:32:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:32:42

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:32:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:32:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:32:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 5,
        "name": "acentali",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:32:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:32:57

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:32:59

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:32:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:33:08

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:33:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "acenta 1",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:33",
            "updated_at": "2025-05-29 23:32:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-23",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:52",
            "updated_at": "2025-05-29 23:32:52",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:34:03

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:34:03

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

## Request Log - 2025-05-30 00:34:17

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:34:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 6,
        "name": "test2",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:34:18

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:34:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "acenta 1",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:33",
            "updated_at": "2025-05-29 23:32:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-23",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:52",
            "updated_at": "2025-05-29 23:32:52",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:05

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "acenta 1",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:33",
            "updated_at": "2025-05-29 23:32:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-23",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:52",
            "updated_at": "2025-05-29 23:32:52",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:12

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:35:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:35:14

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:35:14

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

## Request Log - 2025-05-30 00:35:14

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:35:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:35:14

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=4

## Response Log - 2025-05-30 00:35:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 4,
        "name": "acenta 1",
        "dob": "2025-05-10",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:32:33",
        "updated_at": "2025-05-29 23:32:33",
        "avatar": null,
        "agency_id": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:35:17

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "acenta 1",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:33",
            "updated_at": "2025-05-29 23:32:33",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-23",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:52",
            "updated_at": "2025-05-29 23:32:52",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:35:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:35:20

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 5,
            "name": "acentali",
            "dob": "2025-05-23",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:32:52",
            "updated_at": "2025-05-29 23:32:52",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:35:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:35:23

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "hastane hasra 1",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 2,
            "created_at": "2025-05-29 23:07:57",
            "updated_at": "2025-05-29 23:07:57",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:35:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:35:25

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "test2",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:34:17",
            "updated_at": "2025-05-29 23:34:17",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:35:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:35:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:35:27

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:35:28

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:35:28

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

## Request Log - 2025-05-30 00:35:32

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:35:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 7,
        "name": "Emin ayhan colak",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:35:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:35:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:38:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:38:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:38:43

**Method:** POST
**URL:** /api.php

## Request Log - 2025-05-30 00:39:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:39:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:39:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:39:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 8,
        "name": "test3",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:39:34

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:39:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "test3",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:39:33",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:39:45

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:39:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:39:33",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:39:45

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:39:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:39:33",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:40:10

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:40:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:39:33",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:40:10

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:40:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:39:33",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:40:15

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:40:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:40:16

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:40:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:40:31

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:40:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:40:35

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:40:35

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

## Request Log - 2025-05-30 00:41:16

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:41:16

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

## Request Log - 2025-05-30 00:41:17

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:41:17

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

## Request Log - 2025-05-30 00:41:20

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:41:20

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

## Request Log - 2025-05-30 00:41:49

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:41:49

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

## Request Log - 2025-05-30 00:44:03

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:44:03

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

## Request Log - 2025-05-30 00:44:36

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:44:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f16477367.jpg"
}
```
---

## Request Log - 2025-05-30 00:44:36

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:44:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 9,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:44:37

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:44:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:44:36",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:44:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:44:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:44:36",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:45:02

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:45:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:40:15",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:02

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:45:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:40:15",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:11

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:45:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:44:36",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:45:13

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:44:36",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:15

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:44:36",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:15

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:44:36",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:45:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f18f031a3.png"
}
```
---

## Request Log - 2025-05-30 00:45:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:45:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:45:19

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:45:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:19",
            "avatar": "uploads\/avatars\/avatar_6838f18f031a3.png",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:45:25

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:45:19",
        "avatar": "uploads\/avatars\/avatar_6838f18f031a3.png",
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:27

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:45:19",
        "avatar": "uploads\/avatars\/avatar_6838f18f031a3.png",
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:27

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=9

## Response Log - 2025-05-30 00:45:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 9,
        "name": "test",
        "dob": "2025-05-08",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:44:36",
        "updated_at": "2025-05-29 23:45:19",
        "avatar": "uploads\/avatars\/avatar_6838f18f031a3.png",
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:45:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:45:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:45:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:45:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg"
}
```
---

## Request Log - 2025-05-30 00:45:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:45:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:45:46

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:45:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:46:02

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:46:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f1bab523f.jpg"
}
```
---

## Request Log - 2025-05-30 00:46:02

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:46:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 10,
        "name": "test3",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:46:03

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:46:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:40:15",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:46:48

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:46:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:40:15",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:46:48

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=8

## Response Log - 2025-05-30 00:46:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 8,
        "name": "test3",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 3,
        "created_at": "2025-05-29 23:39:33",
        "updated_at": "2025-05-29 23:40:15",
        "avatar": null,
        "agency_id": 2
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:46:55

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:46:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg"
}
```
---

## Request Log - 2025-05-30 00:46:55

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:46:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:46:55

**Method:** GET
**URL:** /api.php?entity=patients&action=list&agency=2

## Response Log - 2025-05-30 00:46:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:46:55",
            "avatar": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:47:26

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:47:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:46:55",
            "avatar": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:51:01

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:35:32",
            "updated_at": "2025-05-29 23:35:32",
            "avatar": null,
            "agency_id": null,
            "last_surgery_date": null,
            "agency_name": null
        },
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:46:55",
            "avatar": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:51:03

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:51:03

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "test",
            "dob": "2025-05-08",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:44:36",
            "updated_at": "2025-05-29 23:45:45",
            "avatar": "uploads\/avatars\/avatar_6838f1a9bfc9a.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:46:55",
            "avatar": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:51:08

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:51:08

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "test3",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:39:33",
            "updated_at": "2025-05-29 23:46:55",
            "avatar": "uploads\/avatars\/avatar_6838f1ef5c90d.jpg",
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        },
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:51:10

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:51:10

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "test3",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 3,
            "created_at": "2025-05-29 23:46:02",
            "updated_at": "2025-05-29 23:46:02",
            "avatar": null,
            "agency_id": 2,
            "last_surgery_date": null,
            "agency_name": "Want Hair"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:51:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-30 00:51:14

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-30 00:51:15

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:51:15

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

## Request Log - 2025-05-30 00:51:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f2fd738f9.jpg"
}
```
---

## Request Log - 2025-05-30 00:51:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:51:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 11,
        "name": "Emin ayhan colak",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:51:26

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:51:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "Emin ayhan colak",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:51:25",
            "updated_at": "2025-05-29 23:51:25",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:52:02

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:52:02

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

## Request Log - 2025-05-30 00:52:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:52:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f3306176f.jpg"
}
```
---

## Request Log - 2025-05-30 00:52:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:52:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 12,
        "name": "Nurcan Sahin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-30 00:52:16

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:52:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "Emin ayhan colak",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:51:25",
            "updated_at": "2025-05-29 23:51:25",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 12,
            "name": "Nurcan Sahin",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:52:16",
            "updated_at": "2025-05-29 23:52:16",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:55:51

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=11

## Response Log - 2025-05-30 00:55:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "Emin ayhan colak",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:51:25",
        "updated_at": "2025-05-29 23:51:25",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:55:54

**Method:** GET
**URL:** /api.php?entity=agencies&action=list

## Response Log - 2025-05-30 00:55:54

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

## Request Log - 2025-05-30 00:55:54

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=11

## Response Log - 2025-05-30 00:55:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "Emin ayhan colak",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:51:25",
        "updated_at": "2025-05-29 23:51:25",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:55:54

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=11

## Response Log - 2025-05-30 00:55:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "Emin ayhan colak",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:51:25",
        "updated_at": "2025-05-29 23:51:25",
        "avatar": null,
        "agency_id": 1
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:56:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:56:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_6838f41e980e7.jpg"
}
```
---

## Request Log - 2025-05-30 00:56:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-30 00:56:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-30 00:56:15

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:56:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "Emin ayhan colak",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:51:25",
            "updated_at": "2025-05-29 23:56:14",
            "avatar": "uploads\/avatars\/avatar_6838f41e980e7.jpg",
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 12,
            "name": "Nurcan Sahin",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:52:16",
            "updated_at": "2025-05-29 23:52:16",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:56:41

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:56:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "Emin ayhan colak",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:51:25",
            "updated_at": "2025-05-29 23:56:14",
            "avatar": "uploads\/avatars\/avatar_6838f41e980e7.jpg",
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 12,
            "name": "Nurcan Sahin",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:52:16",
            "updated_at": "2025-05-29 23:52:16",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        }
    ]
}
```
---

## Request Log - 2025-05-30 00:56:43

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=11

## Response Log - 2025-05-30 00:56:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "Emin ayhan colak",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-29 23:51:25",
        "updated_at": "2025-05-29 23:56:14",
        "avatar": "uploads\/avatars\/avatar_6838f41e980e7.jpg",
        "agency_id": 1
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-30 00:56:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-30 00:56:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "Emin ayhan colak",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:51:25",
            "updated_at": "2025-05-29 23:56:14",
            "avatar": "uploads\/avatars\/avatar_6838f41e980e7.jpg",
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        },
        {
            "id": 12,
            "name": "Nurcan Sahin",
            "dob": "2025-05-15",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-29 23:52:16",
            "updated_at": "2025-05-29 23:52:16",
            "avatar": null,
            "agency_id": 1,
            "last_surgery_date": null,
            "agency_name": "Hospital"
        }
    ]
}
```
---

