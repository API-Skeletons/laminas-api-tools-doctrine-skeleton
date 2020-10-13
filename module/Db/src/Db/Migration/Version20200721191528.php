<?php

declare(strict_types=1);

namespace Db\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721191528 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("
            ALTER TABLE groups
                ADD COLUMN group_id MEDIUMINT UNSIGNED DEFAULT NULL
        ");

        $this->addSql("
            ALTER TABLE groups
                ADD CONSTRAINT FK_F06D3970FE54D947 FOREIGN KEY (group_id)
                    REFERENCES groups (id)
        ");

        $this->addSql("
            CREATE INDEX IDX_F06D3970FE54D947 ON groups (group_id);
        ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
