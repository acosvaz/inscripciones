--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.7
-- Dumped by pg_dump version 9.5.7

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: alumnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE alumnos (
    id bigint NOT NULL,
    nombre text NOT NULL,
    paterno text NOT NULL,
    materno text NOT NULL,
    edad integer NOT NULL,
    correo text,
    direccion text NOT NULL,
    folio text NOT NULL
);


ALTER TABLE alumnos OWNER TO postgres;

--
-- Name: alumnos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE alumnos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE alumnos_id_seq OWNER TO postgres;

--
-- Name: alumnos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE alumnos_id_seq OWNED BY alumnos.id;


--
-- Name: ciclos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ciclos (
    id bigint NOT NULL,
    ciclo text NOT NULL,
    precio text NOT NULL
);


ALTER TABLE ciclos OWNER TO postgres;

--
-- Name: ciclos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ciclos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ciclos_id_seq OWNER TO postgres;

--
-- Name: ciclos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ciclos_id_seq OWNED BY ciclos.id;


--
-- Name: docente_taller; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE docente_taller (
    id bigint NOT NULL,
    tallerid bigint NOT NULL,
    docenteid bigint NOT NULL
);


ALTER TABLE docente_taller OWNER TO postgres;

--
-- Name: docente_taller_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE docente_taller_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE docente_taller_id_seq OWNER TO postgres;

--
-- Name: docente_taller_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE docente_taller_id_seq OWNED BY docente_taller.id;


--
-- Name: docentes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE docentes (
    id bigint NOT NULL,
    nombre text NOT NULL,
    paterno text NOT NULL,
    materno text NOT NULL
);


ALTER TABLE docentes OWNER TO postgres;

--
-- Name: docentes_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE docentes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE docentes_id_seq OWNER TO postgres;

--
-- Name: docentes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE docentes_id_seq OWNED BY docentes.id;


--
-- Name: grupos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE grupos (
    id bigint NOT NULL,
    grupo text NOT NULL,
    tallerid bigint NOT NULL
);


ALTER TABLE grupos OWNER TO postgres;

--
-- Name: grupos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE grupos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE grupos_id_seq OWNER TO postgres;

--
-- Name: grupos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE grupos_id_seq OWNED BY grupos.id;


--
-- Name: horarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE horarios (
    id bigint NOT NULL,
    tallerid bigint NOT NULL,
    horario text NOT NULL
);


ALTER TABLE horarios OWNER TO postgres;

--
-- Name: horarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE horarios_id_seq OWNER TO postgres;

--
-- Name: horarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horarios_id_seq OWNED BY horarios.id;


--
-- Name: members_groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE members_groups (
    id bigint NOT NULL,
    grupoid bigint NOT NULL,
    alumnoid bigint NOT NULL
);


ALTER TABLE members_groups OWNER TO postgres;

--
-- Name: members_groups_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE members_groups_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE members_groups_id_seq OWNER TO postgres;

--
-- Name: members_groups_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE members_groups_id_seq OWNED BY members_groups.id;


--
-- Name: talleres; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE talleres (
    id bigint NOT NULL,
    cicloid bigint NOT NULL,
    taller text NOT NULL
);


ALTER TABLE talleres OWNER TO postgres;

--
-- Name: talleres_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE talleres_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE talleres_id_seq OWNER TO postgres;

