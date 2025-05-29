-- Technician Management Migration
-- Creates tables for technician management and availability tracking

-- Create technicians table
CREATE TABLE IF NOT EXISTS technicians (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    specialty TEXT NULL,
    phone TEXT NULL,
    is_active INTEGER DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create technician_availability table
CREATE TABLE IF NOT EXISTS technician_availability (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    tech_id INTEGER NOT NULL REFERENCES technicians(id),
    available_on DATE NOT NULL,
    period TEXT NOT NULL CHECK (period IN ('am','pm','full')),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    UNIQUE (tech_id, available_on, period)
);

-- Create indexes for better performance
CREATE INDEX IF NOT EXISTS idx_technician_availability_tech_id ON technician_availability(tech_id);
CREATE INDEX IF NOT EXISTS idx_technician_availability_date ON technician_availability(available_on);
CREATE INDEX IF NOT EXISTS idx_technician_availability_period ON technician_availability(period);
CREATE INDEX IF NOT EXISTS idx_technicians_active ON technicians(is_active);

-- Insert sample technicians for testing
INSERT OR IGNORE INTO technicians (name, specialty, phone, is_active) VALUES 
('John Smith', 'Hair Transplant Specialist', '+44 7700 900123', 1),
('Sarah Johnson', 'Surgical Assistant', '+44 7700 900124', 1),
('Mike Wilson', 'Anesthesia Technician', '+44 7700 900125', 1),
('Emma Davis', 'Recovery Specialist', '+44 7700 900126', 1),
('David Brown', 'Equipment Technician', '+44 7700 900127', 1);

-- Insert sample availability for current week
INSERT OR IGNORE INTO technician_availability (tech_id, available_on, period) VALUES 
(1, date('now'), 'full'),
(1, date('now', '+1 day'), 'am'),
(2, date('now'), 'am'),
(2, date('now', '+1 day'), 'full'),
(3, date('now'), 'pm'),
(3, date('now', '+2 days'), 'full'),
(4, date('now', '+1 day'), 'pm'),
(5, date('now'), 'full');
