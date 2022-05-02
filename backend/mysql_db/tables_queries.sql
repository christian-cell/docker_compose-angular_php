create table clientes(
  id_cliente INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(45) NULL,
  primer_apellido VARCHAR(45) NULL,
  segundo_apellido VARCHAR(45) NULL,
  dni VARCHAR(45) NULL,
  fecha DATE,
  telefono VARCHAR(45) NULL,
  movil_uno VARCHAR(45) NULL,
  movil_dos VARCHAR(45) NULL,
  movil_tutor VARCHAR(45) NULL,
  piso VARCHAR(45) NULL,
  codigo_postal VARCHAR(45) NULL,
  direccion VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  email_dos VARCHAR(45) NULL,
  salario FLOAT(6,2) NULL,
  poblacion VARCHAR(20) NULL
);

INSERT INTO clientes values (1,'carlos','fernandez','fernandez','02345758','1990-03-03','91234432','666666666','666666666'
,'666666666','3','28026','calle del amor hermoso','cristohp74@gmail.com','cristohp74@gmail.com',0,'madrid');

INSERT INTO clientes values (2,'mario','fernandez','caceres','8274859','1993-06-09','93453453','6573827','656656656'
,'6666687689','5','28026','calle de marcelo usera','mario74@gmail.com','mario1@gmail.com',0,'madrid');

INSERT INTO clientes values (3,'fernando','gonzalez','lucero','83938759','2000-11-11','832948529','340593283','329042'
,'934850234','5','28027','calle del cristo de la victoria','fernando174@gmail.com','fernando@gmail.com',0,'madrid');


create table especialistas(
  id_especialista INT(11) PRIMARY KEY AUTO_INCREMENT,
  especialista VARCHAR(45) NULL,
  colegiado VARCHAR(45) NULL,
  movil VARCHAR(45) NULL,
  color VARCHAR(45) NULL,
  fecha DATE
);

INSERT INTO especialistas values (1,'juan','734892','666666666','red','2000-11-11');
INSERT INTO especialistas values (2,'carlos','3405','646464646','green','2008-09-09');
INSERT INTO especialistas values (3,'roberto','29352345','656656656','blue','2006-07-07');


create table agenda(
  id_agenda INT(11) PRIMARY KEY AUTO_INCREMENT,
  fecha DATE,
  hora TIME,
  id_especialista INT(11) NOT NULL,
  id_cliente INT(11) NOT NULL,
  centro VARCHAR(45) NOT NULL,
  notas VARCHAR(45),
  foreign key(id_especialista) references especialistas(id_especialista),
  foreign key(id_cliente) references clientes(id_cliente)
);

INSERT INTO agenda values (1,'2021-11-11','12:23:23',2,2,'1','test de agenda con el especialista 2');
INSERT INTO agenda values (2,'2020-10-23','10:11:11',3,3,'1','test de agenda con el especialista 1');
INSERT INTO agenda values (3,'2021-11-11','12:23:23',2,3,'1','test de agenda con el especialista 3');