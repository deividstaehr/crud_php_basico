CREATE TABLE categorias (
  id integer NOT NULL,
  nome varchar(200) NOT NULL
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE produtos (
  id integer NOT NULL,
  nome varchar(50) NOT NULL,
  preco numeric(14, 2) NOT NULL,
  descricao varchar(200) NOT NULL,
  categoria_id integer NOT NULL
);

--
-- Índices de tabela `categorias`
--
ALTER TABLE categorias
  ADD CONSTRAINT pk_categorias PRIMARY KEY(id);

--
-- Índices de tabela `produtos`
--
ALTER TABLE produtos
  ADD CONSTRAINT pk_produtos PRIMARY KEY(id);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE produtos
  ADD CONSTRAINT fk_produtos FOREIGN KEY(categoria_id)
  REFERENCES categorias(id);
