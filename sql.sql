create database `enadinho`;

CREATE TABLE `enadinho`.`tipos_usuario` (
	`id_tipo_usuario` INT(11) NOT NULL AUTO_INCREMENT,
	`tipo_usuario` varchar(50) NOT NULL,
	PRIMARY KEY (`id_tipo_usuario`)
);

CREATE TABLE `enadinho`.`coordenadores` (
	`id_coordenador` INT(11) NOT NULL AUTO_INCREMENT, 
	`nome_coordenador` VARCHAR(100) NOT NULL, 
	`data_nascimento` DATE NOT NULL, 
	`email_institucional` VARCHAR(100) NOT NULL, 
	`senha` VARCHAR(20) NOT NULL, 
	`fk_tipo_usuario` INT(11) NOT NULL,
	FOREIGN key (`fk_tipo_usuario`) references tipos_usuario(`id_tipo_usuario`),
	PRIMARY KEY (`id_coordenador`)
);

CREATE TABLE `enadinho`.`professores` (
	`id_professor` INT NOT NULL AUTO_INCREMENT, 
	`nome_professor` VARCHAR(100) NOT NULL, 
	`data_nascimento` INT NOT NULL, 
	`email_institucional` VARCHAR(100) NOT NULL, 
	`senha` VARCHAR(20) NOT NULL, 
	`fk_coordenador` INT(11) NOT NULL,
	`fk_tipo_usuario` INT(11) NOT NULL,
    FOREIGN key (`fk_coordenador`) references coordenadores(`id_coordenador`),
	FOREIGN key (`fk_tipo_usuario`) references tipos_usuario(`id_tipo_usuario`),
	PRIMARY KEY (`id_professor`)
);

CREATE TABLE `enadinho`.`alunos` (
	`Id_aluno` INT NOT NULL AUTO_INCREMENT, 
	`nome_aluno` VARCHAR(100) NOT NULL, 
	`data_nascimento` DATE NOT NULL, 
	`email_institucional` VARCHAR(100) NOT NULL, 
	`senha` INT(20) NOT NULL, 
	`fk_tipo_usuario` INT(11) NOT NULL,
	FOREIGN key (`fk_tipo_usuario`) references tipos_usuario(`id_tipo_usuario`),
	PRIMARY KEY (`Id_aluno`)
);

CREATE TABLE `enadinho`.`cursos` (
	`id_curso` INT NOT NULL AUTO_INCREMENT, 
	`nome_curso` VARCHAR(100) NOT NULL, 
	`eixo` TEXT NOT NULL, 
	`fk_coordenador` INT NOT NULL, 
	FOREIGN key (`fk_coordenador`) references coordenadores(`id_coordenador`),
	PRIMARY KEY (`id_curso`)
);

CREATE TABLE `enadinho`.`disciplinas` (
	`id_disciplina` INT NOT NULL AUTO_INCREMENT, 
	`nome_disciplina` VARCHAR(100) NOT NULL, 
	`ementa` TEXT NOT NULL, `objetivo` TEXT NOT NULL, 
	`fk_coordenador` INT NOT NULL, 
	`fk_curso` INT NOT NULL, 
	FOREIGN key (`fk_coordenador`) references coordenadores(`id_coordenador`),
	FOREIGN key (`fk_curso`) references cursos(`id_curso`),
	PRIMARY KEY (`id_disciplina`)
);

CREATE TABLE `enadinho`.`enunciados` (
	`id_enunciado` INT NOT NULL AUTO_INCREMENT, 
	`titulo_enunciado` VARCHAR(100) NOT NULL, 
	`texto` TEXT NOT NULL, 
	`fk_professor` INT NOT NULL, 
	`fk_disciplina` INT NOT NULL,
	FOREIGN key (`fk_professor`) references professores(`id_professor`),
	FOREIGN key (`fk_disciplina`) references disciplinas(`id_disciplina`), 
	PRIMARY KEY (`id_enunciado`)
);

CREATE TABLE `enadinho`.`questoes` (
	`id_questao` INT NOT NULL AUTO_INCREMENT, 
	`texto` TEXT NOT NULL, 
	`alt_a` TEXT NOT NULL, 
	`alt_b` TEXT NOT NULL, 
	`alt_c` TEXT NOT NULL, 
	`alt_d` TEXT NOT NULL, 
	`alt_e` TEXT NOT NULL,
	`alt_certa` INT NOT NULL, 
	`dificuldade` INT NOT NULL, 
	`tempo` TIME NOT NULL, 
	`fk_enunciado` INT NOT NULL,
	`fk_professor` INT NOT NULL, 
	FOREIGN key (`fk_enunciado`) references enunciados(`id_enunciado`), 
	FOREIGN key (`fk_professor`) references professores(`id_professor`),
	PRIMARY KEY (`id_questao`)
);

CREATE TABLE `enadinho`.`feedbacks` (
	`id_feedback` INT NOT NULL AUTO_INCREMENT, 
	`texto` TEXT NOT NULL, 
	`fk_questao` INT NOT NULL, 
	`fk_professor` INT NOT NULL,
	FOREIGN key (`fk_questao`) references questoes(`id_questao`), 
	FOREIGN key (`fk_professor`) references professores(`id_professor`),
	PRIMARY KEY (`id_feedback`)
);

