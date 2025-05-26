## Request Log - 2025-05-26 09:29:36

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:29:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 09:29:37

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:29:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:29:44

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:29:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 5,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:29:55

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:29:55

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

## Request Log - 2025-05-26 09:29:57

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:29:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "notes": "dsadsad",
            "status": "booked",
            "graft_count": 12121,
            "created_at": "2025-05-26 08:29:55",
            "updated_at": "2025-05-26 08:29:55",
            "patient_id": 5,
            "patient_name": "test"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:29:59

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:29:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 5,
            "name": "test",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 08:29:44",
            "updated_at": "2025-05-26 08:29:44",
            "avatar": null,
            "last_surgery_date": "2025-05-09"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:30:00

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=5

## Response Log - 2025-05-26 09:30:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 5,
        "name": "test",
        "dob": "2025-05-09",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 08:29:44",
        "updated_at": "2025-05-26 08:29:44",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 1,
            "date": "2025-05-09",
            "notes": "dsadsad",
            "status": "booked",
            "graft_count": 12121,
            "created_at": "2025-05-26 08:29:55",
            "updated_at": "2025-05-26 08:29:55",
            "patient_id": 5
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:30:06

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:30:06

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 09:30:06

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=5

## Response Log - 2025-05-26 09:30:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 5,
        "name": "test",
        "dob": "2025-05-09",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 08:29:44",
        "updated_at": "2025-05-26 08:29:44",
        "avatar": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:30:10

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:30:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 5,
            "name": "test",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 08:29:44",
            "updated_at": "2025-05-26 08:29:44",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:30:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:30:13

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 09:30:13

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:30:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:31:06

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:31:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:31:08

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:31:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:31:08

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:31:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "ayhan",
            "dob": "2025-05-17",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:29:03",
            "updated_at": "2025-05-26 08:29:03",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:31:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:31:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:31:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:31:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:31:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:31:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 6,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:31:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:31:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 7,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:31:20

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:31:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 6,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 7,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:10

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 6,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 7,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 6,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 7,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:34:14

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 7,
            "name": "test",
            "dob": "2025-05-04",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:31:20",
            "updated_at": "2025-05-26 08:31:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:34:16

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 8,
        "name": "Nurcan Sahin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:34:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 9,
        "name": "Nurcan Sahin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:34:24

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "Nurcan Sahin",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:24",
            "updated_at": "2025-05-26 08:34:24",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 9,
            "name": "Nurcan Sahin",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:24",
            "updated_at": "2025-05-26 08:34:24",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "Nurcan Sahin",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:24",
            "updated_at": "2025-05-26 08:34:24",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 9,
            "name": "Nurcan Sahin",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:24",
            "updated_at": "2025-05-26 08:34:24",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:43

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:34:43

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 8,
            "name": "Nurcan Sahin",
            "dob": "2025-05-10",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:24",
            "updated_at": "2025-05-26 08:34:24",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:34:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:46

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:34:53

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 10,
        "name": "Nurcan Sahin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:34:53

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:34:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 11,
        "name": "Nurcan Sahin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:34:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:34:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:36:11

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:36:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:36:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:36:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 12,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:36:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:36:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 13,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:36:21

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:36:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 13,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:34

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 13,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:36

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 13,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:39

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:38:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:38:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "test",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:36:20",
            "updated_at": "2025-05-26 08:36:20",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:42

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:38:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:38:42

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 11,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:44

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:38:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:38:44

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "Nurcan Sahin",
            "dob": "2025-05-09",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:34:53",
            "updated_at": "2025-05-26 08:34:53",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:38:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 09:38:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:38:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 14,
        "name": "test",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 09:38:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:38:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:38:52",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:38:54

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=14

## Response Log - 2025-05-26 09:38:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 14,
        "name": "test",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:38:52",
        "updated_at": "2025-05-26 08:38:52",
        "avatar": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:38:54

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=14

## Response Log - 2025-05-26 09:38:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 14,
        "name": "test",
        "dob": "2025-05-16",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:38:52",
        "updated_at": "2025-05-26 08:38:52",
        "avatar": null
    },
    "surgeries": [],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:39:00

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:39:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Avatar uploaded successfully.",
    "avatar_url": "uploads\/avatars\/avatar_683428a44ae3d.jpg"
}
```
---

## Request Log - 2025-05-26 09:39:00

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:39:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient updated successfully."
}
```
---

## Request Log - 2025-05-26 09:39:00

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:39:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:41:24

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:41:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:41:28

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:41:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:41:36

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 09:41:36

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
            "created_at": "2025-05-25 17:20:56",
            "updated_at": "2025-05-25 19:20:48"
        },
        {
            "id": 2,
            "email": "orangespringuk@gmail.com",
            "username": "root",
            "role": "user",
            "created_at": null,
            "updated_at": "2025-05-26 08:13:08"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:41:47

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:41:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:41:50

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:41:50

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 09:41:54

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:41:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": null
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:42:02

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:42:02

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

## Request Log - 2025-05-26 09:42:04

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:42:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:43:28

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:43:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:43:37

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:43:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:43:38

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-26 09:43:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "ayhan",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:26:33",
        "updated_at": "2025-05-26 08:27:33",
        "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg"
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:44:40

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-26 09:44:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "ayhan",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:26:33",
        "updated_at": "2025-05-26 08:27:33",
        "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg"
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:44:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-26 09:44:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-10",
        "notes": "dsadsa",
        "status": "booked",
        "graft_count": 213,
        "created_at": "2025-05-26 08:42:02",
        "updated_at": "2025-05-26 08:42:02",
        "patient_id": 1,
        "patient_name": "ayhan"
    }
}
```
---

## Request Log - 2025-05-26 09:44:43

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:44:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:44:47

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-26 09:44:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "ayhan",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:26:33",
        "updated_at": "2025-05-26 08:27:33",
        "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg"
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:42:02",
            "patient_id": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:44:49

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-26 09:44:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-10",
        "notes": "dsadsa",
        "status": "booked",
        "graft_count": 213,
        "created_at": "2025-05-26 08:42:02",
        "updated_at": "2025-05-26 08:42:02",
        "patient_id": 1,
        "patient_name": "ayhan"
    }
}
```
---

