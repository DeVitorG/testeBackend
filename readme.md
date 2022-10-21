# Configuração Teste Prático Desenvolvedor Back-end Jr. Grupo O Povo

 

## Configurações iniciais

1. Acesse o arquivo `application/config/database.php` , onde deverá ser configurado sua conexão com o banco de dados.

2. Crie o DATABASE com o nome testeBackEnd.`testeBackEnd.` .

3. Execute o seguinte comando `php index.php migrate`. Para que as tabelas sejam criadas para o teste.

# Dados a serem enviado.

### Cadastro Notícias
* id_noticia  `Obrigátorio`
* titulo_noticia  `Obrigátorio`
* des_noticia  `Opcional`
* dta_cadastro  `Obrigátorio`
* dta_upd_noticia  `Opcional`

# Controllers
## ApiNoticia
* Responsável pelos métodos de `crud` das notícia 

# Models And Tables
*  ApiNoticia_model `Noticia`  


# Rotas
* POST /ApiNoticia/criar/  `Rota de cadastro das noticias`

```
{
	"titulo": "Digite aqui o titulo da notícia",
	"noticia": "Digite aqui seu texto"
}

```
* PUT /ApiNoticia/editar/  `Rota de alteração das notícias. OBS: necessário informar o id`

```
{
	"titulo": "Campo escolhido para alterar o titulo",
	"noticia": "Campo escolhido para alterar a notícia",
	"cod": "id_noticia que deseja alterar"
}

```

* DELETE /ApiNoticia/deletar/  `Rota de delete das notícias. OBS: necessário informar o id`

```
{
	"cod": "id_noticia que deseja deletar"
}

```

* GET /ApiNoticia/listar/ `Retorna as noticias cadastradas,caso deseje filtrar pode utilizar os seguintes campos "id_noticia" ou "titulo" `

```

{
	"id_noticia": "Caso deseje filtrar com o id da noticia preencher este campo",
	"titulo": "Caso deseje filtrar com o titulo da noticia preencher este campo"
}

```
# Teste feito utilizando Codeigniter 3 e Mysql 








