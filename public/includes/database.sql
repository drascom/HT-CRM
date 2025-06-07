CREATE TABLE surgeries (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  date TEXT,
  notes TEXT,
  status TEXT,
  graft_count INTEGER,
  room_id INTEGER,
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
  agency_id INTEGER,
  phone TEXT,
  email TEXT,
  city TEXT,
  occupation TEXT
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
  role TEXT DEFAULT 'guest',
  created_at TEXT,
  updated_at TEXT,
  agency_id INTEGER,
  reset_token TEXT NULL,
  reset_expiry DATETIME NULL,
  name TEXT NULL,
  surname TEXT NULL,
  phone TEXT NULL,
  is_active INTEGER DEFAULT 0
);


INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id,is_active) VALUES ('drascom07@gmail.com', 'Admin', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','admin', datetime('now'), datetime('now'),1,1);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id, is_active) VALUES ('b@b.com', 'Editor', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','editor', datetime('now'), datetime('now'),1,1);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id,is_active) VALUES ('c@c.com', 'Agent', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','agent', datetime('now'), datetime('now'),2,1);
INSERT INTO users (email, username, password,role, created_at, updated_at, agency_id,is_active) VALUES ('d@d.com', 'Technician', '$2y$10$aEtcftk7GMX3bP3DqIRxQ.DmbuVMC.b18q96ziMwSQWyQO/TWuG5a','technician', datetime('now'), datetime('now'),3,1);

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
    types TEXT,
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
    availability TEXT NULL,
    status TEXT NULL CHECK (status IN ('Self Employed', 'Sponsorlu', 'Employed')),
    period TEXT NULL CHECK (period IN ('Full Time', 'Part Time')),
    notes TEXT NULL,
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

-- New table for surgery-technician assignments
CREATE TABLE IF NOT EXISTS surgery_technicians (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    surgery_id INTEGER NOT NULL,
    tech_id INTEGER NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (surgery_id) REFERENCES surgeries(id) ON DELETE CASCADE,
    FOREIGN KEY (tech_id) REFERENCES technicians(id) ON DELETE CASCADE,
    UNIQUE (surgery_id, tech_id)
);

-- Add indexes for better performance
CREATE INDEX IF NOT EXISTS idx_surgery_technicians_surgery_id ON surgery_technicians(surgery_id);
CREATE INDEX IF NOT EXISTS idx_surgery_technicians_tech_id ON surgery_technicians(tech_id);

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
INSERT OR IGNORE INTO rooms (name, types, is_active) VALUES
('Surgery 1',  'surgery', 1),
('Surgery 2',  'surgery', 0),
('Surgery 3',  'surgery', 0),
('Consultation',  'consultation', 1),
('Cosmetology',  'treatment', 1);

-- Insert technicians from CSV data
INSERT OR IGNORE INTO technicians (name, phone, availability, status, period, notes, is_active) VALUES
('Shefiu', '07508400686', 'All Days', 'Self Employed', 'Full Time', '', 1),
('Phandira', '07424722738', 'Mon-Tue-Wed', 'Sponsorlu', 'Part Time', '8 Vaka alabiliyoruz per month', 1),
('Eniye', '07405497373', 'All Days', 'Self Employed', 'Full Time', 'Only implantions yapabiliyor, extractions helping', 1),
('Nava', '07435525455', 'Bizi Yari yolda birakti', 'Sponsorlu', 'Part Time', '', 0),
('Chandu', '07435525358', 'Bizi Yari yolda birakti', 'Sponsorlu', 'Part Time', '', 0),
('Maryam', '07775541099', 'Manchestarda yasiyor', 'Self Employed', 'Full Time', 'Konaklama & Yol dahil 400-450 £', 1),
('Milena', '07857273383', 'Fazla graft calismak istemiyor', 'Self Employed', 'Full Time', '', 1),
('Mahsa – Zahra', '07914262872', 'Tue-Friday', 'Self Employed', 'Full Time', '', 1),
('Beverly', '07775434126', 'Available all', 'Self Employed', 'Full Time', 'DHI Fue biliyor sadece', 1),
('Claduio', '00393341817614', '2 days available // Mon & Tuesday', 'Self Employed', 'Part Time', 'From September 3 days, Can work payroll from September', 1),
('Sahnaz', '07404324662', 'Fully available', 'Self Employed', 'Part Time', '', 1),
('Sravani', '07508858512', 'Fully available', 'Sponsorlu', 'Part Time', 'We can sponsor her', 1),
('Sagun Khadka', '07380576839', 'Fully available', 'Self Employed', 'Part Time', 'Istemiyor Calismak', 0),
('Monisha', '07436422647', 'Fully available', 'Self Employed', '', 'Ekime gelecek sadece, 14 £ per hour', 1);

CREATE TABLE IF NOT EXISTS procedures (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    is_active INTEGER DEFAULT 1,
    created_at TEXT DEFAULT (datetime('now')),
    updated_at TEXT DEFAULT (datetime('now'))
);

-- Insert default procedures
INSERT OR IGNORE INTO procedures (name, is_active) VALUES
('Consultation', 1),
('Botox', 1),
('Dermal Fillers', 1),
('PRP (Platelet-Rich Plasma)', 1),
('Microneedling', 1),
('HydraFacial', 1),
('Chemical Peel', 1),
('Laser Hair Removal', 1),
('Skin Rejuvenation', 1),
('Carbon Laser Peel', 1),
('Mesotherapy', 1),
('Facial Cleansing', 1),
('Radiofrequency Skin Tightening', 1),
('Cryolipolysis (Fat Freezing)', 1),
('Ultherapy', 1),
('LED Light Therapy', 1),
('OxyGeneo Facial', 1),
('Hollywood Peel', 1),
('Aqualyx Fat Dissolving', 1),
('Carboxytherapy', 1),
('Lip Augmentation', 1),
('Jawline Contouring', 1);

CREATE TABLE IF NOT EXISTS appointments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    room_id INTEGER NOT NULL,
    patient_id INTEGER NOT NULL,
    appointment_date DATE NOT NULL,
    start_time TEXT NOT NULL,
    end_time TEXT NOT NULL,
    procedure_id INTEGER,
    notes TEXT,
    created_at TEXT DEFAULT (datetime('now')),
    updated_at TEXT DEFAULT (datetime('now')),
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (procedure_id) REFERENCES procedures(id) ON DELETE SET NULL
);