## Request Log - 2025-05-26 09:44:51

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:44:51

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-26 09:44:53

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 09:44:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:44:51",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 09:45:04

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-26 09:45:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "ayhan",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:26:33",
        "updated_at": "2025-05-26 08:27:33",
        "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg"
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:44:51",
            "patient_id": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:45:06

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-26 09:45:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-10",
        "notes": "dsadsa",
        "status": "booked",
        "graft_count": 213,
        "created_at": "2025-05-26 08:42:02",
        "updated_at": "2025-05-26 08:44:51",
        "patient_id": 1,
        "patient_name": "ayhan"
    }
}
```
---

## Request Log - 2025-05-26 09:46:00

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-26 09:46:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-10",
        "notes": "dsadsa",
        "status": "booked",
        "graft_count": 213,
        "created_at": "2025-05-26 08:42:02",
        "updated_at": "2025-05-26 08:44:51",
        "patient_id": 1,
        "patient_name": "ayhan"
    }
}
```
---

## Request Log - 2025-05-26 09:47:46

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=2

## Response Log - 2025-05-26 09:47:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 2,
        "date": "2025-05-10",
        "notes": "dsadsa",
        "status": "booked",
        "graft_count": 213,
        "created_at": "2025-05-26 08:42:02",
        "updated_at": "2025-05-26 08:44:51",
        "patient_id": 1,
        "patient_name": "ayhan"
    }
}
```
---

## Request Log - 2025-05-26 09:47:47

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 09:47:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-26 09:47:48

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=1

## Response Log - 2025-05-26 09:47:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 1,
        "name": "ayhan",
        "dob": "2025-05-01",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": 1,
        "created_at": "2025-05-26 08:26:33",
        "updated_at": "2025-05-26 08:27:33",
        "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg"
    },
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 09:53:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 09:53:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": "2025-05-10"
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 10:34:54

**Method:** POST
**URL:** /api.php
**Body:** {&quot;action&quot;:&quot;create_patient_surgery&quot;,&quot;date&quot;:&quot;25 March 2025&quot;,&quot;patient_name&quot;:&quot;C- DANNY ALCOCK&quot;}

## Response Log - 2025-05-26 10:34:54

**Status:** Error
**Details:**
```json
{
    "success": false,
    "message": "Invalid request: Missing entity or action.",
    "details": {
        "entity": null,
        "action": null,
        "method": "POST"
    }
}
```
---

## Request Log - 2025-05-26 10:37:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 10:37:20

**Status:** Error
**Details:**
```json
{
    "success": false,
    "message": "Invalid request: Missing entity or action.",
    "details": {
        "entity": null,
        "action": "add",
        "method": "POST"
    }
}
```
---

## Request Log - 2025-05-26 11:43:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:43:11

**Status:** Error
**Details:**
```json
{
    "success": false,
    "message": "Invalid request: Missing entity or action.",
    "details": {
        "entity": null,
        "action": "add",
        "method": "POST"
    }
}
```
---

## Request Log - 2025-05-26 11:43:27

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 11:43:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": "2025-05-10"
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:43:34

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:43:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 15,
        "name": "Emin ayhan colak",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 11:43:35

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 11:43:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 15,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 10:43:34",
            "updated_at": "2025-05-26 10:43:34",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": "2025-05-10"
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:43:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:43:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 16,
        "name": "test2",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 11:43:45

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 11:43:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 15,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 10:43:34",
            "updated_at": "2025-05-26 10:43:34",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": "2025-05-10"
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        },
        {
            "id": 16,
            "name": "test2",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 10:43:45",
            "updated_at": "2025-05-26 10:43:45",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:43:56

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:43:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:43:59

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 11:43:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 15,
            "name": "Emin ayhan colak",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 10:43:34",
            "updated_at": "2025-05-26 10:43:34",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 1,
            "name": "ayhan",
            "dob": "2025-05-01",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:26:33",
            "updated_at": "2025-05-26 08:27:33",
            "avatar": "uploads\/avatars\/avatar_683425ef084a4.jpg",
            "last_surgery_date": "2025-05-10"
        },
        {
            "id": 14,
            "name": "test",
            "dob": "2025-05-16",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 08:38:52",
            "updated_at": "2025-05-26 08:39:00",
            "avatar": "uploads\/avatars\/avatar_683428a44ae3d.jpg",
            "last_surgery_date": null
        },
        {
            "id": 16,
            "name": "test2",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": 1,
            "created_at": "2025-05-26 10:43:45",
            "updated_at": "2025-05-26 10:43:45",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:44:04

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:44:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 17,
        "name": "crm.drascom.uk",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 11:45:58

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:45:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "3",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 11:46:00

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:46:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "2025-05-15",
            "notes": "string",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:45:58",
            "updated_at": "2025-05-26 10:45:58",
            "patient_id": 16,
            "patient_name": "test2"
        },
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1,
            "patient_name": "ayhan"
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:47:48

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:47:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 18,
        "name": "R - Example Name",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 11:47:48

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:47:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "4",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 11:48:03

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:48:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "2025-05-15",
            "notes": "string",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:45:58",
            "updated_at": "2025-05-26 10:45:58",
            "patient_id": 16,
            "patient_name": "test2"
        },
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1,
            "patient_name": "ayhan"
        },
        {
            "id": 4,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:47:48",
            "updated_at": "2025-05-26 10:47:48",
            "patient_id": 18,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:48:06

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=18

## Response Log - 2025-05-26 11:48:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 18,
        "name": "R - Example Name",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 10:47:48",
        "updated_at": "2025-05-26 10:47:48",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 4,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:47:48",
            "updated_at": "2025-05-26 10:47:48",
            "patient_id": 18
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 11:48:08

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:48:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "2025-05-15",
            "notes": "string",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:45:58",
            "updated_at": "2025-05-26 10:45:58",
            "patient_id": 16,
            "patient_name": "test2"
        },
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1,
            "patient_name": "ayhan"
        },
        {
            "id": 4,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:47:48",
            "updated_at": "2025-05-26 10:47:48",
            "patient_id": 18,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:49:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:49:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 19,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 11:49:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 11:49:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "5",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 11:49:15

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:49:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 5,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:49:12",
            "updated_at": "2025-05-26 10:49:12",
            "patient_id": 19,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 3,
            "date": "2025-05-15",
            "notes": "string",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:45:58",
            "updated_at": "2025-05-26 10:45:58",
            "patient_id": 16,
            "patient_name": "test2"
        },
        {
            "id": 2,
            "date": "2025-05-10",
            "notes": "dsadsa",
            "status": "booked",
            "graft_count": 213,
            "created_at": "2025-05-26 08:42:02",
            "updated_at": "2025-05-26 08:47:47",
            "patient_id": 1,
            "patient_name": "ayhan"
        },
        {
            "id": 4,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:47:48",
            "updated_at": "2025-05-26 10:47:48",
            "patient_id": 18,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 11:49:17

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=19

## Response Log - 2025-05-26 11:49:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 19,
        "name": "DANNY ALCOCK",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 10:49:12",
        "updated_at": "2025-05-26 10:49:12",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 5,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 10:49:12",
            "updated_at": "2025-05-26 10:49:12",
            "patient_id": 19
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 11:59:55

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:59:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 11:59:57

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 11:59:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 11:59:58

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 11:59:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-26 11:59:59

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 11:59:59

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
            "created_at": "2025-05-26 10:59:55",
            "updated_at": "2025-05-26 10:59:55"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:00:11

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:00:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:00:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:00:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-26 12:00:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:00:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 1,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:00:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:00:23

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

## Request Log - 2025-05-26 12:00:40

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:00:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 1,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:00:23",
            "updated_at": "2025-05-26 11:00:23",
            "patient_id": 1,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:00:44

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:00:44

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 12:00:44

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:00:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:02:19

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:02:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:02:22

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:02:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:02:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:02:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 2,
        "name": "R - Example Name",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:02:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:02:26

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

## Request Log - 2025-05-26 12:02:33

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:02:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "patient_id": 2,
            "is_recorded": 0,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:02:34

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:02:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "patient_id": 2,
            "is_recorded": 0,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:04:08

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:04:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "patient_id": 2,
            "is_recorded": 0,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:04:10

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:04:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "patient_id": 2,
            "is_recorded": 0,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:09:16

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:09:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 2,
            "date": "10 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "patient_id": 2,
            "is_recorded": 0,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:09:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:09:20

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 12:09:20

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:09:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:09:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:09:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 3,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:09:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:09:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "3",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:09:33

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:09:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:09:36

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=3

## Response Log - 2025-05-26 12:09:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 3,
        "name": "DANNY ALCOCK",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 11:09:26",
        "updated_at": "2025-05-26 11:09:26",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 12:14:58

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:14:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:15:01

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:15:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:15:02

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:15:02

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:15:04

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=3

## Response Log - 2025-05-26 12:15:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 3,
        "date": "25 March 2025",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:09:26",
        "updated_at": "2025-05-26 11:09:26",
        "patient_id": 3,
        "is_recorded": 0,
        "patient_name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 12:15:06

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:15:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:15:19

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=3

## Response Log - 2025-05-26 12:15:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 3,
        "date": "25 March 2025",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:09:26",
        "updated_at": "2025-05-26 11:09:26",
        "patient_id": 3,
        "is_recorded": 0,
        "patient_name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 12:15:22

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:15:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:15:26

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=3

## Response Log - 2025-05-26 12:15:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 3,
        "date": "25 March 2025",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:09:26",
        "updated_at": "2025-05-26 11:09:26",
        "patient_id": 3,
        "is_recorded": 0,
        "patient_name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 12:16:39

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:16:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:17:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 4,
        "name": "R - Example Name",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:17:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:17:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "4",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:17:15

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 4,
            "date": "10\/03\/2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "patient_id": 4,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:17

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=4

## Response Log - 2025-05-26 12:17:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 4,
        "date": "10\/03\/2025",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:17:11",
        "updated_at": "2025-05-26 11:17:11",
        "patient_id": 4,
        "is_recorded": 1,
        "patient_name": "R - Example Name"
    }
}
```
---

