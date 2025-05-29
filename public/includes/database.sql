
CREATE TABLE surgeries (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date TEXT,
  notes TEXT,
  status TEXT,
  graft_count INTEGER,
  created_at TEXT,
  updated_at TEXT,
  patient_id INTEGER,
  is_recorded BOOLEAN DEFAULT FALSE -- Added is_recorded field
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
  avatar TEXT,
  agency_id INTEGER
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

CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email TEXT NOT NULL UNIQUE,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  role TEXT DEFAULT 'user',
  created_at TEXT,
  updated_at TEXT,
  agency_id INTEGER
);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id) VALUES ('a@b.com', 'admin', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','admin', datetime('now'), datetime('now'),1);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id) VALUES ('b@b.com', 'editor', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','editor', datetime('now'), datetime('now'),1);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id) VALUES ('c@c.com', 'agent 1', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','agent', datetime('now'), datetime('now'),2);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id) VALUES ('d@d.com', 'agent 2', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','agent', datetime('now'), datetime('now'),3);

CREATE TABLE settings (
  key TEXT PRIMARY KEY UNIQUE,
  value TEXT
);

INSERT INTO settings (key, value) VALUES ('spreadsheet_id', '1mP20et8Pe_RMQvEC-ra2mXi9aoAtTwK_jsMwcUn9tt0');
INSERT INTO settings (key, value) VALUES ('cache_duration', '300');
INSERT INTO settings (key, value) VALUES ('cell_range', 'A1:I30');

CREATE TABLE agencies (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL UNIQUE,
  created_at TEXT,
  updated_at TEXT
);


-- Insert sample agencies for testing
INSERT INTO agencies (name, created_at, updated_at) VALUES ('Hospital', datetime('now'), datetime('now'));
INSERT INTO agencies (name, created_at, updated_at) VALUES ('Want Hair', datetime('now'), datetime('now'));
INSERT INTO agencies (name, created_at, updated_at) VALUES ('Other Agency', datetime('now'), datetime('now'));

-- Room Management Tables
CREATE TABLE IF NOT EXISTS rooms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    notes TEXT,
    is_active INTEGER DEFAULT 1,
    created_at TEXT DEFAULT (datetime('now')),
    updated_at TEXT DEFAULT (datetime('now'))
);

CREATE TABLE IF NOT EXISTS room_reservations (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_id INTEGER NOT NULL,
    surgery_id INTEGER NOT NULL,
    reserved_date DATE NOT NULL,
    created_at TEXT DEFAULT (datetime('now')),
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (surgery_id) REFERENCES surgeries(id) ON DELETE CASCADE,
    UNIQUE(room_id, reserved_date)
);

-- Technician Management Tables
CREATE TABLE IF NOT EXISTS technicians (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    specialty TEXT NULL,
    phone TEXT NULL,
    is_active INTEGER DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS technician_availability (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tech_id INTEGER NOT NULL REFERENCES technicians(id),
    available_on DATE NOT NULL,
    period TEXT NOT NULL CHECK (period IN ('am','pm','full')),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (tech_id, available_on, period)
);

-- Create indexes for better performance
CREATE INDEX IF NOT EXISTS idx_room_reservations_room_id ON room_reservations(room_id);
CREATE INDEX IF NOT EXISTS idx_room_reservations_surgery_id ON room_reservations(surgery_id);
CREATE INDEX IF NOT EXISTS idx_room_reservations_date ON room_reservations(reserved_date);
CREATE INDEX IF NOT EXISTS idx_rooms_active ON rooms(is_active);
CREATE INDEX IF NOT EXISTS idx_technician_availability_tech_id ON technician_availability(tech_id);
CREATE INDEX IF NOT EXISTS idx_technician_availability_date ON technician_availability(available_on);
CREATE INDEX IF NOT EXISTS idx_technician_availability_period ON technician_availability(period);
CREATE INDEX IF NOT EXISTS idx_technicians_active ON technicians(is_active);

-- Insert sample rooms for testing
INSERT OR IGNORE INTO rooms (name, notes, is_active) VALUES
('Surgery 1',  'Surgery 1', 1),
('Surgery 2',  'Surgery 2', 0),
('Surgery 3',  'Surgery 3', 0),
('Consultation',  'Consultation', 1),
('Cosmetology',  'Cosmetology', 1);

-- Insert sample technicians for testing
INSERT OR IGNORE INTO technicians (name, specialty, phone, is_active) VALUES
('Shefu', 'Hair Transplant Specialist', '+44 7700 900123', 1),
('Panindra', 'Surgical Assistant', '+44 7700 900124', 1),
('Enye', 'Anesthesia Technician', '+44 7700 900125', 1),
('Meryem', 'Recovery Specialist', '+44 7700 900126', 1),
('somebody', 'Equipment Technician', '+44 7700 900127', 1);
