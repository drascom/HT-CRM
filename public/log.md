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