## Request Log - 2025-05-26 12:17:21

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 4,
            "date": "10\/03\/2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "patient_id": 4,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:29

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 4,
            "date": "10\/03\/2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "patient_id": 4,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:32

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:17:32

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 12:17:32

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 3,
            "date": "25 March 2025",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "patient_id": 3,
            "is_recorded": 0,
            "patient_name": "DANNY ALCOCK"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:34

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:17:34

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 12:17:34

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:17:38

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:17:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:00:23",
            "updated_at": "2025-05-26 11:00:23",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 2,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 4,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:49

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:17:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "5",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:17:50

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:50

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 5,
            "date": "2025-05-17",
            "notes": "",
            "status": "booked",
            "graft_count": "",
            "created_at": "2025-05-26 11:17:49",
            "updated_at": "2025-05-26 11:17:49",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:17:53

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:17:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 5,
            "date": "2025-05-17",
            "notes": "",
            "status": "booked",
            "graft_count": "",
            "created_at": "2025-05-26 11:17:49",
            "updated_at": "2025-05-26 11:17:49",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:34

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:18:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 1,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:00:23",
            "updated_at": "2025-05-26 11:00:23",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 3,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 2,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        },
        {
            "id": 4,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:38

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 12:18:38

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:18:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 3,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:09:26",
            "updated_at": "2025-05-26 11:09:26",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 2,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        },
        {
            "id": 4,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:40

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 12:18:40

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:18:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 2,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:02:26",
            "updated_at": "2025-05-26 11:02:26",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        },
        {
            "id": 4,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:41

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 12:18:41

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:18:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 4,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:17:11",
            "updated_at": "2025-05-26 11:17:11",
            "avatar": null,
            "last_surgery_date": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:43

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 12:18:43

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:18:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": []
}
```
---

## Request Log - 2025-05-26 12:18:44

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:18:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 5,
            "date": "2025-05-17",
            "notes": "",
            "status": "booked",
            "graft_count": "",
            "created_at": "2025-05-26 11:17:49",
            "updated_at": "2025-05-26 11:17:49",
            "patient_id": 2,
            "is_recorded": 1,
            "patient_name": null
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:18:47

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:47

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 12:18:47

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:18:47

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": []
}
```
---

## Request Log - 2025-05-26 12:18:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 5,
        "name": "R - Example Name",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:18:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:18:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "6",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:19:14

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:19:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:19:15

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=6

## Response Log - 2025-05-26 12:19:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 6,
        "date": "2025-03-10",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:18:52",
        "updated_at": "2025-05-26 11:18:52",
        "patient_id": 5,
        "is_recorded": 1,
        "patient_name": "R - Example Name"
    }
}
```
---

## Request Log - 2025-05-26 12:19:18

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:19:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-26 12:19:20

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=5

## Response Log - 2025-05-26 12:19:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 5,
        "name": "R - Example Name",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 11:18:52",
        "updated_at": "2025-05-26 11:18:52",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:18",
            "patient_id": 5,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 12:19:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=get&id=6

## Response Log - 2025-05-26 12:19:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgery": {
        "id": 6,
        "date": "2025-03-10",
        "notes": "",
        "status": "booked",
        "graft_count": 0,
        "created_at": "2025-05-26 11:18:52",
        "updated_at": "2025-05-26 11:19:18",
        "patient_id": 5,
        "is_recorded": 1,
        "patient_name": "R - Example Name"
    }
}
```
---

