CREATE TABLE `teste`.`livros` (
  `idLivros` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NULL,
  `autor` VARCHAR(100) NULL,
  `editora` VARCHAR(100) NULL,
  `dataPublicacao` DATE NULL,
  `genero` VARCHAR(45) NULL,
  `condicao` VARCHAR(45) NULL,
  PRIMARY KEY (`idLivros`));
