<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109182127 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE song ADD COLUMN song_id INTEGER NOT NULL DEFAULT 0');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__song AS SELECT id, song_details, score FROM song');
        $this->addSql('DROP TABLE song');
        $this->addSql('CREATE TABLE song (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, song_details VARCHAR(255) DEFAULT NULL, score DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('INSERT INTO song (id, song_details, score) SELECT id, song_details, score FROM __temp__song');
        $this->addSql('DROP TABLE __temp__song');
    }
}
