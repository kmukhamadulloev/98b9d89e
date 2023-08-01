INSERT INTO clients (first_name, last_name, middle_name, date_of_birth, email, phone)
VALUES
    ('John', 'Smith', 'Michael', '1990-05-15', 'john.smith@example.com', '+1234567890'),
    ('Jane', 'Doe', NULL, '1985-11-20', 'jane.doe@example.com', '+9876543210'),
    ('Alex', 'Johnson', 'Robert', '1995-08-07', 'alex.johnson@example.com', '+1122334455'),
    ('Sarah', 'Williams', NULL, '1988-03-25', 'sarah.williams@example.com', '+9988776655'),
    ('Michael', 'Brown', 'James', '1992-12-10', 'michael.brown@example.com', '+5544332211');

INSERT INTO rooms (title, room_number)
VALUES
    ('Standard', '101'),
    ('Deluxe', '202'),
    ('Suite', '305'),
    ('Family Room', '410'),
    ('Executive', '512');

INSERT INTO requests (client_id, room_id, reserved_from, reserved_till, created_at, updated_at)
VALUES
    (1, 1, '2023-08-10 14:00:00', '2023-08-15 12:00:00', '2023-07-31 09:23:45', '2023-07-31 09:23:45'),
    (2, 3, '2023-09-05 18:30:00', '2023-09-10 10:00:00', '2023-07-31 10:45:23', '2023-07-31 10:45:23'),
    (3, 2, '2023-08-20 12:00:00', '2023-08-25 11:00:00', '2023-07-31 15:17:09', '2023-07-31 15:17:09'),
    (4, 4, '2023-09-02 09:00:00', '2023-09-05 14:00:00', '2023-07-31 17:55:30', '2023-07-31 17:55:30'),
    (5, 5, '2023-08-15 16:00:00', '2023-08-18 10:30:00', '2023-07-31 21:05:00', '2023-07-31 21:05:00');
