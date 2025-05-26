CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT NOT NULL UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  role TEXT DEFAULT 'user',
  created_at TEXT,
  updated_at TEXT
);

CREATE TABLE surgeries (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date TEXT,
  notes TEXT,
  status TEXT,
  graft_count INTEGER,
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
  updated_at TEXT,
  avatar TEXT
);

CREATE TABLE patient_photos (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  patient_id INTEGER,
  photo_album_type_id INTEGER,
  file_path TEXT,
  created_at TEXT,
  updated_at TEXT
);

INSERT INTO users (email, username, password,role, created_at, updated_at) VALUES ('test@example.com', 'admin', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','admin', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Pre-Surgery', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Post-Surgery', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('Follow-up', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('1. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('2. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('3. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('4. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('5. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('6. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('7. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('8. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('9. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('10. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('11. Month', datetime('now'), datetime('now'));
INSERT INTO photo_album_types (name, created_at, updated_at) VALUES ('12. Month', datetime('now'), datetime('now'));

CREATE TABLE settings (
  key TEXT PRIMARY KEY UNIQUE,
  value TEXT
);

INSERT INTO settings (key, value) VALUES ('spreadsheet_id', '1dGY4Ir9TpnGxwfBUnNrytBPDtJl93BWSbU95V2jfWZY');
INSERT INTO settings (key, value) VALUES ('cache_duration', '300');
INSERT INTO settings (key, value) VALUES ('cell_range', 'A1:Z');
