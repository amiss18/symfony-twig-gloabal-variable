<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908123442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_A058EDAA8F93B6FC');
        $this->addSql('DROP INDEX IDX_A058EDAA4296D31F');
        $this->addSql('CREATE TEMPORARY TABLE __temp__genre_movie AS SELECT genre_id, movie_id FROM genre_movie');
        $this->addSql('DROP TABLE genre_movie');
        $this->addSql('CREATE TABLE genre_movie (genre_id INTEGER NOT NULL, movie_id INTEGER NOT NULL, PRIMARY KEY(genre_id, movie_id), CONSTRAINT FK_A058EDAA4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A058EDAA8F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO genre_movie (genre_id, movie_id) SELECT genre_id, movie_id FROM __temp__genre_movie');
        $this->addSql('DROP TABLE __temp__genre_movie');
        $this->addSql('CREATE INDEX IDX_A058EDAA8F93B6FC ON genre_movie (movie_id)');
        $this->addSql('CREATE INDEX IDX_A058EDAA4296D31F ON genre_movie (genre_id)');
        $this->addSql('DROP INDEX IDX_1D5EF26F10DAF24A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__movie AS SELECT id, actor_id, title, year, description FROM movie');
        $this->addSql('DROP TABLE movie');
        $this->addSql('CREATE TABLE movie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, actor_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, year INTEGER NOT NULL, description CLOB DEFAULT NULL COLLATE BINARY, likes INTEGER DEFAULT NULL, CONSTRAINT FK_1D5EF26F10DAF24A FOREIGN KEY (actor_id) REFERENCES actor (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO movie (id, actor_id, title, year, description) SELECT id, actor_id, title, year, description FROM __temp__movie');
        $this->addSql('DROP TABLE __temp__movie');
        $this->addSql('CREATE INDEX IDX_1D5EF26F10DAF24A ON movie (actor_id)');
        $this->addSql('DROP INDEX IDX_16DB4F898F93B6FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__picture AS SELECT id, movie_id, name FROM picture');
        $this->addSql('DROP TABLE picture');
        $this->addSql('CREATE TABLE picture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, movie_id INTEGER NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_16DB4F898F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO picture (id, movie_id, name) SELECT id, movie_id, name FROM __temp__picture');
        $this->addSql('DROP TABLE __temp__picture');
        $this->addSql('CREATE INDEX IDX_16DB4F898F93B6FC ON picture (movie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_A058EDAA4296D31F');
        $this->addSql('DROP INDEX IDX_A058EDAA8F93B6FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__genre_movie AS SELECT genre_id, movie_id FROM genre_movie');
        $this->addSql('DROP TABLE genre_movie');
        $this->addSql('CREATE TABLE genre_movie (genre_id INTEGER NOT NULL, movie_id INTEGER NOT NULL, PRIMARY KEY(genre_id, movie_id))');
        $this->addSql('INSERT INTO genre_movie (genre_id, movie_id) SELECT genre_id, movie_id FROM __temp__genre_movie');
        $this->addSql('DROP TABLE __temp__genre_movie');
        $this->addSql('CREATE INDEX IDX_A058EDAA4296D31F ON genre_movie (genre_id)');
        $this->addSql('CREATE INDEX IDX_A058EDAA8F93B6FC ON genre_movie (movie_id)');
        $this->addSql('DROP INDEX IDX_1D5EF26F10DAF24A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__movie AS SELECT id, actor_id, title, year, description FROM movie');
        $this->addSql('DROP TABLE movie');
        $this->addSql('CREATE TABLE movie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, actor_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, year INTEGER NOT NULL, description CLOB DEFAULT NULL)');
        $this->addSql('INSERT INTO movie (id, actor_id, title, year, description) SELECT id, actor_id, title, year, description FROM __temp__movie');
        $this->addSql('DROP TABLE __temp__movie');
        $this->addSql('CREATE INDEX IDX_1D5EF26F10DAF24A ON movie (actor_id)');
        $this->addSql('DROP INDEX IDX_16DB4F898F93B6FC');
        $this->addSql('CREATE TEMPORARY TABLE __temp__picture AS SELECT id, movie_id, name FROM picture');
        $this->addSql('DROP TABLE picture');
        $this->addSql('CREATE TABLE picture (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, movie_id INTEGER NOT NULL, name VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO picture (id, movie_id, name) SELECT id, movie_id, name FROM __temp__picture');
        $this->addSql('DROP TABLE __temp__picture');
        $this->addSql('CREATE INDEX IDX_16DB4F898F93B6FC ON picture (movie_id)');
    }
}
