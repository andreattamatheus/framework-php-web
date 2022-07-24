
  DROP TABLE IF EXISTS products;
  DROP TABLE IF EXISTS categories;
  CREATE TABLE IF NOT EXISTS categories (
      id                INT NOT NULL UNIQUE AUTO_INCREMENT,
      name              VARCHAR(100) NOT NULL,
      created_at        DATETIME(0) NOT NULL,
      PRIMARY KEY (id)
  );
  CREATE TABLE IF NOT EXISTS products (
      id              INT NOT NULL UNIQUE AUTO_INCREMENT,
      name            VARCHAR(100) NOT NULL,
      sku             VARCHAR(200) NOT NULL UNIQUE,
      price           INT NULL,
      description     VARCHAR(100) NULL,
      quantity        INT NULL,
      category_id   INT NULL,
      image_path      VARCHAR(200) NULL,
      created_at      DATETIME(0) NOT NULL,
      PRIMARY KEY(id),
      CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES categories(id)
  );
