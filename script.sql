CREATE TABLE IF NOT EXISTS `tipoUsuario` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`descricao` VARCHAR(45) NOT NULL,
PRIMARY KEY (`codigo`)
);

INSERT INTO `tipoUsuario`
(`descricao`)
VALUES
('admin'),
('user'),
('user-especial'),
('user-consulta');

CREATE TABLE IF NOT EXISTS `estabelecimento` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(45) NOT NULL,
`cnpj` VARCHAR(45) NOT NULL,
`cep` VARCHAR(45) NOT NULL,
`estiloculinaria` VARCHAR(45) NOT NULL,
`codigo_dono` INT NOT NULL,
`codigo_site` INT NOT NULL,
PRIMARY KEY (`codigo`)
);
CREATE TABLE IF NOT EXISTS `estiloculinaria` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`descricao` VARCHAR(45) NOT NULL,
PRIMARY KEY (`codigo`)
);

CREATE TABLE IF NOT EXISTS `statusUsuario` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`descricao` VARCHAR(45) NOT NULL,
PRIMARY KEY (`codigo`)
);
CREATE TABLE IF NOT EXISTS `map` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`cep` VARCHAR(100) NOT NULL,
`rua` VARCHAR(100) NOT NULL,
`bairro` VARCHAR(100) NOT NULL,
`cidade` VARCHAR(100) NOT NULL,
`estado` VARCHAR(100) NOT NULL,
PRIMARY KEY (`codigo`)
);

CREATE TABLE IF NOT EXISTS `usuario` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(100) NOT NULL,
`dataNascimento` DATE NOT NULL,
`email` VARCHAR(100) NOT NULL UNIQUE,
`telefone` VARCHAR(100) NOT NULL,
`usuario` VARCHAR(100) NOT NULL,
`senha` VARCHAR(100) NOT NULL,
`cpf` VARCHAR(45) NOT NULL,
`tipoUsuario_codigo` INT NOT NULL,
PRIMARY KEY (`codigo`),
INDEX `fk_usuario_tipoUsuario_idx` (`tipoUsuario_codigo` ASC),
CONSTRAINT `fk_usuario_tipoUsuario`
FOREIGN KEY (`tipoUsuario_codigo`)
REFERENCES `tipoUsuario` (`codigo`)
ON DELETE NO ACTION
ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `site` (
`codigo` INT NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(100) NOT NULL,
`url` VARCHAR(100) NOT NULL UNIQUE,
`estabelecimento_codigo` INT NOT NULL,
PRIMARY KEY (`codigo`),
INDEX `fk_site_estabelecimento_idx` (`estabelecimento_codigo` ASC),
CONSTRAINT `fk_site_estabelecimento`
FOREIGN KEY (`estabelecimento_codigo`)
REFERENCES `estabelecimento` (`codigo`)
ON DELETE NO ACTION
ON UPDATE NO ACTION);