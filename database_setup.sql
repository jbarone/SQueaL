DROP DATABASE IF EXISTS three_little_pigs;

CREATE DATABASE three_little_pigs;

USE three_little_pigs;

CREATE TABLE pigs (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    salt VARCHAR(3) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO pigs (username, password, salt)
VALUES
    ('fifer', '8b11363eed207319e7999ddaec946d403e522912d206afb3d96407ac62f9856b', 'f68'),     -- HASD of 'flute'
    ('fiddler', '84c1cc24d357eb344ee3af3521839148bfc4b73e56a78531ed32612d6ea4dd06', 'fec'),   -- HASF of 'fiddle'
    ('practical', '84b89fd2ba186460115d98c91424c6d2dbe84a0c7d44497b06f1bf2057ab2363', 'f91'); -- HASH of 'P@s5w0rD!'

CREATE TABLE product_category (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    parent INT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (parent) REFERENCES product_category(id)
);

INSERT INTO product_category(id, name, parent)
VALUES
    (1, 'Tools', NULL),
    (2, 'Power Tools', 1),
    (3, 'Manual Tools', 1),
    (4, 'Building Materials', NULL);

CREATE TABLE product (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    category INT NOT NULL,
    price NUMERIC(15, 2) NOT NULL,
    description TEXT NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    image VARCHAR(255) NOT NULL,
    featured BIT DEFAULT 0,
    sale BIT DEFAULT 0,
    PRIMARY KEY(id),
    FOREIGN KEY (category) REFERENCES product_category(id)
);

INSERT INTO product (name, category, price, description,
                     quantity, image, featured, sale)
VALUES
    ('Bricks', 4, 200.00, 'Some of the strongest, most awesome bricks available',
     2, 'tools/bricks.png', 1, 0),
    ('Straw', 4, 100.00, 'Who needs anything else. These are so easy to build with.',
     5, 'tools/straw-hut.png', 1, 0),
    ('Twigs', 4, 50.00, 'Stronger than straw. Just stack then and, viola a home',
     0, 'tools/twig-house.jpg', 1, 0),
    ('Chain Saw', 2, 120.00, 'Makes cutting up those twigs so easy',
     1, 'tools/chain_saw.gif', 0, 0),
    ('Drill', 2, 45.00, 'MAKE ALL THE HOLES!!',
     1, 'tools/drill.png', 0, 0),
    ('Hammer', 3, 10.50, 'Is that a nail? I\'d hit that.',
     1, 'tools/hammer.gif', 0, 0),
    ('Hand Saw', 3, 20.00, 'With a little elbow grease, turn one twig into two',
     1, 'tools/saw.jpg', 0, 0),
    ('Tape Measure', 3, 8.32, 'Measure twice, cut once',
     1, 'tools/TapeMeasure.gif', 0, 1);
