# Configuração Teste Prático Desenvolvedor Back-end Jr. Grupo O Povo

 

## Configurações iniciais

Acesse o arquivo `application/config/database.php` , onde deverá ser configurado sua conexão com o banco de dados.

Crie o DATABASE com o nome testeBackEnd.`testeBackEnd.` .

Execute o seguinte comando `php index.php migrate`. Para que as tabelas sejam criadas para o teste.

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
* PUT /ApiNoticia/editar/  `Rota de alteração das notícias. OBS: necessário informar o id`
* DELETE /ApiNoticia/deletar/  `Rota de delete das notícias. OBS: necessário informar o id`
* GET /ApiNoticia/listar/ `Retorna as noticias completas, ou caso utilize o campo query, pode filtrar por "id_noticia" e "titulo" `

# Teste feito utilizando Codeigniter 3 e Mysql 








