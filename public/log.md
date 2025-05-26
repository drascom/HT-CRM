## Request Log - 2025-05-26 15:19:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:19:19

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:20:27

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:20:27

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
        "updated_at": "2025-05-26 12:31:24"
    }
}
```
---

## Request Log - 2025-05-26 15:20:28

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:20:28

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:20:31

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:20:31

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
        "updated_at": "2025-05-26 12:31:24"
    }
}
```
---

## Request Log - 2025-05-26 15:20:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:20:33

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:22:13

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:22:13

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:22:17

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:22:17

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
        "updated_at": "2025-05-26 12:31:24"
    }
}
```
---

## Request Log - 2025-05-26 15:22:18

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:22:18

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
        "updated_at": "2025-05-26 12:31:24"
    }
}
```
---

## Request Log - 2025-05-26 15:22:19

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:22:19

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:23:38

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:23:38

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:24:49

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 15:24:49

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
            "updated_at": "2025-05-26 12:31:24"
        },
        {
            "id": 2,
            "email": "orangespringuk@gmail.com",
            "username": "dsada",
            "role": "user",
            "created_at": "2025-05-26 12:31:20",
            "updated_at": "2025-05-26 12:37:11"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:24:50

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:24:50

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
        "updated_at": "2025-05-26 12:31:24"
    }
}
```
---

## Request Log - 2025-05-26 15:24:53

**Method:** POST
**URL:** /api.php
**Body:** {&quot;entity&quot;:&quot;users&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;role&quot;:&quot;admin&quot;,&quot;id&quot;:&quot;1&quot;,&quot;action&quot;:&quot;edit&quot;}

## Response Log - 2025-05-26 15:24:53

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:24:53

**Method:** GET
**URL:** /api.php?entity=users&action=list

## Response Log - 2025-05-26 15:24:53

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
            "updated_at": "2025-05-26 14:24:53"
        },
        {
            "id": 2,
            "email": "orangespringuk@gmail.com",
            "username": "dsada",
            "role": "user",
            "created_at": "2025-05-26 12:31:20",
            "updated_at": "2025-05-26 12:37:11"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:28:34

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:28:34

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
        "updated_at": "2025-05-26 14:24:53"
    }
}
```
---

## Request Log - 2025-05-26 15:28:35

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:28:35

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:28:38

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:28:38

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
        "updated_at": "2025-05-26 14:24:53"
    }
}
```
---

## Request Log - 2025-05-26 15:28:40

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:28:40

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "ID, email and username are required."
}
```
---

## Request Log - 2025-05-26 15:31:28

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:31:28

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
        "updated_at": "2025-05-26 14:24:53"
    }
}
```
---

## Request Log - 2025-05-26 15:31:29

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:31:29

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:31:34

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin1&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:31:34

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:31:36

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:31:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin1",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:34"
    }
}
```
---

## Request Log - 2025-05-26 15:31:39

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:31:39

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:31:44

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:31:44

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:31:51

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:31:51

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "Invalid request for action 'change_password' with method 'POST'."
}
```
---

## Request Log - 2025-05-26 15:34:28

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:34:28

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:34:33

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:34:33

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:35:50

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:35:50

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:35:55

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:35:55

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:37:23

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:37:23

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:37:26

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:37:26

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:37:27

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:37:27

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:37:31

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:37:31

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": "All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:38:36

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:38:36

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": " All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:38:43

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:38:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:38:48

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:38:48

**Status:** Error
**Details:**
```json
{
    "success": false,
    "error": " All password fields are required."
}
```
---

## Request Log - 2025-05-26 15:39:38

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:39:38

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:39:40

**Method:** POST
**URL:** /api.php

## Response Log - 2025-05-26 15:39:41

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Password changed successfully."
}
```
---

## Request Log - 2025-05-26 15:41:39

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:41:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:31:39"
    }
}
```
---

## Request Log - 2025-05-26 15:41:42

**Method:** POST
**URL:** /api.php
**Body:** {&quot;user_id&quot;:&quot;1&quot;,&quot;new_password&quot;:&quot;1&quot;,&quot;confirm_password&quot;:&quot;1&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;change_password&quot;}

## Response Log - 2025-05-26 15:41:43

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Password changed successfully."
}
```
---

