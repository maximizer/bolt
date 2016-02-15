CREATE DATABASE bolt;

CREATE TABLE bolt.boomerang (
	id varchar(100) NOT NULL,
	t_done integer(100) NULL,
	t_page integer(100) NULL,
	t_resp integer(100) NULL,
	t_other integer(100) NULL,
	t_prerender integer(100) NULL,
	t_postrender integer(100) NULL,
	boomerang integer(100) NULL,
	PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8
COLLATE=utf8_general_ci;
