CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT NOT NULL UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  created_at TEXT,
  updated_at TEXT
);

CREATE TABLE surgeries (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date TEXT,
  notes TEXT,
  status TEXT,
  created_at TEXT,
  updated_at TEXT,
  patient_id INTEGER
);

CREATE TABLE photo_album_types (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  created_at TEXT,
  updated_at TEXT
);

CREATE TABLE patients (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT,
  dob TEXT,
  surgery_id INTEGER,
  photo_album_id INTEGER,
  user_id INTEGER,
  created_at TEXT,
  updated_at TEXT
);

CREATE TABLE patient_photos (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  patient_id INTEGER,
  photo_album_type_id INTEGER,
  file_path TEXT,
  created_at TEXT,
  updated_at TEXT
);

INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Pre-Surgery', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Post-Surgery', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Follow-up', datetime('now'), datetime('now'));