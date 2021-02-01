--create database mvc
use mvc

CREATE TABLE cliente (
  idCliente int NOT NULL AUTO_INCREMENT,
  ClienteNombre varchar(45) NOT NULL,
  PRIMARY KEY (idCliente)
)
CREATE TABLE contratos (
  idContratos int NOT NULL AUTO_INCREMENT,
  idCliente int NOT NULL,
  Contrato varchar(45) NOT NULL,
  Monto decimal(18,2) NOT NULL,
  Fecha date NOT NULL,
  PRIMARY KEY (idContratos),
  KEY fk_cliente_idx (idCliente),
  CONSTRAINT fk_cliente FOREIGN KEY (idCliente) REFERENCES cliente (idCliente)
)