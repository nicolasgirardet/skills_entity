<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221109134718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skill_book (skill_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_8CA43F835585C142 (skill_id), INDEX IDX_8CA43F8316A2B381 (book_id), PRIMARY KEY(skill_id, book_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill_book ADD CONSTRAINT FK_8CA43F835585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_book ADD CONSTRAINT FK_8CA43F8316A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_skill DROP FOREIGN KEY FK_50FFF10E16A2B381');
        $this->addSql('ALTER TABLE book_skill DROP FOREIGN KEY FK_50FFF10E5585C142');
        $this->addSql('DROP TABLE book_skill');
        $this->addSql('ALTER TABLE skill CHANGE creation_date creation_date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book_skill (book_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_50FFF10E16A2B381 (book_id), INDEX IDX_50FFF10E5585C142 (skill_id), PRIMARY KEY(book_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE book_skill ADD CONSTRAINT FK_50FFF10E16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE book_skill ADD CONSTRAINT FK_50FFF10E5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_book DROP FOREIGN KEY FK_8CA43F835585C142');
        $this->addSql('ALTER TABLE skill_book DROP FOREIGN KEY FK_8CA43F8316A2B381');
        $this->addSql('DROP TABLE skill_book');
        $this->addSql('ALTER TABLE skill CHANGE creation_date creation_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
    }
}
