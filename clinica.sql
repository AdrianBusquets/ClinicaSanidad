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
select * from historial;

drop table historial;

create table historial(
    codigo_paciente int unique key,
    nombre_paciente varchar(50),
    nombre_medico varchar(50),
    fecha_actualizacion date,
    telefono_paciente int,
    telefono_medico int,
    nombre_medicamento varchar(30),
    dosificacion varchar(30),
    frecuencia varchar(40),
    medico_medicina varchar(50),
    fecha_inicio_medicamento date,
    fecha_final_medicamento date,
    proposito_medicamento text,
    procedimiento_cirugia varchar(40),
    medico_cirugia varchar(50),
    hospital_cirugia varchar(40),
    fecha_cirugia date,
    nota_cirugia text,
    enfermedad varchar(40),
    fecha_inicio_enfermedad date,
    fecha_final_enfermedad date,
    medico_enfermedad varchar(50),
    nota_enfermedad text,
    nombre_vacuna varchar(40),
    fecha_vacuna date
);