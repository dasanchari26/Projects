USE f32ee;

INSERT INTO users (Name, Email, Address, Password)
VALUES
('Alice Tan', 'alice@example.com', '12 Orchard Road, Singapore', 'password123'),
('Ben Lim', 'ben@example.com', '45 Tanjong Pagar Road, Singapore', 'securepass456');

INSERT INTO clothesville_products
(productid, name, price, category, item_size, color, quantity, img)
VALUES
(1, 'FILA Hoodie', 30.00, 'hoodie', 'S', 'Red', 4, 'product_images/hoodie1_f.jpg'),
(2, 'FILA Hoodie', 30.00, 'hoodie', 'M', 'Purple', 2, 'product_images/hoodie1_f.jpg'),
(3, 'FILA Hoodie', 30.00, 'hoodie', 'L', 'Red', 8, 'product_images/hoodie1_f.jpg'),

(4, 'Plain Hoodie', 40.00, 'hoodie', 'M', 'Black', 4, 'product_images/hoodie1_m.jpg'),
(5, 'Plain Hoodie', 40.00, 'hoodie', 'S', 'Pink', 9, 'product_images/hoodie1_m.jpg'),

(6, 'Kappa Hoodie', 50.00, 'hoodie', 'S', 'Grey', 12, 'product_images/hoodie2_f.jpg'),
(7, 'Kappa Hoodie', 50.00, 'hoodie', 'S', 'Pink', 2, 'product_images/hoodie2_f.jpg'),

(8, 'W Hoodie', 25.00, 'hoodie', 'XL', 'Purple', 4, 'product_images/hoodie2_f.jpg'),

(9, 'Kids Onesie', 15.00, 'kids', 'XS', 'Grey', 7, 'product_images/kids.jpg'),

(10, 'Cargo Pants', 50.00, 'pants', 'S', 'Beige', 4, 'product_images/pants1.jpg'),
(11, 'Cargo Pants', 50.00, 'pants', 'S', 'Black', 5, 'product_images/pants1.jpg'),
(12, 'Cargo Pants', 50.00, 'pants', 'M', 'Red', 4, 'product_images/pants1.jpg'),

(13, 'Jeans', 50.00, 'pants', 'M', 'Blue', 5, 'product_images/pants2.jpg'),
(14, 'Jeans', 50.00, 'pants', 'XL', 'Blue', 5, 'product_images/pants2.jpg'),

(15, 'Circle Shirt', 8.00, 'shirt', 'XS', 'White', 1, 'product_images/shirt1_m.jpg'),
(16, 'Circle Shirt', 8.00, 'shirt', 'M', 'White', 2, 'product_images/shirt1_m.jpg'),

(17, 'Coca-Cola Shirt', 10.00, 'shirt', 'M', 'Black', 3, 'product_images/shirt2.jpg'),
(18, 'Coca-Cola Shirt', 10.00, 'shirt', 'M', 'Red', 4, 'product_images/shirt2.jpg'),

(19, 'Nike Shirt', 15.00, 'shirt', 'L', 'White', 5, 'product_images/shirt3.jpg'),
(20, 'Nike Shirt', 15.00, 'shirt', 'M', 'White', 6, 'product_images/shirt3.jpg');