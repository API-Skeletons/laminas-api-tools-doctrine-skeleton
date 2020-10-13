<?php

declare(strict_types=1);

namespace Db\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20201013214322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("
            CREATE TABLE Role (
                id BIGINT NOT NULL,
                role_id BIGINT DEFAULT NULL,
                roleId VARCHAR(255) NOT NULL,
                description VARCHAR(255) DEFAULT NULL,
                INDEX IDX_F75B2554D60322AC (role_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE UserToRole (role_id BIGINT NOT NULL,
                user_id BIGINT NOT NULL,
                INDEX IDX_CC07E582D60322AC (role_id),
                INDEX IDX_CC07E582A76ED395 (user_id),
                PRIMARY KEY(role_id,
                user_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE User (id BIGINT AUTO_INCREMENT NOT NULL,
                username VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                createdAt DATETIME NOT NULL,
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE AuthorizationCode_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                user_id BIGINT DEFAULT NULL,
                authorizationCode VARCHAR(255) DEFAULT NULL,
                redirectUri LONGTEXT DEFAULT NULL,
                expires DATETIME DEFAULT NULL,
                idToken LONGTEXT DEFAULT NULL,
                INDEX IDX_7DED2FDD19EB6921 (client_id),
                INDEX IDX_7DED2FDDA76ED395 (user_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE Jti_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                subject VARCHAR(255) DEFAULT NULL,
                audience VARCHAR(255) DEFAULT NULL,
                expires DATETIME DEFAULT NULL,
                jti LONGTEXT DEFAULT NULL,
                INDEX IDX_2C13A64519EB6921 (client_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE Jwt_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                subject VARCHAR(255) DEFAULT NULL,
                publicKey LONGTEXT DEFAULT NULL,
                INDEX IDX_F220BE7A19EB6921 (client_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE PublicKey_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                publicKey LONGTEXT DEFAULT NULL,
                privateKey LONGTEXT DEFAULT NULL,
                encryptionAlgorithm VARCHAR(255) DEFAULT NULL,
                UNIQUE INDEX UNIQ_7355AB8319EB6921 (client_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE RefreshToken_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                user_id BIGINT DEFAULT NULL,
                refreshToken VARCHAR(255) DEFAULT NULL,
                expires DATETIME DEFAULT NULL,
                INDEX IDX_EEBE59C919EB6921 (client_id),
                INDEX IDX_EEBE59C9A76ED395 (user_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE Scope_OAuth2 (id BIGINT NOT NULL,
                scope VARCHAR(191) NOT NULL,
                isDefault TINYINT(1) DEFAULT NULL,
                UNIQUE INDEX UNIQ_95A8FC4EAF55D3 (scope),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE ClientToScope_OAuth2 (scope_id BIGINT NOT NULL,
                client_id BIGINT NOT NULL,
                INDEX IDX_EAF8221A682B5931 (scope_id),
                INDEX IDX_EAF8221A19EB6921 (client_id),
                PRIMARY KEY(scope_id,
                client_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE AuthorizationCodeToScope_OAuth2 (scope_id BIGINT NOT NULL,
                authorization_code_id BIGINT NOT NULL,
                INDEX IDX_1EA6C7E682B5931 (scope_id),
                INDEX IDX_1EA6C7E847B7245 (authorization_code_id),
                PRIMARY KEY(scope_id,
                authorization_code_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE RefreshTokenToScope_OAuth2 (scope_id BIGINT NOT NULL,
                refresh_token_id BIGINT NOT NULL,
                INDEX IDX_9F46C12E682B5931 (scope_id),
                INDEX IDX_9F46C12EF765F60E (refresh_token_id),
                PRIMARY KEY(scope_id,
                refresh_token_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE AccessTokenToScope_OAuth2 (scope_id BIGINT NOT NULL,
                access_token_id BIGINT NOT NULL,
                INDEX IDX_49A2A53D682B5931 (scope_id),
                INDEX IDX_49A2A53D2CCB2688 (access_token_id),
                PRIMARY KEY(scope_id,
                access_token_id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE AccessToken_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                client_id BIGINT NOT NULL,
                user_id BIGINT DEFAULT NULL,
                accessToken LONGTEXT DEFAULT NULL,
                expires DATETIME DEFAULT NULL,
                INDEX IDX_C092BBF419EB6921 (client_id),
                INDEX IDX_C092BBF4A76ED395 (user_id),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            CREATE TABLE Client_OAuth2 (id BIGINT AUTO_INCREMENT NOT NULL,
                user_id BIGINT DEFAULT NULL,
                clientId VARCHAR(191) DEFAULT NULL,
                secret VARCHAR(255) DEFAULT NULL,
                redirectUri LONGTEXT DEFAULT NULL,
                grantType LONGTEXT DEFAULT NULL COMMENT '(DC2Type:array)',
                INDEX IDX_A66D48A8A76ED395 (user_id),
                UNIQUE INDEX UNIQ_A66D48A8EA1CE9BE (clientId),
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        ");

        $this->addSql("
            ALTER TABLE Role
                ADD CONSTRAINT FK_F75B2554D60322AC FOREIGN KEY (role_id)
                    REFERENCES Role (id)
        ");

        $this->addSql("
            ALTER TABLE UserToRole
                ADD CONSTRAINT FK_CC07E582D60322AC FOREIGN KEY (role_id)
                    REFERENCES Role (id)
        ");

        $this->addSql("
            ALTER TABLE UserToRole
                ADD CONSTRAINT FK_CC07E582A76ED395 FOREIGN KEY (user_id)
                    REFERENCES User (id)
        ");

        $this->addSql("
            ALTER TABLE AuthorizationCode_OAuth2
                ADD CONSTRAINT FK_7DED2FDD19EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AuthorizationCode_OAuth2
                ADD CONSTRAINT FK_7DED2FDDA76ED395 FOREIGN KEY (user_id)
                    REFERENCES User (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE Jti_OAuth2
                ADD CONSTRAINT FK_2C13A64519EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE Jwt_OAuth2
                ADD CONSTRAINT FK_F220BE7A19EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE PublicKey_OAuth2
                ADD CONSTRAINT FK_7355AB8319EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE RefreshToken_OAuth2
                ADD CONSTRAINT FK_EEBE59C919EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE RefreshToken_OAuth2
                ADD CONSTRAINT FK_EEBE59C9A76ED395 FOREIGN KEY (user_id)
                    REFERENCES User (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE ClientToScope_OAuth2
                ADD CONSTRAINT FK_EAF8221A682B5931 FOREIGN KEY (scope_id)
                    REFERENCES Scope_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE ClientToScope_OAuth2
                ADD CONSTRAINT FK_EAF8221A19EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AuthorizationCodeToScope_OAuth2
                ADD CONSTRAINT FK_1EA6C7E682B5931 FOREIGN KEY (scope_id)
                    REFERENCES Scope_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AuthorizationCodeToScope_OAuth2
                ADD CONSTRAINT FK_1EA6C7E847B7245 FOREIGN KEY (authorization_code_id)
                    REFERENCES AuthorizationCode_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE RefreshTokenToScope_OAuth2
                ADD CONSTRAINT FK_9F46C12E682B5931 FOREIGN KEY (scope_id)
                    REFERENCES Scope_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE RefreshTokenToScope_OAuth2
                ADD CONSTRAINT FK_9F46C12EF765F60E FOREIGN KEY (refresh_token_id)
                    REFERENCES RefreshToken_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AccessTokenToScope_OAuth2
                ADD CONSTRAINT FK_49A2A53D682B5931 FOREIGN KEY (scope_id)
                    REFERENCES Scope_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AccessTokenToScope_OAuth2
                ADD CONSTRAINT FK_49A2A53D2CCB2688 FOREIGN KEY (access_token_id)
                    REFERENCES AccessToken_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AccessToken_OAuth2
                ADD CONSTRAINT FK_C092BBF419EB6921 FOREIGN KEY (client_id)
                    REFERENCES Client_OAuth2 (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE AccessToken_OAuth2
                ADD CONSTRAINT FK_C092BBF4A76ED395 FOREIGN KEY (user_id)
                    REFERENCES User (id) ON DELETE CASCADE
        ");

        $this->addSql("
            ALTER TABLE Client_OAuth2
                ADD CONSTRAINT FK_A66D48A8A76ED395 FOREIGN KEY (user_id)
                    REFERENCES User (id) ON DELETE CASCADE
        ");
    }

    public function down(Schema $schema) : void
    {
    }
}
