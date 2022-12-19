CREATE TABLE `mydb`.`products` (
                                   `id` SERIAL NOT NULL ,
                                   `code` VARCHAR(255) NOT NULL ,
                                   `name` VARCHAR(255),
                                   `level_1` VARCHAR(255),
                                   `level_2` VARCHAR(255),
                                   `level_3` VARCHAR(255),
                                   `price` DECIMAL,
                                   `price_sp` DECIMAL,
                                   `amount` INT,
                                   `properties` VARCHAR(255),
                                   `joint_purchase` VARCHAR(255),
                                   `unit` VARCHAR(255),
                                   `image` VARCHAR(255),
                                   `show_on_main_page` BOOLEAN,
                                   `description` TEXT(1000),
                                   PRIMARY KEY (`id`)) ENGINE = InnoDB;