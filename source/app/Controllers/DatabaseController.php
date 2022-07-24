<?php

namespace Source\App\Controllers;

use Source\Database\Connect;

class DatabaseController extends Controller
{

  public function run()
  {
    $sql = "
      DROP TABLE IF EXISTS categories;
      DROP TABLE IF EXISTS products;
      CREATE TABLE IF NOT EXISTS categories (
          code              INT NOT NULL UNIQUE AUTO_INCREMENT,
          name              VARCHAR(100) NOT NULL,
          created_at        DATETIME(0) NOT NULL,
          PRIMARY KEY (code)
      );
      CREATE TABLE IF NOT EXISTS products (
          id              INT NOT NULL UNIQUE AUTO_INCREMENT,
          name            VARCHAR(100) NOT NULL,
          sku             VARCHAR(200) NOT NULL UNIQUE,
          price           INT NULL,
          description     VARCHAR(100) NULL,
          quantity        INT NULL,
          category_code   INT NULL,
          image_path      VARCHAR(200) NULL,
          created_at      DATETIME(0) NOT NULL,
          PRIMARY KEY(sku),
          CONSTRAINT fk_category_code FOREIGN KEY (category_code) REFERENCES categories(code)
      );
    ";

    // connect to the database
    $database = new Connect();
    $database->getInstance();

    // prepare sql
    $statement = $database->connection()->prepare($sql);

    $statement->execute();

    return $this->redirect('');
  }
}