## Request Log - 2025-05-26 12:19:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:19:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Surgery updated successfully."
}
```
---

## Request Log - 2025-05-26 12:19:27

**Method:** GET
**URL:** /api.php?entity=patients&action=get&id=5

## Response Log - 2025-05-26 12:19:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 5,
        "name": "R - Example Name",
        "dob": "",
        "surgery_id": null,
        "photo_album_id": null,
        "user_id": null,
        "created_at": "2025-05-26 11:18:52",
        "updated_at": "2025-05-26 11:18:52",
        "avatar": null
    },
    "surgeries": [
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1
        }
    ],
    "photos": []
}
```
---

## Request Log - 2025-05-26 12:20:49

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:20:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 6,
        "name": "Example Name",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:20:49

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:20:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "7",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:20:55

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:20:55

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:21:08

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:21:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 7,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:21:08

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:21:08

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "8",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:21:10

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:21:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 8,
        "name": "WILLIAM HUNT",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 12:21:10

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 12:21:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "9",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 12:21:12

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 12:21:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 8,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:08",
            "updated_at": "2025-05-26 11:21:08",
            "patient_id": 7,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 12:21:14

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 12:21:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:08",
            "updated_at": "2025-05-26 11:21:08",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:01:09

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:01:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:08",
            "updated_at": "2025-05-26 11:21:08",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:01:49

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:01:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 8,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:08",
            "updated_at": "2025-05-26 11:21:08",
            "patient_id": 7,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:01:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:01:52

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:01:52

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:01:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:01:57

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:01:57

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 7,
        "name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 13:02:06

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:02:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "10",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:02:09

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:02:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 10,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:02:06",
            "updated_at": "2025-05-26 12:02:06",
            "patient_id": 7,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:02:12

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:02:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 7,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:08",
            "updated_at": "2025-05-26 11:21:08",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:02:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:02:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 13:02:23

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:02:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:02:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:02:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 10,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:02:06",
            "updated_at": "2025-05-26 12:02:06",
            "patient_id": 7,
            "is_recorded": 1,
            "patient_name": null
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:02:30

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:02:30

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:02:30

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:02:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:04:50

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:04:50

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:04:56

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:04:56

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:04:56

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:04:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 9,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:04:56

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:04:56

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "11",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:05:00

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:00

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 11,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:04:56",
            "updated_at": "2025-05-26 12:04:56",
            "patient_id": 9,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:03

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 11,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:04:56",
            "updated_at": "2025-05-26 12:04:56",
            "patient_id": 9,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:04

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:04:56",
            "updated_at": "2025-05-26 12:04:56",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:06

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:06

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 11,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:04:56",
            "updated_at": "2025-05-26 12:04:56",
            "patient_id": 9,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:11

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:05:11

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:13

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 9,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:04:56",
            "updated_at": "2025-05-26 12:04:56",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 13:05:16

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:22

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:05:22

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:05:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 10,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:05:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "12",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:05:27

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 12,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:05:22",
            "updated_at": "2025-05-26 12:05:22",
            "patient_id": 10,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:30

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:30

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:22",
            "updated_at": "2025-05-26 12:05:22",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:32

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 10,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:22",
            "updated_at": "2025-05-26 12:05:22",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:40

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 13:05:40

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:40

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:42

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:42

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 12,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:05:22",
            "updated_at": "2025-05-26 12:05:22",
            "patient_id": 10,
            "is_recorded": 1,
            "patient_name": null
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:45

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:45

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:05:45

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:49

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:05:49

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:05:49

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 11,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:05:49

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:49

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "13",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:05:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:53

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:05:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:54

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 13,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "patient_id": 11,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:05:58

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:05:58

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:05:58

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:05:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:04

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:06:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 13:06:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "14",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:06:15

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:15

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 14,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:11",
            "updated_at": "2025-05-26 12:06:11",
            "patient_id": 11,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:17

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:21

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 14,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:11",
            "updated_at": "2025-05-26 12:06:11",
            "patient_id": 11,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:24

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:06:24

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:29

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:06:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patient": {
        "id": 11,
        "name": "DANNY ALCOCK"
    }
}
```
---

## Request Log - 2025-05-26 13:06:31

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 12,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:06:31

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:31

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "15",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:06:33

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:33

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:36

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 15,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "patient_id": 12,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:39

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 11,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:05:49",
            "updated_at": "2025-05-26 12:05:49",
            "avatar": null,
            "last_surgery_date": null
        },
        {
            "id": 12,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:43

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 13:06:43

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 12,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:44

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 15,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "patient_id": 12,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:46

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:46

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 15,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "patient_id": 12,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:48

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 12,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:52

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient deleted successfully."
}
```
---

## Request Log - 2025-05-26 13:06:52

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:06:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:53

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:53

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 15,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "patient_id": 12,
            "is_recorded": 1,
            "patient_name": null
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:54

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:54

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 15,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:06:31",
            "updated_at": "2025-05-26 12:06:31",
            "patient_id": 12,
            "is_recorded": 1,
            "patient_name": null
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:06:58

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:06:58

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 13:06:58

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:06:58

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:07:03

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=DANNY%20ALCOCK

## Response Log - 2025-05-26 13:07:03

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:03

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 13,
        "name": "DANNY ALCOCK",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:03

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "16",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:11

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=JOE%20ROBSON

## Response Log - 2025-05-26 13:07:11

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 14,
        "name": "JOE ROBSON",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "17",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:13

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=David%20Andrew%20Jones

## Response Log - 2025-05-26 13:07:13

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 15,
        "name": "David Andrew Jones",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "18",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:14

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Luke%20Parker

## Response Log - 2025-05-26 13:07:14

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 16,
        "name": "Luke Parker",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "19",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:16

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Chamal%20Hettiarachchi

## Response Log - 2025-05-26 13:07:16

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 17,
        "name": "Chamal Hettiarachchi",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "20",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:18

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Oli%20Mason

## Response Log - 2025-05-26 13:07:18

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:18

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 18,
        "name": "Oli Mason",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:18

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "21",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:22

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Liv%20Patient%20-%20B.%20Hudges%20%2F%2F%20Staff

## Response Log - 2025-05-26 13:07:22

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 19,
        "name": "Liv Patient - B. Hudges \/\/ Staff",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "22",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:23

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Ben%20Arney

## Response Log - 2025-05-26 13:07:23

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 20,
        "name": "Ben Arney",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "23",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:24

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Damien%20Conybeare-Jones

