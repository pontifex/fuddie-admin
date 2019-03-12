<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190312102356 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, v_street VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_city VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_state VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_country VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_postal_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_line1 VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_line2 VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE badge (id INT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_image VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, v_name VARCHAR(200) NOT NULL COLLATE utf8mb4_unicode_ci, v_website VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_logo VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_address VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_phone VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, j_settings JSON DEFAULT NULL, b_status TINYINT(1) DEFAULT \'1\' NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE discount_type (id VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_unit VARCHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mini_game (id INT AUTO_INCREMENT NOT NULL, fk_badge INT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, i_badge_goal INT DEFAULT 0 NOT NULL, v_description VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_game_badge1_idx (fk_badge), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mini_game_category (id INT AUTO_INCREMENT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_url_icon VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(1000) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mini_game_has_mini_game_category (mini_game_id INT NOT NULL, mini_game_category_id INT NOT NULL, INDEX fk_mini_game_has_mini_game_category_mini_game1_idx (mini_game_id), INDEX fk_mini_game_has_mini_game_category_mini_game_category1_idx (mini_game_category_id), PRIMARY KEY(mini_game_id, mini_game_category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, fk_payment INT DEFAULT NULL, fk_user INT NOT NULL, fk_restaurant INT NOT NULL, fk_order_status INT NOT NULL, v_uuid VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_subtotal NUMERIC(10, 2) NOT NULL, d_discount NUMERIC(10, 2) NOT NULL, d_fee NUMERIC(10, 2) NOT NULL, d_total NUMERIC(10, 2) NOT NULL, d_fee_percentage NUMERIC(10, 2) NOT NULL, v_currency VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_ip VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_channel VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_order_payment1_idx (fk_payment), INDEX fk_order_restaurant1_idx (fk_restaurant), INDEX fk_order_user1_idx (fk_user), INDEX fk_order_order_status1_idx (fk_order_status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_status (id INT AUTO_INCREMENT NOT NULL, v_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE order_status_history (id INT AUTO_INCREMENT NOT NULL, fk_order INT NOT NULL, fk_order_status INT NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, INDEX fk_order_status_history_order1_idx (fk_order), INDEX fk_order_status_history_order_status1_idx (fk_order_status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE parameter (id INT AUTO_INCREMENT NOT NULL, fk_parameter_type INT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_value VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_parameter_parameter_type1_idx (fk_parameter_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE parameter_type (id INT AUTO_INCREMENT NOT NULL, v_type VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, fk_payment_method INT NOT NULL, v_gateway_code VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_gateway_status VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, d_total NUMERIC(10, 2) NOT NULL, v_currency VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_payment_payment_method1_idx (fk_payment_method), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_gateway (id VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_history (id INT AUTO_INCREMENT NOT NULL, fk_payment INT NOT NULL, v_gateway_status VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, t_request TEXT NOT NULL COLLATE utf8mb4_unicode_ci, t_response TEXT NOT NULL COLLATE utf8mb4_unicode_ci, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_payment_history_payment1_idx (fk_payment), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_method (id INT AUTO_INCREMENT NOT NULL, fk_payment_method_type VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, fk_user_has_payment_gateway INT NOT NULL, c_iin CHAR(6) DEFAULT NULL COLLATE utf8mb4_unicode_ci, c_last_4_digits CHAR(4) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_token VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_type_card VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_brand VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_issuer VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_device_session_id VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci, b_default TINYINT(1) NOT NULL, b_status TINYINT(1) NOT NULL, d_expired_at DATE DEFAULT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_payment_method_payment_method_type1_idx (fk_payment_method_type), INDEX fk_payment_method_user_has_payment_gateway1_idx (fk_user_has_payment_gateway), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_method_type (id VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, fk_company INT NOT NULL, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_logo VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_address VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_phone VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_website VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_email VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_description VARCHAR(1000) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_longitude VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_latitude VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, j_settings JSON DEFAULT NULL, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_branch_company1_idx (fk_company), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE restaurant_has_category (restaurant_id INT NOT NULL, category_id INT NOT NULL, INDEX fk_restaurant_has_category_restaurant1_idx (restaurant_id), INDEX fk_restaurant_has_category_category1_idx (category_id), PRIMARY KEY(restaurant_id, category_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE restaurant_has_mini_game (id INT AUTO_INCREMENT NOT NULL, fk_restaurant INT NOT NULL, fk_game INT NOT NULL, fk_discount_type VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, d_amount NUMERIC(10, 2) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_restaurant_has_game_restaurant1_idx (fk_restaurant), INDEX fk_restaurant_has_game_discount_type1_idx (fk_discount_type), INDEX fk_restaurant_has_game_game1_idx (fk_game), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE restaurant_image (id INT AUTO_INCREMENT NOT NULL, fk_restaurant INT NOT NULL, v_url VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_restaurant_image_restaurant1_idx (fk_restaurant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE restaurant_schedule (id INT AUTO_INCREMENT NOT NULL, fk_restaurant INT NOT NULL, i_day CHAR(1) NOT NULL COLLATE utf8mb4_unicode_ci, d_open_at TIME NOT NULL, d_close_at TIME NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_restaurant_schedule_restaurant1_idx (fk_restaurant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reward (id INT AUTO_INCREMENT NOT NULL, fk_waiter INT NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_reward_waiter1_idx (fk_waiter), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, fk_address INT DEFAULT NULL, v_external_id VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_name VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_email VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, v_phone VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, v_gender VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, d_birthday DATE DEFAULT NULL, v_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, j_settings JSON DEFAULT NULL, i_ranking INT DEFAULT 0, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at DATETIME DEFAULT NULL, UNIQUE INDEX v_external_id_UNIQUE (v_external_id), INDEX fk_user_address1_idx (fk_address), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_has_badge (user_id INT NOT NULL, badge_id INT NOT NULL, INDEX fk_user_has_badge_user1_idx (user_id), INDEX fk_user_has_badge_badge1_idx (badge_id), PRIMARY KEY(user_id, badge_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_has_payment_gateway (id INT AUTO_INCREMENT NOT NULL, fk_user INT NOT NULL, fk_payment_gateway VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci, v_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, v_device_code VARCHAR(45) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME NOT NULL, d_updated_at DATETIME NOT NULL, d_deleted_at DATETIME DEFAULT NULL, INDEX fk_user_has_payment_gateway_user1_idx (fk_user), INDEX fk_user_has_payment_gateway_payment_gateway1_idx (fk_payment_gateway), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_has_user (user_id INT NOT NULL, user_id1 INT NOT NULL, INDEX fk_user_has_user_user1_idx (user_id), INDEX fk_user_has_user_user2_idx (user_id1), PRIMARY KEY(user_id, user_id1)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE waiter (id INT AUTO_INCREMENT NOT NULL, fk_restaurant INT NOT NULL, v_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, c_code CHAR(5) NOT NULL COLLATE utf8mb4_unicode_ci, b_status TINYINT(1) NOT NULL, d_created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, d_deleted_at VARCHAR(45) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX fk_waiter_restaurant1_idx (fk_restaurant), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE address');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE badge');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE company');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE discount_type');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mini_game');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mini_game_category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mini_game_has_mini_game_category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE `order`');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_status');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE order_status_history');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE parameter');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE parameter_type');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment_gateway');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment_history');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment_method');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE payment_method_type');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE restaurant');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE restaurant_has_category');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE restaurant_has_mini_game');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE restaurant_image');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE restaurant_schedule');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE reward');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_has_badge');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_has_payment_gateway');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_has_user');
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE waiter');
    }
}
