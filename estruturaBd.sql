CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  senha VARCHAR(255) NOT NULL
);

CREATE TABLE especies (
  id INT PRIMARY KEY AUTO_INCREMENT,
  especie VARCHAR(100) NOT NULL
);

CREATE TABLE responsaveis (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255),
    telefone VARCHAR(20)
);

CREATE TABLE pets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    nascimento DATE NOT NULL,
    especie_id INT NOT NULL,
    responsavel_id INT NOT NULL,
    prontuario TEXT,
    genero ENUM('macho', 'femea') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (especie_id) REFERENCES especies(id),
    FOREIGN KEY (responsavel_id) REFERENCES responsaveis(id)
);


-- Mockups

INSERT INTO responsaveis (nome, endereco, telefone) VALUES
('Marcos Almeida', 'Rua das Flores, 120', '(51) 99911-2233'),
('Fernanda Rocha', 'Av. Brasil, 450', '(51) 99822-3344'),
('Ricardo Martins', 'Rua Central, 87', '(51) 99733-4455'),
('Juliana Ferreira', 'Rua dos Pinheiros, 230', '(51) 99644-5566'),
('Lucas Oliveira', 'Av. Independência, 900', '(51) 99555-6677'),
('Camila Santos', 'Rua São Pedro, 315', '(51) 99466-7788'),
('Rafael Costa', 'Rua das Acácias, 76', '(51) 99377-8899'),
('Patrícia Lima', 'Av. Principal, 1020', '(51) 99288-9900');

INSERT INTO especies (especie) VALUES
('Cachorro'),
('Gato'),
('Coelho'),
('Hamster'),
('Pássaro'),
('Tartaruga'),
('Furão');

INSERT INTO pets
(nome, nascimento, especie_id, responsavel_id, prontuario, genero)
VALUES
('Thor', '2021-03-15', 1, 1,
 'Vacinação em dia. Animal saudável. Consulta de rotina realizada.',
 'macho'),
('Luna', '2020-07-22', 2, 1,
 'Vacinação atualizada. Animal saudável.',
 'femea'),
('Mel', '2022-01-10', 7, 2,
 'Consulta preventiva. Peso dentro do esperado.',
 'femea'),
('Simba', '2019-11-05', 2, 2,
 'Histórico de alergia de pele. Em acompanhamento.',
 'macho'),
('Nina', '2023-04-18', 7, 3,
 'Primeira consulta. Animal saudável e ativo.',
 'femea'),
('Bidu', '2022-09-30', 1, 3,
 'Vacinação anual realizada. Exame clínico normal.',
 'macho'),
('Mia', '2021-12-12', 2, 4,
 'Histórico de conjuntivite. Tratamento concluído.',
 'femea'),
('Pipoca', '2023-02-20', 4, 4,
 'Animal saudável. Alimentação e comportamento normais.',
 'femea'),
('Bob', '2020-05-14', 1, 5,
 'Histórico de vacinação completo. Consulta de rotina.',
 'macho'),
('Amora', '2022-06-25', 2, 5,
 'Avaliação odontológica realizada. Sem alterações.',
 'femea'),
('Toby', '2021-08-17', 1, 6,
 'Apresenta sobrepeso leve. Recomendado controle alimentar.',
 'macho'),
('Lili', '2023-01-08', 5, 6,
 'Animal ativo e saudável.',
 'femea'),
('Max', '2019-03-27', 1, 7,
 'Paciente idoso. Necessita acompanhamento periódico.',
 'macho'),
('Belinha', '2022-10-11', 2, 7,
 'Vacinação atualizada. Exame clínico normal.',
 'femea'),
('Fred', '2020-12-03', 6, 8,
 'Animal saudável. Avaliação de rotina realizada.',
 'macho'),
('Melody', '2021-05-19', 1, 8,
 'Paciente saudável. Vacinação em dia.',
 'femea');