## Response Log - 2025-05-26 13:07:24

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 21,
        "name": "Damien Conybeare-Jones",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "24",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:25

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Lucifer%20OShea

## Response Log - 2025-05-26 13:07:25

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 22,
        "name": "Lucifer OShea",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "25",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:26

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Priyesh%20Pattni

## Response Log - 2025-05-26 13:07:26

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:07:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 23,
        "name": "Priyesh Pattni",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:07:26

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:07:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "26",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:07:29

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:07:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:07:32

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:07:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:07:34

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:07:34

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:07:35

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:07:35

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:09:11

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Daniel%20Ryan%20Hall

## Response Log - 2025-05-26 13:09:11

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 24,
        "name": "Daniel Ryan Hall",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "27",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:16

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=William%20Michael%20Pentland

## Response Log - 2025-05-26 13:09:16

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 25,
        "name": "William Michael Pentland",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:16

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:16

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "28",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:19

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Steve%20Pardoe

## Response Log - 2025-05-26 13:09:19

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 26,
        "name": "Steve Pardoe",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:19

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "29",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:20

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Nate%20Turner

## Response Log - 2025-05-26 13:09:20

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 27,
        "name": "Nate Turner",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:20

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:20

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "30",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Andy%20Newell

## Response Log - 2025-05-26 13:09:21

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 28,
        "name": "Andy Newell",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "31",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Thomas%20Gray

## Response Log - 2025-05-26 13:09:21

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 29,
        "name": "Thomas Gray",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:21

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "32",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:22

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Joe%20Callaway

## Response Log - 2025-05-26 13:09:22

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 30,
        "name": "Joe Callaway",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:22

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "33",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:23

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=c%20-%20Sipan%20Mohammed

## Response Log - 2025-05-26 13:09:23

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 31,
        "name": "c - Sipan Mohammed",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:23

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "34",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:24

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Bradley%20Wilson

## Response Log - 2025-05-26 13:09:24

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 32,
        "name": "Bradley Wilson",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:24

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:24

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "35",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:25

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=TONY%20MORGAN

## Response Log - 2025-05-26 13:09:25

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 33,
        "name": "TONY MORGAN",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:25

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "36",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Kris%20Bell

## Response Log - 2025-05-26 13:09:27

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 34,
        "name": "Kris Bell",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "37",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Jack%20Hanney

## Response Log - 2025-05-26 13:09:27

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 35,
        "name": "Jack Hanney",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:27

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "38",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:28

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=John%20Paul%20Walsh

## Response Log - 2025-05-26 13:09:28

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:28

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 36,
        "name": "John Paul Walsh",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:28

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "39",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:29

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Andrew%20Lewis

## Response Log - 2025-05-26 13:09:29

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:29

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 37,
        "name": "Andrew Lewis",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:29

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:29

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "40",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:09:59

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Bob%20Cesna

## Response Log - 2025-05-26 13:09:59

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:09:59

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 38,
        "name": "Bob Cesna",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:09:59

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:09:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "41",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:04

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Daniel%20Wilson%20Dunwell

## Response Log - 2025-05-26 13:10:04

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:04

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 39,
        "name": "Daniel Wilson Dunwell",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:04

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:04

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "42",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:04

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Wojciech%20Etz

## Response Log - 2025-05-26 13:10:05

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:05

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 40,
        "name": "Wojciech Etz",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:05

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "43",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:05

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Dan%20Storey

## Response Log - 2025-05-26 13:10:05

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:05

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 41,
        "name": "Dan Storey",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:05

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:05

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "44",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:09

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Jamie%20Wanless

## Response Log - 2025-05-26 13:10:09

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:09

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 42,
        "name": "Jamie Wanless",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:09

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:09

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "45",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:11

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Sean%20Mullins

## Response Log - 2025-05-26 13:10:11

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 43,
        "name": "Sean Mullins",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:11

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:11

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "46",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:12

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Henry%20Dorkin

## Response Log - 2025-05-26 13:10:12

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 44,
        "name": "Henry Dorkin",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:12

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:12

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "47",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:13

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Bradley%20Reynolds

## Response Log - 2025-05-26 13:10:13

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 45,
        "name": "Bradley Reynolds",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:13

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "48",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:14

**Method:** GET
**URL:** /api.php?entity=patient_lookup&action=find_by_name&name=Nathan%20Sutcliffe

## Response Log - 2025-05-26 13:10:14

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Patient not found."
}
```
---

## Request Log - 2025-05-26 13:10:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Patient added successfully.",
    "patient": {
        "id": 46,
        "name": "Nathan Sutcliffe",
        "avatar": null
    }
}
```
---

## Request Log - 2025-05-26 13:10:14

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 13:10:14

**Status:** Success
**Details:**
```json
{
    "success": true,
    "id": "49",
    "message": "Surgery added successfully."
}
```
---

