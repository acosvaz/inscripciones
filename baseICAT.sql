
CREATE TABLE cicloescolar
(
id bigserial NOT NULL,
ciclo text NOT NULL, 

PRIMARY KEY (id)

);
﻿CREATE TABLE talleres
(
id bigserial NOT NULL,
cicloid bigint NOT NULL,
taller text NOT NULL, 

PRIMARY KEY (id)

);
CREATE TABLE docentes
(
id bigserial NOT NULL,
maestro text NOT NULL, 

PRIMARY KEY (id)

);

create table alumnos 
(
id bigserial NOT NULL,
nombre text NOT NULL,
paterno text NOT NULL,
materno text NOT NULL,
edad integer NOT NULL,
correo text NOT NULL,
direccion text NOT NULL,
folio text NOT NULL,

PRIMARY KEY (id),

FOREIGN KEY (nu_genero) REFERENCES generos (id)


);

create table grupos
(
id bigserial NOT NULL,
nu_carrera bigint NOT NULL,
nombre text NOT NULL, 
nu_periodo bigint NOT NULL,

  PRIMARY KEY(id),
  FOREIGN KEY (nu_carrera)REFERENCES carreras(id),
  FOREIGN KEY (nu_periodo)REFERENCES periodos(id)
  
);

<div class="container">
                    <div id="logo">
                    <a href="https://www.moodle.itsescarcega.edu.mx/?redirect=0" class="navbar-brand has-logo
                    ">
                    <span class="logo">
                        <img src="//www.moodle.itsescarcega.edu.mx/pluginfile.php/1/theme_klass/logo/1512742685/logo.png" alt="ITSE">
                    </span>
                    </a>
    				</div>
<div class="ciclos-index">  
