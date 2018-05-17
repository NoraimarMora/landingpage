{extends file="helpers/form/form.tpl"}

{block name="field"}
	{if $input.type == 'banner'}
  	{else}
    	{$smarty.block.parent}
  	{/if}
{/block}