## Request Log - 2025-05-26 13:10:17

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:10:17

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 49,
            "date": "2025-06-26",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:14",
            "updated_at": "2025-05-26 12:10:14",
            "patient_id": 46,
            "is_recorded": 1,
            "patient_name": "Nathan Sutcliffe"
        },
        {
            "id": 48,
            "date": "2025-06-20",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:13",
            "updated_at": "2025-05-26 12:10:13",
            "patient_id": 45,
            "is_recorded": 1,
            "patient_name": "Bradley Reynolds"
        },
        {
            "id": 47,
            "date": "2025-06-19",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:12",
            "updated_at": "2025-05-26 12:10:12",
            "patient_id": 44,
            "is_recorded": 1,
            "patient_name": "Henry Dorkin"
        },
        {
            "id": 46,
            "date": "2025-06-16",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:11",
            "updated_at": "2025-05-26 12:10:11",
            "patient_id": 43,
            "is_recorded": 1,
            "patient_name": "Sean Mullins"
        },
        {
            "id": 45,
            "date": "2025-06-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:09",
            "updated_at": "2025-05-26 12:10:09",
            "patient_id": 42,
            "is_recorded": 1,
            "patient_name": "Jamie Wanless"
        },
        {
            "id": 44,
            "date": "2025-06-04",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "patient_id": 41,
            "is_recorded": 1,
            "patient_name": "Dan Storey"
        },
        {
            "id": 43,
            "date": "2025-06-03",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "patient_id": 40,
            "is_recorded": 1,
            "patient_name": "Wojciech Etz"
        },
        {
            "id": 42,
            "date": "2025-06-02",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:04",
            "updated_at": "2025-05-26 12:10:04",
            "patient_id": 39,
            "is_recorded": 1,
            "patient_name": "Daniel Wilson Dunwell"
        },
        {
            "id": 41,
            "date": "2025-05-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:59",
            "updated_at": "2025-05-26 12:09:59",
            "patient_id": 38,
            "is_recorded": 1,
            "patient_name": "Bob Cesna"
        },
        {
            "id": 40,
            "date": "2025-05-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:29",
            "updated_at": "2025-05-26 12:09:29",
            "patient_id": 37,
            "is_recorded": 1,
            "patient_name": "Andrew Lewis"
        },
        {
            "id": 39,
            "date": "2025-05-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:28",
            "updated_at": "2025-05-26 12:09:28",
            "patient_id": 36,
            "is_recorded": 1,
            "patient_name": "John Paul Walsh"
        },
        {
            "id": 38,
            "date": "2025-05-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "patient_id": 35,
            "is_recorded": 1,
            "patient_name": "Jack Hanney"
        },
        {
            "id": 37,
            "date": "2025-05-22",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "patient_id": 34,
            "is_recorded": 1,
            "patient_name": "Kris Bell"
        },
        {
            "id": 36,
            "date": "2025-05-21",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:25",
            "updated_at": "2025-05-26 12:09:25",
            "patient_id": 33,
            "is_recorded": 1,
            "patient_name": "TONY MORGAN"
        },
        {
            "id": 35,
            "date": "2025-05-20",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:24",
            "updated_at": "2025-05-26 12:09:24",
            "patient_id": 32,
            "is_recorded": 1,
            "patient_name": "Bradley Wilson"
        },
        {
            "id": 34,
            "date": "2025-05-19",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:23",
            "updated_at": "2025-05-26 12:09:23",
            "patient_id": 31,
            "is_recorded": 1,
            "patient_name": "c - Sipan Mohammed"
        },
        {
            "id": 33,
            "date": "2025-05-16",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:22",
            "updated_at": "2025-05-26 12:09:22",
            "patient_id": 30,
            "is_recorded": 1,
            "patient_name": "Joe Callaway"
        },
        {
            "id": 32,
            "date": "2025-05-15",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "patient_id": 29,
            "is_recorded": 1,
            "patient_name": "Thomas Gray"
        },
        {
            "id": 31,
            "date": "2025-05-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "patient_id": 28,
            "is_recorded": 1,
            "patient_name": "Andy Newell"
        },
        {
            "id": 30,
            "date": "2025-05-13",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:20",
            "updated_at": "2025-05-26 12:09:20",
            "patient_id": 27,
            "is_recorded": 1,
            "patient_name": "Nate Turner"
        },
        {
            "id": 29,
            "date": "2025-05-12",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:19",
            "updated_at": "2025-05-26 12:09:19",
            "patient_id": 26,
            "is_recorded": 1,
            "patient_name": "Steve Pardoe"
        },
        {
            "id": 28,
            "date": "2025-05-02",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:16",
            "updated_at": "2025-05-26 12:09:16",
            "patient_id": 25,
            "is_recorded": 1,
            "patient_name": "William Michael Pentland"
        },
        {
            "id": 27,
            "date": "2025-05-01",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:11",
            "updated_at": "2025-05-26 12:09:11",
            "patient_id": 24,
            "is_recorded": 1,
            "patient_name": "Daniel Ryan Hall"
        },
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:10:25

**Method:** GET
**URL:** /api.php?entity=surgeries&action=list

## Response Log - 2025-05-26 13:10:25

