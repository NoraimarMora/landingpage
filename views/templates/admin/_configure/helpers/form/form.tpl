{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'banner'}
		<style type="text/css">
			#banner {
				padding-top: 15px;
				padding-bottom: 15px;
			}
		</style>

  		<a class="btn btn-info btn-lg" data-toggle="modal" data-target="#formModal"> <i class="icon-plus"></i> {l s='Agregar imagen' mod='landingpage'} </a> 

  		<div class="modal fade" id="formModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h2 class="modal-title">{l s='Agregar imagen' mod='landingpage'}</h2>
				    </div>
				    <div class="modal-body">
				    	<input type="file" name="banner" id="banner">
				    </div>
				    <div class="modal-footer">
				    	<a class="btn btn-info btn-lg" id="guardar"> <i class="icon-save"></i> {l s='Guardar' mod='landingpage'} </a> 
				    </div>
				</div>  
			</div>
		</div>

		<ul id="items" class="list-unstyled">
			{foreach from=$banners item=banner}
				<li id="{$banner.id_banner|escape:'htmlall':'UTF-8'}" class="item">
					<img src="{$banner.url_banner}" width="383" height="267">
					<a class="btn btn-info pull-right" onclick="delete({$banner.id_banner})"> <i class="icon-eraser"></i> {l s='Eliminar' mod='landingpage'}</a>
				</li>
			{/foreach}
		</ul>

		<script type="text/javascript">
			$(document).ready(function() {
				$('#guardar').on('click', function() {
					alert('Imagen guardada');
					/*$.ajax({
                        url: '{$url}',
                        type: 'POST',
                        {literal}
                        data: {'url_banner': url_banner},
                        {/literal}
                        success: function(data){
                            alert('Imagen agregada');
                            location.reload();
                        },
                        error: function() {
                            alert('Ha ocurrido un error al intentar agregar la imagen');
                        }
                    });*/
				});
			});

			/*function delete(id_banner)
			{
				Implementar AJAX
			}*/
		</script>
  	{else}
    	{$smarty.block.parent}
  	{/if}
{/block}