-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuario` (
  `id_usuario` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`aluno` (
  `id_usuario` INT NOT NULL,
  `curso` VARCHAR(45) NOT NULL,
  `matricula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_aluno_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_aluno_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`professor` (
  `id_usuario` INT NOT NULL,
  `siape` VARCHAR(45) NOT NULL,
  `lates` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_professor_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_professor_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`funcionario` (
  `id_usuario` INT NOT NULL,
  `siape` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_funcionario_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_funcionario_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`telefone_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`telefone_usuario` (
  `id_telefone` INT NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`id_telefone`),
  INDEX `fk_telefone_usuario_usuario1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_telefone_usuario_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`cargo` (
  `id_cargo` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cargo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`funcionario/cargo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`funcionario/cargo` (
  `id_cargo` INT NOT NULL,
  `id_funcionario` INT NOT NULL,
  `data` DATE NOT NULL,
  PRIMARY KEY (`id_cargo`, `id_funcionario`),
  INDEX `fk_table2_cargo1_idx` (`id_cargo` ASC),
  INDEX `fk_table2_funcionario1_idx` (`id_funcionario` ASC),
  CONSTRAINT `fk_table2_cargo1`
    FOREIGN KEY (`id_cargo`)
    REFERENCES `biblioteca`.`cargo` (`id_cargo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_table2_funcionario1`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `biblioteca`.`funcionario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`area_conhecimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`area_conhecimento` (
  `id_area` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_area`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`titulo_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`titulo_livro` (
  `isbn` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `edicao` VARCHAR(45) NOT NULL,
  `volume` VARCHAR(45) NOT NULL,
  `id_area` INT NOT NULL,
  PRIMARY KEY (`isbn`),
  INDEX `fk_titulo_livro_area_conhecimento1_idx` (`id_area` ASC),
  CONSTRAINT `fk_titulo_livro_area_conhecimento1`
    FOREIGN KEY (`id_area`)
    REFERENCES `biblioteca`.`area_conhecimento` (`id_area`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`exemplar_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`exemplar_livro` (
  `id_exemplar` INT NOT NULL,
  `qtd_exemplares` INT NOT NULL,
  `isbn_livro` INT NOT NULL,
  PRIMARY KEY (`id_exemplar`),
  INDEX `fk_exemplar_livro_titulo_livro1_idx` (`isbn_livro` ASC),
  CONSTRAINT `fk_exemplar_livro_titulo_livro1`
    FOREIGN KEY (`isbn_livro`)
    REFERENCES `biblioteca`.`titulo_livro` (`isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`emprestimo` (
  `data_emprestimo` DATE NOT NULL,
  `data_devolucao` DATE NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_exemplar` INT NOT NULL,
  PRIMARY KEY (`data_emprestimo`),
  INDEX `fk_emprestimo_usuario1_idx` (`id_usuario` ASC),
  INDEX `fk_emprestimo_exemplar_livro1_idx` (`id_exemplar` ASC),
  CONSTRAINT `fk_emprestimo_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_exemplar_livro1`
    FOREIGN KEY (`id_exemplar`)
    REFERENCES `biblioteca`.`exemplar_livro` (`id_exemplar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`editora` (
  `id_editora` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_editora`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`telefone_editora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`telefone_editora` (
  `id_telefone` INT NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `id_editora` INT NOT NULL,
  PRIMARY KEY (`id_telefone`, `id_editora`),
  INDEX `fk_telefone_editora_editora1_idx` (`id_editora` ASC),
  CONSTRAINT `fk_telefone_editora_editora1`
    FOREIGN KEY (`id_editora`)
    REFERENCES `biblioteca`.`editora` (`id_editora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`publicacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`publicacao` (
  `isbn_livro` INT NOT NULL,
  `id_editora` INT NOT NULL,
  INDEX `fk_publicacao_titulo_livro1_idx` (`isbn_livro` ASC),
  INDEX `fk_publicacao_editora1_idx` (`id_editora` ASC),
  CONSTRAINT `fk_publicacao_titulo_livro1`
    FOREIGN KEY (`isbn_livro`)
    REFERENCES `biblioteca`.`titulo_livro` (`isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_publicacao_editora1`
    FOREIGN KEY (`id_editora`)
    REFERENCES `biblioteca`.`editora` (`id_editora`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`autor` (
  `id_autor` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_autor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`telefone_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`telefone_autor` (
  `id_telefone` INT NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `id_autor` INT NOT NULL,
  PRIMARY KEY (`id_telefone`),
  INDEX `fk_telefone_autor_autor1_idx` (`id_autor` ASC),
  CONSTRAINT `fk_telefone_autor_autor1`
    FOREIGN KEY (`id_autor`)
    REFERENCES `biblioteca`.`autor` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`escrito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`escrito` (
  `id_autor` INT NOT NULL,
  `isbn_livro` INT NOT NULL,
  INDEX `fk_escrito_autor1_idx` (`id_autor` ASC),
  INDEX `fk_escrito_titulo_livro1_idx` (`isbn_livro` ASC),
  CONSTRAINT `fk_escrito_autor1`
    FOREIGN KEY (`id_autor`)
    REFERENCES `biblioteca`.`autor` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_escrito_titulo_livro1`
    FOREIGN KEY (`isbn_livro`)
    REFERENCES `biblioteca`.`titulo_livro` (`isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`palavra_chave`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`palavra_chave` (
  `id_palavra` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_palavra`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`livro/palavra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`livro/palavra` (
  `isbn_livro` INT NOT NULL,
  `id_palavra` INT NOT NULL,
  INDEX `fk_livro/palavra_titulo_livro1_idx` (`isbn_livro` ASC),
  INDEX `fk_livro/palavra_palavra_chave1_idx` (`id_palavra` ASC),
  CONSTRAINT `fk_livro/palavra_titulo_livro1`
    FOREIGN KEY (`isbn_livro`)
    REFERENCES `biblioteca`.`titulo_livro` (`isbn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_livro/palavra_palavra_chave1`
    FOREIGN KEY (`id_palavra`)
    REFERENCES `biblioteca`.`palavra_chave` (`id_palavra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
