<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021194103 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE empresa_categoria (empresa_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_42A68052521E1991 (empresa_id), INDEX IDX_42A680523397707A (categoria_id), PRIMARY KEY(empresa_id, categoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A68052521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A680523397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE empresa DROP FOREIGN KEY FK_B8D75A503397707A');
        $this->addSql('DROP INDEX IDX_B8D75A503397707A ON empresa');
        $this->addSql('ALTER TABLE empresa DROP categoria_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE empresa_categoria');
        $this->addSql('ALTER TABLE empresa ADD categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE empresa ADD CONSTRAINT FK_B8D75A503397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_B8D75A503397707A ON empresa (categoria_id)');
    }
}
