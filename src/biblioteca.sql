drop table if exists autores cascade;

create table autores (
    id              bigserial       primary key,
    dni             varchar(9)      not null unique, --? [0-9]{8}[A-Z]{1}
    nombre          varchar(255)    not null,
    fecha_nac       timestamp       not null
);

drop table if exists libros cascade;

create table libros (
    id              bigserial       primary key,
    isbn            varchar(17)     not null unique, --? 978-X-XXXX-XXXX-X
    titulo          varchar(255)    not null, 
    fecha_publi     timestamp       not null,
    autor_id        bigint          not null references autores (id) -- foreign key
    -- generos? algo mas? no se
);

-- fixtures

insert into autores (dni, nombre, fecha_nac)
        values  ('12345678A', 'Pepito Pérez', '1990-01-10'),
                ('12345678B', 'Juanito', '1997-03-08'),
                ('12345678C', 'Margarita', '2002-02-02'),
                ('12345678D', 'Flor', '2000-11-11');

insert into libros (isbn, titulo, fecha_publi, autor_id)
        values  ('978-2-8058-3716-6', 'Las aventuras de Pepito', '2008-01-10', 1),
                ('978-5-9537-3944-3', 'Juanito chocolatero', '2020-12-20', 2),
                ('978-0-8274-3278-9', 'El principito', '2022-02-22', 3),
                ('978-8-6630-9580-9', 'Florecitas del campo', '2021-06-24', 4),
                ('978-9-2006-0257-3', 'No sé qué', '2015-01-17', 1),
                ('978-3-5607-5015-8', 'No sé cuántos', '2019-03-18', 4);
