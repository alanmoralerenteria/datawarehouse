create table estados(
	id int not null auto_increment primary key,
	estado varchar(30)
);

create table areas(
	id int not null auto_increment primary key,
	nombre varchar(50) 
);

create table autores(
	id int not null auto_increment primary key,
	nombre varchar(50),
);

create table generos(
	id int not null auto_increment primary key,
	genero varchar(20)
);

create table libros(
	id int not null auto_increment primary key,
	idArea int not null,
	nombre varchar(100),
	ruta varchar(100),
	tipo varchar(5),
	status int,
	foreign key(idArea) references areas(id)
);

create table librosAutores(
	idLibro int not null,
	idAutor int not null,
	foreign key(idLibro) references libros(id),
	foreign key(idAutor) references autores(id)
);

create table librosGeneros(
	idLibro int not null,
	idGenero int not null,
	foreign key(idGenero) references generos(id),
	foreign key(idLibro) references libros(id)
);


db.libros.insert({
	"nombre":"libro4",
	"ruta":"/libros/ruta4.pdf",
	"tipo":"PDF",
	"estado":"Disponible",
	"area":"computacion",
	"autores":[{"nombre":"autor 4"},{"nombre":"autor 5"}],
	"generos":[{"genero":"genero1"},{"genero":"genero5"}]
	})

sudo apt-get install php-mongodb -y