--
-- Name: talleres_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE talleres_id_seq OWNED BY talleres.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alumnos ALTER COLUMN id SET DEFAULT nextval('alumnos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciclos ALTER COLUMN id SET DEFAULT nextval('ciclos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_taller ALTER COLUMN id SET DEFAULT nextval('docente_taller_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docentes ALTER COLUMN id SET DEFAULT nextval('docentes_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY grupos ALTER COLUMN id SET DEFAULT nextval('grupos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horarios ALTER COLUMN id SET DEFAULT nextval('horarios_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY members_groups ALTER COLUMN id SET DEFAULT nextval('members_groups_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY talleres ALTER COLUMN id SET DEFAULT nextval('talleres_id_seq'::regclass);


--
-- Data for Name: alumnos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY alumnos (id, nombre, paterno, materno, edad, correo, direccion, folio) FROM stdin;
1	omar	alvarez	mendoza	20	gadfgfh{aj	uaheiuiaebw	5432
2	wendy	puc	tun	21	sag	aewt	8080
3	Judith	Cruz	Reyes	25		Miguel Hidalgo	1234
4	MOYSE	LIZ	WAD	23	ALVAREZ@HOTMAIL.COM	calle 25	2345
\.


--
-- Name: alumnos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('alumnos_id_seq', 4, true);


--
-- Data for Name: ciclos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ciclos (id, ciclo, precio) FROM stdin;
1	Junio 2016 - Diciembre 2017	$ 700
2	Enero 2016 - Junio 2017	$ 700
3	enero - febrero	$200
4	2025 -2026	900
\.


--
-- Name: ciclos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ciclos_id_seq', 4, true);


--
-- Data for Name: docente_taller; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY docente_taller (id, tallerid, docenteid) FROM stdin;
1	1	1
2	1	1
\.


--
-- Name: docente_taller_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('docente_taller_id_seq', 2, true);


--
-- Data for Name: docentes; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY docentes (id, nombre, paterno, materno) FROM stdin;
1	obhet	ballina	reyes
2	Jonatan	Aquino	Perez
\.


--
-- Name: docentes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('docentes_id_seq', 2, true);


--
-- Data for Name: grupos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY grupos (id, grupo, tallerid) FROM stdin;
1	CCMA-1	1
2	Lama	2
\.


--
-- Name: grupos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('grupos_id_seq', 2, true);


--
-- Data for Name: horarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY horarios (id, tallerid, horario) FROM stdin;
1	1	7:00 p.m. - 9:00 p.m.
3	1	8:00 am a 4:00 p.m
2	2	3:00 am - 5:00 am
\.


--
-- Name: horarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horarios_id_seq', 3, true);


--
-- Data for Name: members_groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY members_groups (id, grupoid, alumnoid) FROM stdin;
1	1	1
3	1	2
4	1	3
5	1	4
\.


--
-- Name: members_groups_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('members_groups_id_seq', 5, true);


--
-- Data for Name: talleres; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY talleres (id, cicloid, taller) FROM stdin;
1	1	Corte y confección
2	2	be
\.


--
-- Name: talleres_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('talleres_id_seq', 2, true);


--
-- Name: alumnos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY alumnos
    ADD CONSTRAINT alumnos_pkey PRIMARY KEY (id);


--
-- Name: ciclos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciclos
    ADD CONSTRAINT ciclos_pkey PRIMARY KEY (id);


--
-- Name: docente_taller_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_taller
    ADD CONSTRAINT docente_taller_pkey PRIMARY KEY (id);


--
-- Name: docentes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docentes
    ADD CONSTRAINT docentes_pkey PRIMARY KEY (id);


--
-- Name: grupos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY grupos
    ADD CONSTRAINT grupos_pkey PRIMARY KEY (id);


--
-- Name: horarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_pkey PRIMARY KEY (id);


--
-- Name: members_groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY members_groups
    ADD CONSTRAINT members_groups_pkey PRIMARY KEY (id);


--
-- Name: talleres_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY talleres
    ADD CONSTRAINT talleres_pkey PRIMARY KEY (id);


--
-- Name: docente_taller_docenteid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_taller
    ADD CONSTRAINT docente_taller_docenteid_fkey FOREIGN KEY (docenteid) REFERENCES docentes(id);


--
-- Name: docente_taller_tallerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY docente_taller
    ADD CONSTRAINT docente_taller_tallerid_fkey FOREIGN KEY (tallerid) REFERENCES talleres(id);


--
-- Name: grupos_tallerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY grupos
    ADD CONSTRAINT grupos_tallerid_fkey FOREIGN KEY (tallerid) REFERENCES talleres(id);


--
-- Name: horarios_tallerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horarios
    ADD CONSTRAINT horarios_tallerid_fkey FOREIGN KEY (tallerid) REFERENCES talleres(id);


--
-- Name: members_groups_alumnoid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY members_groups
    ADD CONSTRAINT members_groups_alumnoid_fkey FOREIGN KEY (alumnoid) REFERENCES alumnos(id);


--
-- Name: members_groups_grupoid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY members_groups
    ADD CONSTRAINT members_groups_grupoid_fkey FOREIGN KEY (grupoid) REFERENCES grupos(id);


--
-- Name: talleres_cicloid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY talleres
    ADD CONSTRAINT talleres_cicloid_fkey FOREIGN KEY (cicloid) REFERENCES ciclos(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

