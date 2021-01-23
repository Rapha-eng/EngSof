CREATE DATABASE Hospital;
use Hospital;

CREATE TABLE setores(
ID int NOT NULL AUTO_INCREMENT,
nome Varchar(50),
numero int,
PRIMARY KEY (ID));

CREATE TABLE Corpo_Clinico (
vinculo Varchar(50),
referencia Varchar (50) NOT NULL,
nome Varchar (100),
categoria Varchar (50),
consenf Varchar (50),
setor_ID int,
PRIMARY KEY (referencia),
FOREIGN KEY (setor_ID) REFERENCES setores(ID));

CREATE TABLE Escalas (
esc_ID int NOT NULL AUTO_INCREMENT,
inicio DATE,
fim DATE,
turno Varchar (50),
PRIMARY KEY (esc_ID),
CONSTRAINT primaria UNIQUE (inicio, turno));

CREATE TABLE usuarios_escalas (
user_esc_ID int NOT NULL AUTO_INCREMENT,
esc_ID int,
user_referencia Varchar (50),
entrada TIME,
saida TIME,
PRIMARY KEY (user_esc_ID),
FOREIGN KEY (esc_ID) REFERENCES Escalas(esc_ID),
FOREIGN KEY (user_referencia) REFERENCES Corpo_Clinico(referencia),
CONSTRAINT primaria UNIQUE (user_referencia,esc_ID));

CREATE TABLE usuarios_dias_escalas (
user_esc_day_ID int NOT NULL AUTO_INCREMENT,
esc_ID int,
user_referencia Varchar (50),
dia DATE,
situacao Varchar (50) DEFAULT 'Escalado',
PRIMARY KEY (user_esc_day_ID),
FOREIGN KEY (esc_ID) REFERENCES Escalas(esc_ID),
FOREIGN KEY (user_referencia) REFERENCES Corpo_Clinico(referencia),
CONSTRAINT primaria UNIQUE (user_referencia,esc_ID,dia));
