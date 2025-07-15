# 📦 Bico API

Projeto Bico.

---

## 📑 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Tecnologias](#tecnologias)
- [Pré-requisitos](#pré-requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Execução](#execução)
- [Rotas Disponíveis](#rotas-disponíveis)
- [Testes](#testes)
- [Contribuição](#contribuição)
- [Licença](#licença)

---

## 📖 Sobre o Projeto



---

## 🛠️ Tecnologias

- PHP >= 8.2
- Laravel 12
- Vue 3
- Intertia
- Composer
- MySQL

---

## 📋 Pré-requisitos

Antes de começar, você precisará ter instalado em sua máquina:

- [PHP >= 8.2](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- Banco de dados (MySQL)

---

## 🚀 Instalação

Clone o projeto e acesse a pasta:

```bash
git clone https://github.com/conspereiradev/bico.git
cd bico
```

Instale as dependências do projeto:
```bash
composer install
```

Copie o arquivo de variáveis de ambiente:
```bash
cp .env .env.local
```

Edite o arquivo .env.local com suas configurações de banco de dados e ambiente.

---

## ⚙️ Configuração
Execute as migrations:

```bash
php php artisan migrate
```

---

## ▶️ Execução
Para rodar a aplicação localmente:

```bash
php artisan start
```

```bash
composer run dev
```

---

## 🤝 Contribuição
Contribuições são bem-vindas!
Para contribuir, siga as etapas:

* Faça um fork do projeto.

* Crie uma branch: git checkout -b feature/sua-feature.

* Faça suas alterações e commit: git commit -m 'feat: adiciona nova feature'.

* Faça o push para a sua branch: git push origin feature/sua-feature.

* Abra um Pull Request.

---

## 📄 Licença
Este projeto está sob a licença MIT.

---

Desenvolvido por Amanda Pereira