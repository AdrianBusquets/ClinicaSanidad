create DATABASE clinica;
use clinica;

create table pacientes(
    id int PRIMARY KEY,
    nombre varchar(40) not null,
    apellido varchar(50) not null,
    tipo_habitacion varchar(30) not null,
    num_habitacion int not null
)

select * from pacientes;

drop table pacientes;