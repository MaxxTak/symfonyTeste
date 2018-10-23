<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021194620 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categoria_empresa (empresa_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_BAB8A5FE521E1991 (empresa_id), INDEX IDX_BAB8A5FE3397707A (categoria_id), PRIMARY KEY(empresa_id, categoria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categoria_empresa ADD CONSTRAINT FK_BAB8A5FE521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categoria_empresa ADD CONSTRAINT FK_BAB8A5FE3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE empresa_categoria');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE empresa_categoria (empresa_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_42A68052521E1991 (empresa_id), INDEX IDX_42A680523397707A (categoria_id), PRIMARY KEY(empresa_id, categoria_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A680523397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE empresa_categoria ADD CONSTRAINT FK_42A68052521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE categoria_empresa');
    }
}
