# Controle de Usuários - Projeto Fullstack

Este projeto foi desenvolvido para testar conhecimentos de **backend**, **frontend**, **API**, **segurança**, **testes automatizados** e **Docker**. Ele envolve a criação de um sistema completo de controle de usuários com funcionalidades de autenticação via JWT, operações CRUD (criar, ler, atualizar, excluir) de usuários e segurança de dados.

## Tecnologias Utilizadas

### Backend
- **CakePHP 4** - Framework PHP para o backend
- **JWT (JSON Web Token)** - Autenticação e segurança da API
- **PHPUnit** - Testes unitários para garantir o funcionamento adequado da API
- **PostgreSQL** - Banco de dados utilizado
- **Docker** - Contêineres para desenvolvimento e execução do projeto

### Frontend
- **React** - Biblioteca JavaScript para a criação da interface de usuário
- **TailwindCSS** - Framework CSS para o design responsivo e moderno
- **Axios** - Biblioteca para requisições HTTP
- **SweetAlert2** - Biblioteca para alertas bonitos e customizáveis
- **FontAwesome** - Ícones de interface para React

### Testes
- **PHPUnit** - Testes unitários no backend
- **Robot Framework** - Testes automatizados da API
- **Xdebug** - Debugging e cobertura de código para os testes

## Funcionalidades

- **Cadastro de Usuários**: Criação, edição e exclusão de usuários.
- **Autenticação por JWT**: A API utiliza tokens JWT para autenticar e autorizar acessos.
- **Segurança**: Validação de tokens JWT em todas as requisições.
- **Busca e Filtros**: Funcionalidade de busca por nome de usuário e filtros por coluna.
- **Testes Unitários**: Garantia de que todas as partes da aplicação funcionam corretamente.
- **Testes Automatizados**: Testes completos da API com Robot Framework.

## Imagens de Tela

### 1. Login

![Login](https://i.imgur.com/H4ddNoH.png)

### 2. Erro de Login

![Erro de Login](https://i.imgur.com/PZe2zcv.png)

### 3. Index de Usuários

![Index de Usuários](https://i.imgur.com/Eumf8cu.png)

### 4. Busca por Páginas

![Busca por Páginas](https://i.imgur.com/2UpnrrR.png)

### 5. Adicionar Usuário

![Adicionar Usuário](https://i.imgur.com/3l5YCb3.png)

### 6. Editar Usuário

![Editar Usuário](https://i.imgur.com/1EZ4lrH.png)

### 7. Excluir Usuário

![Excluir Usuário](https://i.imgur.com/uijYxOO.png)

### 8. Página Não Identificada

![Página Não Identificada](https://i.imgur.com/29trh9G.png)

### 9. Autenticação por Token JWT

![Autenticação por Token JWT](https://i.imgur.com/J6Y5RUX.png)

### 10. Sem Token (Acesso Negado)

![Sem Token](https://i.imgur.com/j7M2MTe.png)

### 11. Teste de API

![Teste de API](https://i.imgur.com/gawyNPh.png)

### 12. Teste Unitário

![Teste Unitário](https://i.imgur.com/AVhgT4r.png)

### 13. Relatório do Teste Unitário no Xdebug

![Relatório do Teste Unitário no Xdebug](https://i.imgur.com/ehhg6wP.png)

### 14. Teste Robot Framework

![Teste Robot Framework](https://i.imgur.com/ubqVjLq.png)

## Como Rodar o Projeto

### Backend
1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/controle-de-usuarios.git
   cd controle-de-usuarios/backend
