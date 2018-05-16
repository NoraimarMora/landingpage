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

		<script type="text/javascript">
			$(document).ready(function() {
				$('#guardar').on('click', function() {

					var name = document.getElementById('banner').files[0].name;

					$.ajax({
	                    url: '{$input.url_add}',
	                    type: 'POST',
	                    {literal}
	                    data: {"img": name},
	                    {/literal}
	                    success: function(data) {
	                    	console.log(data);
	                    },
	                    error: function() {
	                    	console.log('Ha ocurrido un error');
	                    }
	                });
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