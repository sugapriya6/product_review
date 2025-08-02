CREATE DATABASE IF NOT EXISTS review_system;
USE review_system;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

INSERT INTO products (name, description, image) VALUES
('Wireless Headphones', 'High-quality wireless headphones with noise cancellation.', 'headphones.jpg'),
('Gaming Mouse', 'Ergonomic gaming mouse with RGB lighting and DPI control.', 'gaming_mouse.jpg'),
('4K Monitor', 'Ultra HD 27-inch monitor for creative professionals.', 'monitor.jpg'),
('Smart Watch', 'Fitness tracker with heart rate monitor and waterproof design.', 'smart_watch.jpg'),
('Portable Bluetooth Speaker', 'Compact speaker with powerful bass and long battery life.', 'speaker.jpg'),
('Mechanical Keyboard', 'RGB mechanical keyboard with blue switches and metal body.', 'keyboard.jpg'),
('USB-C Hub', 'Multi-port USB-C hub with HDMI, Ethernet, and card readers.', 'hub.jpg'),
('Wireless Charger', 'Fast wireless charging pad for Android and iOS devices.', 'charger.jpg'),
('Laptop Stand', 'Aluminum adjustable laptop stand for better ergonomics.', 'laptop_stand.jpg'),
('Noise Cancelling Earbuds', 'True wireless earbuds with active noise cancellation.', 'earbuds.jpg'),
('Graphic Tablet', 'Digital drawing tablet with pen pressure sensitivity.', 'tablet.jpg'),
('Gaming Chair', 'Ergonomic gaming chair with headrest and lumbar support.', 'chair.jpg'),
('Drone with Camera', 'Quadcopter drone with 4K camera and GPS stabilization.', 'drone.jpg');

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    username VARCHAR(100) NOT NULL,
    rating INT NOT NULL,
    comment TEXT NOT NULL,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);