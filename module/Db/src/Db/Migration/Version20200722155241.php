<?php

declare(strict_types=1);

namespace Db\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722155241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("
            CREATE TABLE QueryResult (
                id INT AUTO_INCREMENT NOT NULL,
                query_id INT DEFAULT NULL,
                createdAt DATETIME NOT NULL,
                jobName VARCHAR(255) NOT NULL,
                jobContent LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)',
                result LONGTEXT NOT NULL,
                INDEX IDX_E6A25FACEF946F99 (query_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            ALTER TABLE QueryResult
                ADD CONSTRAINT FK_E6A25FACEF946F99 FOREIGN KEY (query_id)
                    REFERENCES queries (id)
        ");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
