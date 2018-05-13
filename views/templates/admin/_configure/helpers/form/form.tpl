{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'banner'}
		hola
  		<a class="btn btn-info btn-lg" data-toggle="modal" data-target="#formModal"> {l s='Agregar imagen' mod='landingpage'} </a> 

  		<div class="modal fade" id="formModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h2 class="modal-title">{l s='Agregar imagen'}</h2>
				    </div>
				    <div class="modal-body">
				    	<input type="file" name="banner">
				    </div>
				    <div class="modal-footer">
				    	<button id="save">Guardar</button>
				    </div>
				</div>  
			</div>
		</div>
  	{else}
    	{$smarty.block.parent}
  	{/if}
{/block}