**Status:** Success
**Details:**
```json
{
    "success": true,
    "surgeries": [
        {
            "id": 49,
            "date": "2025-06-26",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:14",
            "updated_at": "2025-05-26 12:10:14",
            "patient_id": 46,
            "is_recorded": 1,
            "patient_name": "Nathan Sutcliffe"
        },
        {
            "id": 48,
            "date": "2025-06-20",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:13",
            "updated_at": "2025-05-26 12:10:13",
            "patient_id": 45,
            "is_recorded": 1,
            "patient_name": "Bradley Reynolds"
        },
        {
            "id": 47,
            "date": "2025-06-19",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:12",
            "updated_at": "2025-05-26 12:10:12",
            "patient_id": 44,
            "is_recorded": 1,
            "patient_name": "Henry Dorkin"
        },
        {
            "id": 46,
            "date": "2025-06-16",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:11",
            "updated_at": "2025-05-26 12:10:11",
            "patient_id": 43,
            "is_recorded": 1,
            "patient_name": "Sean Mullins"
        },
        {
            "id": 45,
            "date": "2025-06-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:09",
            "updated_at": "2025-05-26 12:10:09",
            "patient_id": 42,
            "is_recorded": 1,
            "patient_name": "Jamie Wanless"
        },
        {
            "id": 44,
            "date": "2025-06-04",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "patient_id": 41,
            "is_recorded": 1,
            "patient_name": "Dan Storey"
        },
        {
            "id": 43,
            "date": "2025-06-03",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "patient_id": 40,
            "is_recorded": 1,
            "patient_name": "Wojciech Etz"
        },
        {
            "id": 42,
            "date": "2025-06-02",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:10:04",
            "updated_at": "2025-05-26 12:10:04",
            "patient_id": 39,
            "is_recorded": 1,
            "patient_name": "Daniel Wilson Dunwell"
        },
        {
            "id": 41,
            "date": "2025-05-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:59",
            "updated_at": "2025-05-26 12:09:59",
            "patient_id": 38,
            "is_recorded": 1,
            "patient_name": "Bob Cesna"
        },
        {
            "id": 40,
            "date": "2025-05-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:29",
            "updated_at": "2025-05-26 12:09:29",
            "patient_id": 37,
            "is_recorded": 1,
            "patient_name": "Andrew Lewis"
        },
        {
            "id": 39,
            "date": "2025-05-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:28",
            "updated_at": "2025-05-26 12:09:28",
            "patient_id": 36,
            "is_recorded": 1,
            "patient_name": "John Paul Walsh"
        },
        {
            "id": 38,
            "date": "2025-05-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "patient_id": 35,
            "is_recorded": 1,
            "patient_name": "Jack Hanney"
        },
        {
            "id": 37,
            "date": "2025-05-22",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "patient_id": 34,
            "is_recorded": 1,
            "patient_name": "Kris Bell"
        },
        {
            "id": 36,
            "date": "2025-05-21",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:25",
            "updated_at": "2025-05-26 12:09:25",
            "patient_id": 33,
            "is_recorded": 1,
            "patient_name": "TONY MORGAN"
        },
        {
            "id": 35,
            "date": "2025-05-20",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:24",
            "updated_at": "2025-05-26 12:09:24",
            "patient_id": 32,
            "is_recorded": 1,
            "patient_name": "Bradley Wilson"
        },
        {
            "id": 34,
            "date": "2025-05-19",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:23",
            "updated_at": "2025-05-26 12:09:23",
            "patient_id": 31,
            "is_recorded": 1,
            "patient_name": "c - Sipan Mohammed"
        },
        {
            "id": 33,
            "date": "2025-05-16",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:22",
            "updated_at": "2025-05-26 12:09:22",
            "patient_id": 30,
            "is_recorded": 1,
            "patient_name": "Joe Callaway"
        },
        {
            "id": 32,
            "date": "2025-05-15",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "patient_id": 29,
            "is_recorded": 1,
            "patient_name": "Thomas Gray"
        },
        {
            "id": 31,
            "date": "2025-05-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "patient_id": 28,
            "is_recorded": 1,
            "patient_name": "Andy Newell"
        },
        {
            "id": 30,
            "date": "2025-05-13",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:20",
            "updated_at": "2025-05-26 12:09:20",
            "patient_id": 27,
            "is_recorded": 1,
            "patient_name": "Nate Turner"
        },
        {
            "id": 29,
            "date": "2025-05-12",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:19",
            "updated_at": "2025-05-26 12:09:19",
            "patient_id": 26,
            "is_recorded": 1,
            "patient_name": "Steve Pardoe"
        },
        {
            "id": 28,
            "date": "2025-05-02",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:16",
            "updated_at": "2025-05-26 12:09:16",
            "patient_id": 25,
            "is_recorded": 1,
            "patient_name": "William Michael Pentland"
        },
        {
            "id": 27,
            "date": "2025-05-01",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:09:11",
            "updated_at": "2025-05-26 12:09:11",
            "patient_id": 24,
            "is_recorded": 1,
            "patient_name": "Daniel Ryan Hall"
        },
        {
            "id": 26,
            "date": "2025-04-29",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "patient_id": 23,
            "is_recorded": 1,
            "patient_name": "Priyesh Pattni"
        },
        {
            "id": 25,
            "date": "2025-04-28",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "patient_id": 22,
            "is_recorded": 1,
            "patient_name": "Lucifer OShea"
        },
        {
            "id": 24,
            "date": "2025-04-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "patient_id": 21,
            "is_recorded": 1,
            "patient_name": "Damien Conybeare-Jones"
        },
        {
            "id": 23,
            "date": "2025-04-24",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "patient_id": 20,
            "is_recorded": 1,
            "patient_name": "Ben Arney"
        },
        {
            "id": 22,
            "date": "2025-04-23",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "patient_id": 19,
            "is_recorded": 1,
            "patient_name": "Liv Patient - B. Hudges \/\/ Staff"
        },
        {
            "id": 21,
            "date": "2025-04-14",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "patient_id": 18,
            "is_recorded": 1,
            "patient_name": "Oli Mason"
        },
        {
            "id": 20,
            "date": "2025-04-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "patient_id": 17,
            "is_recorded": 1,
            "patient_name": "Chamal Hettiarachchi"
        },
        {
            "id": 19,
            "date": "2025-04-09",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "patient_id": 16,
            "is_recorded": 1,
            "patient_name": "Luke Parker"
        },
        {
            "id": 18,
            "date": "2025-04-08",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "patient_id": 15,
            "is_recorded": 1,
            "patient_name": "David Andrew Jones"
        },
        {
            "id": 17,
            "date": "2025-04-07",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "patient_id": 14,
            "is_recorded": 1,
            "patient_name": "JOE ROBSON"
        },
        {
            "id": 9,
            "date": "2025-03-27",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "patient_id": 8,
            "is_recorded": 1,
            "patient_name": "WILLIAM HUNT"
        },
        {
            "id": 16,
            "date": "2025-03-25",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "patient_id": 13,
            "is_recorded": 1,
            "patient_name": "DANNY ALCOCK"
        },
        {
            "id": 7,
            "date": "2025-03-11",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "patient_id": 6,
            "is_recorded": 1,
            "patient_name": "Example Name"
        },
        {
            "id": 6,
            "date": "2025-03-10",
            "notes": "",
            "status": "booked",
            "graft_count": 0,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:19:25",
            "patient_id": 5,
            "is_recorded": 1,
            "patient_name": "R - Example Name"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:10:32

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 13:10:32

**Status:** Success
**Details:**
```json
{
    "success": true,
    "patients": [
        {
            "id": 37,
            "name": "Andrew Lewis",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:29",
            "updated_at": "2025-05-26 12:09:29",
            "avatar": null,
            "last_surgery_date": "2025-05-28"
        },
        {
            "id": 28,
            "name": "Andy Newell",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "avatar": null,
            "last_surgery_date": "2025-05-14"
        },
        {
            "id": 20,
            "name": "Ben Arney",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:23",
            "updated_at": "2025-05-26 12:07:23",
            "avatar": null,
            "last_surgery_date": "2025-04-24"
        },
        {
            "id": 38,
            "name": "Bob Cesna",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:59",
            "updated_at": "2025-05-26 12:09:59",
            "avatar": null,
            "last_surgery_date": "2025-05-29"
        },
        {
            "id": 45,
            "name": "Bradley Reynolds",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:13",
            "updated_at": "2025-05-26 12:10:13",
            "avatar": null,
            "last_surgery_date": "2025-06-20"
        },
        {
            "id": 32,
            "name": "Bradley Wilson",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:24",
            "updated_at": "2025-05-26 12:09:24",
            "avatar": null,
            "last_surgery_date": "2025-05-20"
        },
        {
            "id": 17,
            "name": "Chamal Hettiarachchi",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:16",
            "updated_at": "2025-05-26 12:07:16",
            "avatar": null,
            "last_surgery_date": "2025-04-11"
        },
        {
            "id": 13,
            "name": "DANNY ALCOCK",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:03",
            "updated_at": "2025-05-26 12:07:03",
            "avatar": null,
            "last_surgery_date": "2025-03-25"
        },
        {
            "id": 21,
            "name": "Damien Conybeare-Jones",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:24",
            "updated_at": "2025-05-26 12:07:24",
            "avatar": null,
            "last_surgery_date": "2025-04-25"
        },
        {
            "id": 41,
            "name": "Dan Storey",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "avatar": null,
            "last_surgery_date": "2025-06-04"
        },
        {
            "id": 24,
            "name": "Daniel Ryan Hall",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:11",
            "updated_at": "2025-05-26 12:09:11",
            "avatar": null,
            "last_surgery_date": "2025-05-01"
        },
        {
            "id": 39,
            "name": "Daniel Wilson Dunwell",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:04",
            "updated_at": "2025-05-26 12:10:04",
            "avatar": null,
            "last_surgery_date": "2025-06-02"
        },
        {
            "id": 15,
            "name": "David Andrew Jones",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:13",
            "updated_at": "2025-05-26 12:07:13",
            "avatar": null,
            "last_surgery_date": "2025-04-08"
        },
        {
            "id": 6,
            "name": "Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:20:49",
            "updated_at": "2025-05-26 11:20:49",
            "avatar": null,
            "last_surgery_date": "2025-03-11"
        },
        {
            "id": 44,
            "name": "Henry Dorkin",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:12",
            "updated_at": "2025-05-26 12:10:12",
            "avatar": null,
            "last_surgery_date": "2025-06-19"
        },
        {
            "id": 14,
            "name": "JOE ROBSON",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:11",
            "updated_at": "2025-05-26 12:07:11",
            "avatar": null,
            "last_surgery_date": "2025-04-07"
        },
        {
            "id": 35,
            "name": "Jack Hanney",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "avatar": null,
            "last_surgery_date": "2025-05-23"
        },
        {
            "id": 42,
            "name": "Jamie Wanless",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:09",
            "updated_at": "2025-05-26 12:10:09",
            "avatar": null,
            "last_surgery_date": "2025-06-10"
        },
        {
            "id": 30,
            "name": "Joe Callaway",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:22",
            "updated_at": "2025-05-26 12:09:22",
            "avatar": null,
            "last_surgery_date": "2025-05-16"
        },
        {
            "id": 36,
            "name": "John Paul Walsh",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:28",
            "updated_at": "2025-05-26 12:09:28",
            "avatar": null,
            "last_surgery_date": "2025-05-27"
        },
        {
            "id": 34,
            "name": "Kris Bell",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:27",
            "updated_at": "2025-05-26 12:09:27",
            "avatar": null,
            "last_surgery_date": "2025-05-22"
        },
        {
            "id": 19,
            "name": "Liv Patient - B. Hudges \/\/ Staff",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:22",
            "updated_at": "2025-05-26 12:07:22",
            "avatar": null,
            "last_surgery_date": "2025-04-23"
        },
        {
            "id": 22,
            "name": "Lucifer OShea",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:25",
            "updated_at": "2025-05-26 12:07:25",
            "avatar": null,
            "last_surgery_date": "2025-04-28"
        },
        {
            "id": 16,
            "name": "Luke Parker",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:14",
            "updated_at": "2025-05-26 12:07:14",
            "avatar": null,
            "last_surgery_date": "2025-04-09"
        },
        {
            "id": 27,
            "name": "Nate Turner",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:20",
            "updated_at": "2025-05-26 12:09:20",
            "avatar": null,
            "last_surgery_date": "2025-05-13"
        },
        {
            "id": 46,
            "name": "Nathan Sutcliffe",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:14",
            "updated_at": "2025-05-26 12:10:14",
            "avatar": null,
            "last_surgery_date": "2025-06-26"
        },
        {
            "id": 18,
            "name": "Oli Mason",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:18",
            "updated_at": "2025-05-26 12:07:18",
            "avatar": null,
            "last_surgery_date": "2025-04-14"
        },
        {
            "id": 23,
            "name": "Priyesh Pattni",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:07:26",
            "updated_at": "2025-05-26 12:07:26",
            "avatar": null,
            "last_surgery_date": "2025-04-29"
        },
        {
            "id": 5,
            "name": "R - Example Name",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:18:52",
            "updated_at": "2025-05-26 11:18:52",
            "avatar": null,
            "last_surgery_date": "2025-03-10"
        },
        {
            "id": 43,
            "name": "Sean Mullins",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:11",
            "updated_at": "2025-05-26 12:10:11",
            "avatar": null,
            "last_surgery_date": "2025-06-16"
        },
        {
            "id": 26,
            "name": "Steve Pardoe",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:19",
            "updated_at": "2025-05-26 12:09:19",
            "avatar": null,
            "last_surgery_date": "2025-05-12"
        },
        {
            "id": 33,
            "name": "TONY MORGAN",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:25",
            "updated_at": "2025-05-26 12:09:25",
            "avatar": null,
            "last_surgery_date": "2025-05-21"
        },
        {
            "id": 29,
            "name": "Thomas Gray",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:21",
            "updated_at": "2025-05-26 12:09:21",
            "avatar": null,
            "last_surgery_date": "2025-05-15"
        },
        {
            "id": 8,
            "name": "WILLIAM HUNT",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 11:21:10",
            "updated_at": "2025-05-26 11:21:10",
            "avatar": null,
            "last_surgery_date": "2025-03-27"
        },
        {
            "id": 25,
            "name": "William Michael Pentland",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:16",
            "updated_at": "2025-05-26 12:09:16",
            "avatar": null,
            "last_surgery_date": "2025-05-02"
        },
        {
            "id": 40,
            "name": "Wojciech Etz",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:10:05",
            "updated_at": "2025-05-26 12:10:05",
            "avatar": null,
            "last_surgery_date": "2025-06-03"
        },
        {
            "id": 31,
            "name": "c - Sipan Mohammed",
            "dob": "",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:09:23",
            "updated_at": "2025-05-26 12:09:23",
            "avatar": null,
            "last_surgery_date": "2025-05-19"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:10:36

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 13:10:36

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
            "created_at": "2025-05-26 10:59:55",
            "updated_at": "2025-05-26 10:59:55"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:26:01

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 13:26:01

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "admin",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 10:59:55"
    }
}
```
---

## Request Log - 2025-05-26 13:26:08

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 13:26:08

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
            "created_at": "2025-05-26 10:59:55",
            "updated_at": "2025-05-26 10:59:55"
        }
    ]
}
```
---

## Request Log - 2025-05-26 13:26:10

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 13:26:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "admin",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 10:59:55"
    }
}
```
---

## Request Log - 2025-05-26 13:26:16

**Method:** POST
**URL:** /api.php
**Body:** {&quot;entity&quot;:&quot;users&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;username&quot;:&quot;admin1&quot;,&quot;role&quot;:&quot;admin&quot;,&quot;id&quot;:&quot;1&quot;,&quot;action&quot;:&quot;edit&quot;}

## Response Log - 2025-05-26 13:26:16

**Status:** Error
**Details:**
```json
{
    "success": false,
    "message": "Invalid request: Missing entity or action.",
    "details": {
        "entity": null,
        "action": null,
        "method": "POST"
    }
}
```
---

