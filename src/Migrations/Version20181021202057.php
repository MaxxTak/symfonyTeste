<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021202057 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categoria ADD nome_categoria VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE empresa ADD telefone VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE endereco ADD endereco VARCHAR(255) NOT NULL, ADD cep VARCHAR(255) NOT NULL, ADD cidade VARCHAR(255) NOT NULL, ADD estado VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE categoria DROP nome_categoria');
        $this->addSql('ALTER TABLE empresa DROP telefone');
        $this->addSql('ALTER TABLE endereco DROP endereco, DROP cep, DROP cidade, DROP estado');
    }
}
