<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>Cadastro de Notícia</title>
	

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	h2{
		color: #444;
		background-color: transparent;
		border-top: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 14px 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	#button_noticia{
		margin-top: 25px;
		background-color: mediumaquamarine;
	}
	#body-input-desc{
		margin-top: 15px;
	}
	</style>
</head>
<body>
<div id="container">
	<h1>Cadastro de notícia</h1>
<div id="body">
	<div id="body-input-titulo">
		<label>Título da notícia:*</label>
		<input id="titulo_noticia" type="text" placeholder="Digite o título da notícia">
	</div>

	<div id="body-input-desc">
		<label >Descrição da notícia:*</label>
		<textarea rows="4" cols="50" id="descricao_noticia" placeholder="Digite a Descrição da Notícia"></textarea>
	</div>

	<div>
		<button id="button_noticia" onClick="criar()">Adicionar Notícia</button>
	</div>
	<h2>Notícias Cadastradas</h2>
	<table id="buscaTable">
            <thead>
                <tr>
					<th>Ações</th>
                    <th>id_noticia</th>
                    <th>Titulo noticia</th>
                    <th>Descrição da notícia</th>
                </tr>
            </thead>
            <tbody id="tbody-result">

            </tbody>
        </table>
</div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modal_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_editLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal_editLabel">Edita Notícia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
		<input type="hidden" value="" id="cod-noticia">
	  	<div class="form-group">
			<label for="titulo-noticia">Titulo da Notícia:</label>
			<input type="text" class="form-control" id="titulo-noticia" name="titulo-noticia">
		</div>
		<br>
		<div class="form-floating">
			<textarea rows="4" cols="50" class="form-control" id="desc-noticia" name="desc-noticia"></textarea>
			<label for="desc-noticia">Descrição da Notícia</label>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onClick="editar()">Alterar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="modal_view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_viewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal_viewLabel">Visualizar Notícia(<span id="cod-noticia-view"></span>)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
	  	<div class="form-group">
			<label for="titulo-noticia-view">Titulo da Notícia:</label>
			<span type="text" class="form-control" id="titulo-noticia-view" name="titulo-noticia-view"></span>
		</div>
		<br>
		<div>
			<label for="desc-noticia-view">Descrição da Notícia:</label>
			<br><br>
			<span class="form-control" id="desc-noticia-view" name="desc-noticia-view"></span>
		</div>
      </div>
    </div>
  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
	//As funções a seguir consomem a api criada na view apartir da rota.
	function criar(){
			$.ajax({
			type: "POST",
			url: "<?=base_url()?>/ApiNoticia/criar/",
			data: JSON.stringify({
				titulo: $('#titulo_noticia').val(),
				noticia: $('#descricao_noticia').val()
			}),
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				busca();

			}
		});
	}

	function busca(){
			$.ajax({
			type: "GET",
			url: "<?=base_url()?>/ApiNoticia/busca/",
			data: JSON.stringify({

			}),
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				let table = "";
				for (let i = 0; i < dados.data.length; i++) {
				table += "<tr>";
					table += "<td><a href='#' onclick='consultaId(" + dados.data[i].id_noticia + ")'>Editar</a> | <a href='#' onclick='deletar(" + dados.data[i].id_noticia + ")'>Deletar</a></td>";
					table += "<td align='center'><a href='#' onclick='visualizaId(" + dados.data[i].id_noticia + ")'>" + dados.data[i].id_noticia + "</a></td>";
					table += "<td>" + dados.data[i].titulo_noticia + "</td>";
					table += "<td>" + dados.data[i].des_noticia + "</td>";
				table += "</tr>";
				}
				$("#tbody-result").html(table);
			}
		});
	}

	busca()
	function deletar(dados){
		$.ajax({
			type: "DELETE",
			url: "<?=base_url()?>/ApiNoticia/deletar/",
			data: JSON.stringify({
				cod: dados,
			}),
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				busca();

			}
		});
	}

	function consultaId(id){
		$("#modal_edit").modal('show');

		$.ajax({
			type: "GET",
			url: "<?=base_url()?>/ApiNoticia/buscaCod/"+ id,
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				$('#cod-noticia').val(dados.data[0].id_noticia)
				$('#titulo-noticia').val(dados.data[0].titulo_noticia)
				$('#desc-noticia').val(dados.data[0].des_noticia)
			}
		
		});
	}

	function visualizaId(id){
		$("#modal_view").modal('show');

		$.ajax({
			type: "GET",
			url: "<?=base_url()?>/ApiNoticia/buscaCod/"+ id,
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				$('#cod-noticia-view').html(dados.data[0].id_noticia)
				$('#titulo-noticia-view').html(dados.data[0].titulo_noticia)
				$('#desc-noticia-view').html(dados.data[0].des_noticia)
			}
		});
	}

	function editar(){
			$.ajax({
			type: "PUT",
			url: "<?=base_url()?>/ApiNoticia/editar/"+ $('#cod-noticia').val(),
			data: JSON.stringify({
				titulo: $('#titulo-noticia').val(),
				noticia: $('#desc-noticia').val()
			}),
			dataType : "json",
			error: function(request, status, errorThrown){
			},
			success: function(dados){
				$("#modal_edit").modal('hide');

				busca();

			}
		});
	}
</script>
</html>
