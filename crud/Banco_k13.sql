-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 18, 2018 as 01:22 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `k13`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(5) NOT NULL,
  `numero_telefone` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `id_usuario`, `numero_telefone`) VALUES
(5, 30, 9999),
(6, 30, 9999),
(7, 30, 9999),
(8, 30, 9999),
(10, 30, 9999),
(11, 30, 22222222),
(12, 30, 9999),
(13, 30, 7777),
(14, 30, 9999),
(15, 30, 123123),
(16, 30, 9999),
(17, 30, 11111111),
(18, 2, 777);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
(2, 'asd', '12123', 'sdasd', 0, NULL, 'asd', 'asfaf', 'asfasf'),
(3, 'asd', '12123', 'sdasd', 2230, NULL, 'BATEL', 'asfaf', 'asfasf'),
(30, 'JAMILSON', '85015460', 'Rua', 0, NULL, 'Santa', 'Guarapuava', 'PR'),
(32, 'JAMILSON BINE', '85015460', 'Rua Domingos Caetano do Amaral', 0, NULL, 'Santa Cruz', 'Guarapuava', 'PR'),
(33, 'JAMILSON', '85015460', 'Rua', 0, NULL, 'Santa', 'Guarapuava', 'PR'),
(35, 'JAMILSON BINE', '85015460', 'Rua Domingos Caetano do Amaral', 0, NULL, 'Santa Cruz', 'Guarapuava', 'PR'),
(37, 'JAMILSON BINE', '85015460', 'Rua Domingos Caetano do Amaral', 0, NULL, 'Santa Cruz', 'Guarapuava', 'PR'),
(38, 'JAMILSON BINE', '85015460', 'Rua Domingos Caetano do Amaral', 0, NULL, 'Santa Cruz', 'Guarapuava', 'PR'),
(39, 'JAMILSON', '85015460', 'Rua', 0, NULL, 'Santa', 'Guarapuava', 'PR'),
(40, 'JAMILSON BINE', '85015460', 'Rua Domingos Caetano do Amaral', 0, NULL, 'Santa Cruz', 'Guarapuava', 'PR');