CREATE TABLE `enadinho`.`partida_multiplayer` (
	`id_partida` INT NOT NULL AUTO_INCREMENT, 
	`id_tipo` INT NOT NULL, 
	`token` INT NOT NULL, 
	`tempo_total` TIME NOT NULL, 
	`fk_professor` INT NOT NULL, 
	FOREIGN key (`fk_professor`) references professores(`id_professor`),
	PRIMARY KEY (`id_partida`)
);

CREATE TABLE `enadinho`.`partida_singleplayer` (
	`id_partida` INT NOT NULL AUTO_INCREMENT, 
	`id_tipo` INT NOT NULL, 
	`token` INT NOT NULL, 
	`tempo_total` TIME NOT NULL, 
	`fk_aluno` INT NOT NULL, 
	FOREIGN key (`fk_aluno`) references alunos(`id_aluno`),
	PRIMARY KEY (`id_partida`)
);

CREATE TABLE `enadinho`.`disciplina_professor` (
	`id_disciplina_professor` INT NOT NULL AUTO_INCREMENT, 
	`fk_disciplina` INT NOT NULL, 
	`fk_professor` INT NOT NULL, 
	`fk_coordenador` INT NOT NULL, 
	FOREIGN key (`fk_disciplina`) references disciplinas(`id_disciplina`), 
	FOREIGN key (`fk_professor`) references professores(`id_professor`),
	FOREIGN key (`fk_coordenador`) references coordenadores(`id_coordenador`),
	PRIMARY KEY (`id_disciplina_professor`)
);

CREATE TABLE `enadinho`.`disciplina_aluno` (
	`id_disciplina_aluno` INT NOT NULL AUTO_INCREMENT, 
	`fk_aluno` INT NOT NULL, 
	`fk_disciplina` INT NOT NULL, 
	FOREIGN key (`fk_aluno`) references alunos(`id_aluno`),
	FOREIGN key (`fk_disciplina`) references disciplinas(`id_disciplina`), 
	PRIMARY KEY (`id_disciplina_aluno`)
);

CREATE TABLE `enadinho`.`enunciados_partida_multiplayer` (
	`id_enunciado_partida` INT NOT NULL AUTO_INCREMENT, 
	`fk_enunciado` INT NOT NULL, 
	`fk_partida` INT NOT NULL, 
	FOREIGN key (`fk_enunciado`) references enunciados(`id_enunciado`), 
	FOREIGN key (`fk_partida`) references partida_multiplayer(`id_partida`), 
	PRIMARY KEY (`id_enunciado_partida`)
);

CREATE TABLE `enadinho`.`enunciados_partida_singleplayer` (
	`id_enunciado_partida` INT NOT NULL AUTO_INCREMENT, 
	`fk_enunciado` INT NOT NULL, 
	`fk_partida` INT NOT NULL, 
	FOREIGN key (`fk_enunciado`) references enunciados(`id_enunciado`), 
	FOREIGN key (`fk_partida`) references partida_singleplayer(`id_partida`), 
	PRIMARY KEY (`id_enunciado_partida`)
);

CREATE TABLE `enadinho`.`questoes_partida_multiplayer` (
	`id_enunciado_partida` INT NOT NULL AUTO_INCREMENT, 
	`fk_questao` INT NOT NULL, 
	`fk_enunciado` INT NOT NULL, 
	FOREIGN key (`fk_questao`) references questoes(`id_questao`), 
	FOREIGN key (`fk_enunciado`) references enunciados_partida_multiplayer(`id_enunciado_partida`), 
	PRIMARY KEY (`id_enunciado_partida`)
);

CREATE TABLE `enadinho`.`questoes_partida_singleplayer` (
	`id_enunciado_partida` INT NOT NULL AUTO_INCREMENT, 
	`fk_questao` INT NOT NULL, 
	`fk_enunciado` INT NOT NULL, 
	FOREIGN key (`fk_questao`) references questoes(`id_questao`), 
	FOREIGN key (`fk_enunciado`) references enunciados_partida_singleplayer(`id_enunciado_partida`), 
	PRIMARY KEY (`id_enunciado_partida`)
);

CREATE TABLE `enadinho`.`resposta_partida_multiplayer` (
	`id_resposta_partida` INT NOT NULL AUTO_INCREMENT, 
	`resposta` INT NOT NULL, 
	`tempo` TIME NOT NULL, 
	`fk_aluno` INT NOT NULL, 
	`fk_questao_partida` INT NOT NULL, 
	FOREIGN key (`fk_aluno`) references alunos(`id_aluno`),
	FOREIGN key (`fk_questao_partida`) references questoes_partida_multiplayer(`id_enunciado_partida`),
	PRIMARY KEY (`id_resposta_partida`)
);

CREATE TABLE `enadinho`.`resposta_partida_singleplayer` (
	`id_resposta_partida` INT NOT NULL AUTO_INCREMENT, 
	`resposta` INT NOT NULL, 
	`tempo` TIME NOT NULL, 
	`fk_aluno` INT NOT NULL, 
	`fk_questao_partida` INT NOT NULL, 
	FOREIGN key (`fk_aluno`) references alunos(`id_aluno`),
	FOREIGN key (`fk_questao_partida`) references questoes_partida_singleplayer(`id_enunciado_partida`),
	PRIMARY KEY (`id_resposta_partida`)
);

