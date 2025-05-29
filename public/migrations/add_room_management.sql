-- Room Management Migration
-- Creates tables for room management and reservations

-- Create rooms table
CREATE TABLE IF NOT EXISTS rooms (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL UNIQUE,
    capacity INTEGER NULL,
    notes TEXT,
    is_active INTEGER DEFAULT 1,
    created_at TEXT DEFAULT (datetime('now')),
    updated_at TEXT DEFAULT (datetime('now'))
);

-- Create room_reservations table
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

-- Create indexes for better performance
CREATE INDEX IF NOT EXISTS idx_room_reservations_room_id ON room_reservations(room_id);
CREATE INDEX IF NOT EXISTS idx_room_reservations_surgery_id ON room_reservations(surgery_id);
CREATE INDEX IF NOT EXISTS idx_room_reservations_date ON room_reservations(reserved_date);
CREATE INDEX IF NOT EXISTS idx_rooms_active ON rooms(is_active);

-- Insert sample rooms for testing
INSERT OR IGNORE INTO rooms (name, capacity, notes, is_active) VALUES 
('Operating Room 1', 4, 'Main surgical suite with advanced equipment', 1),
('Operating Room 2', 3, 'Secondary surgical suite', 1),
('Operating Room 3', 2, 'Minor procedures room', 1),
('Recovery Room A', 6, 'Post-operative recovery', 1),
('Recovery Room B', 4, 'Secondary recovery area', 1);
