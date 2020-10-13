<?php

declare(strict_types=1);

namespace Db\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723133955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("
            ALTER TABLE QueryResult
                DROP FOREIGN KEY FK_E6A25FACEF946F99
        ");

        $this->addSql("
            ALTER TABLE QueryResult
                ADD queue_id BIGINT NOT NULL,
                CHANGE query_id query_id INT NOT NULL
        ");

        $this->addSql("
            ALTER TABLE QueryResult
                ADD CONSTRAINT FK_E6A25FAC477B5BAE FOREIGN KEY (queue_id)
                    REFERENCES Queue (id)
        ");

        $this->addSql("
            CREATE INDEX IDX_E6A25FAC477B5BAE ON QueryResult (queue_id)
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
