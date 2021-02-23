<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219200849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
            INSERT INTO `user` (`email`, `roles`, `password`)
            VALUES
                (\'admin@admin.com\', \'["ROLE_ADMIN"]\', \'$argon2id$v=19$m=65536,t=4,p=1$GjBnWVCIa9wxZK/udjqqWg$3D9UN7kB/EdegDnPZfsX3mmEIxDwIhc8TntVswevctA\');
            '
        );
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
