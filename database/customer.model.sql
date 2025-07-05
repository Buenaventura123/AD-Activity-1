CREATE TABLE IF NOT EXISTS customers (
  id UUID NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
  username VARCHAR(225) NOT NULL,
  password VARCHAR(225) NOT NULL,
  first_name VARCHAR(225) NOT NULL,
  middle_name VARCHAR(225),
  last_name VARCHAR(225) NOT NULL,
  contact VARCHAR(20)
);