## Request Log - 2025-05-26 15:41:46

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:41:46

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:41:50

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 15:41:50

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
            "updated_at": "2025-05-26 12:37:55",
            "avatar": "uploads\/avatars\/avatar_683460a37cf7e.jpeg",
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
        },
        {
            "id": 47,
            "name": "deneme",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:31:03",
            "updated_at": "2025-05-26 12:31:03",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:41:52

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:41:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:41:57

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 15:41:57

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
            "updated_at": "2025-05-26 12:37:55",
            "avatar": "uploads\/avatars\/avatar_683460a37cf7e.jpeg",
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
        },
        {
            "id": 47,
            "name": "deneme",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:31:03",
            "updated_at": "2025-05-26 12:31:03",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:42:02

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 15:42:02

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
            "updated_at": "2025-05-26 12:37:55",
            "avatar": "uploads\/avatars\/avatar_683460a37cf7e.jpeg",
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
        },
        {
            "id": 47,
            "name": "deneme",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:31:03",
            "updated_at": "2025-05-26 12:31:03",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:42:31

**Method:** GET
**URL:** /api.php?entity=patients&action=list

## Response Log - 2025-05-26 15:42:31

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
            "updated_at": "2025-05-26 12:37:55",
            "avatar": "uploads\/avatars\/avatar_683460a37cf7e.jpeg",
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
        },
        {
            "id": 47,
            "name": "deneme",
            "dob": "2025-05-02",
            "surgery_id": null,
            "photo_album_id": null,
            "user_id": null,
            "created_at": "2025-05-26 12:31:03",
            "updated_at": "2025-05-26 12:31:03",
            "avatar": null,
            "last_surgery_date": "2025-05-17"
        }
    ]
}
```
---

## Request Log - 2025-05-26 15:42:36

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:42:36

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:44:39

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:44:39

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:45:37

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:45:37

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:45:45

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:45:45

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:46:48

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:46:48

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:47:10

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:47:10

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:47:52

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:47:52

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:41:46"
    }
}
```
---

## Request Log - 2025-05-26 15:47:58

**Method:** POST
**URL:** /api.php
**Body:** {&quot;user_id&quot;:&quot;1&quot;,&quot;new_password&quot;:&quot;1&quot;,&quot;confirm_password&quot;:&quot;1&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;change_password&quot;}

## Response Log - 2025-05-26 15:47:59

**Status:** Success
**Details:**
```json
{
    "success": true,
    "message": "Password changed successfully."
}
```
---

## Request Log - 2025-05-26 15:48:03

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:48:03

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:47:59"
    }
}
```
---

## Request Log - 2025-05-26 15:48:19

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:48:19

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:48:21

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:48:21

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:48:19"
    }
}
```
---

## Request Log - 2025-05-26 15:48:22

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:48:22

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:48:19"
    }
}
```
---

## Request Log - 2025-05-26 15:48:52

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:48:52

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:49:18

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:49:18

**Status:** Success
**Details:**
```json
{
    "success": true,
    "user": {
        "id": 1,
        "email": "test@example.com",
        "username": "admin",
        "role": "user",
        "created_at": "2025-05-26 10:59:55",
        "updated_at": "2025-05-26 14:48:52"
    }
}
```
---

## Request Log - 2025-05-26 15:49:32

**Method:** POST
**URL:** /api.php
**Body:** {&quot;id&quot;:&quot;1&quot;,&quot;username&quot;:&quot;admin&quot;,&quot;email&quot;:&quot;test@example.com&quot;,&quot;role&quot;:&quot;admin&quot;,&quot;entity&quot;:&quot;users&quot;,&quot;action&quot;:&quot;update&quot;}

## Response Log - 2025-05-26 15:49:32

**Status:** Success
**Details:**
```json
{
    "success": true
}
```
---

## Request Log - 2025-05-26 15:49:34

**Method:** GET
**URL:** /api.php?entity=users&action=get&id=1

## Response Log - 2025-05-26 15:49:34

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
        "updated_at": "2025-05-26 14:49:32"
    }
}
```
---

