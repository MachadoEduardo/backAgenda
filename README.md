# Sistema Administrativo ByteSquad
## Descrição
Este projeto é uma aplicação web administrativa desenvolvida em PHP para gerenciar um jogo de perguntas e respostas na área de tecnologia para dispositivos móveis. A aplicação permite a administração de questões e usuários, facilitando a manutenção e o gerenciamento das informações do jogo.

### Funcionalidades
- Adicionar Novas Perguntas: Inclua perguntas e respostas no banco de dados do jogo.
- Editar Perguntas: Modifique perguntas e respostas existentes.
- Listar Perguntas: Visualize todas as perguntas cadastradas.
- Excluir Perguntas: Remova perguntas que não são mais relevantes.
- Gerenciar Usuários: Adicione, edite e exclua usuários que acessam o sistema administrativo.
- Validação de Dados: Verifique a existência de dados como e-mails e nomes para evitar duplicações.

### Tecnologias Utilizadas
- PHP: Linguagem de programação utilizada para a lógica do servidor.
- MySQL: Banco de dados para armazenar as informações dos contatos.
- HTML/CSS: Usado para a estruturação e estilização das páginas.
- PDO (PHP Data Objects): Biblioteca utilizada para interagir com o banco de dados MySQL.

### Estrutura do Projeto
O projeto está organizado da seguinte maneira:
- `index.php:` Página inicial do sistema administrativo, que exibe a listagem de perguntas e usuários.
- `adicionar.php:` Formulário para adicionar novas perguntas ou usuários.
- `editar.php:` Formulário para editar informações de perguntas ou usuários existentes.
- `classes/:`Contém classes responsáveis pela interação com o banco de dados e a lógica de manipulação das perguntas e usuários.
- `conexao.class.php:` Classe para realizar a conexão com o banco de dados utilizando PDO.

### Como Executar
1. Clone o repositório:
```
git clone https://github.com/seu-usuario/seu-repositorio.git
```

2. Certifique-se de que você possui um servidor local (como XAMPP, WAMP, ou MAMP) rodando com suporte a PHP e MySQL.

3. Configure o banco de dados MySQL:
   - Crie um banco de dados para o projeto.
   - Importe o arquivo database.sql (caso exista) para criar as tabelas necessárias.

4. Altere as credenciais de conexão ao banco de dados no arquivo conexao.class.php, se necessário.

5. Acesse a aplicação através do navegador:
```
http://localhost/nome-do-projeto
```

### Próximos Passos
- Implementar funcionalidades adicionais para o gerenciamento de questões e usuários.
- Melhorar o layout da aplicação para uma melhor experiência do usuário.
- Adicionar autenticação e permissões para proteger o acesso às funcionalidades administrativas.
### Contribuições
Sinta-se à vontade para fazer um fork deste repositório e enviar pull requests com melhorias ou correções. Sugestões são bem-vindas!
