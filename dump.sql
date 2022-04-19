CREATE TABLE `imoveis`.`usuarios` ( 
    `id` INT NOT NULL AUTO_INCREMENT, 
    `login` VARCHAR(150) NOT NULL, 
    `senha` TEXT NOT NULL, 
    PRIMARY KEY (`id`)
    ) 
    ENGINE = InnoDB; 
    
    CREATE TABLE `imoveis`.`anuncios` 
    ( `id` INT NOT NULL AUTO_INCREMENT , 
    `descricao` TEXT NOT NULL , 
    `valor` TEXT NOT NULL , 
    `iptu` TEXT NOT NULL , 
    `condominio` INT NOT NULL , 
    `urlFoto` INT NOT NULL , 
    `endereco` INT NOT NULL , 
    PRIMARY KEY (`id`)
    ) 
    ENGINE = InnoDB; 