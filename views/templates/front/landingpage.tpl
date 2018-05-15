<!DOCTYPE html>
<html lang="{$language_code|escape:'html':'UTF-8'}">
<head>
	<meta charset="utf-8">
	<title>{$meta_title|escape:'html':'UTF-8'}</title>
{if isset($meta_description)}
	<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}">
{/if}
{if isset($meta_keywords)}
	<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}">
{/if}
	<meta name="robots" content="{if isset($nobots)}no{/if}index,follow">
	<link rel="shortcut icon" href="{$favicon_url}">
       	<link href="{$module_dir}landingpage/css/landing.css" rel="stylesheet">
       	<link href='//fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
		<div class="sidebar">
			<div class="logo">
				<img src="../img/logo.png">
			</div>
			<div class="sidebar-wrapper">
				<form>
					<h2 style="color: white;text-align: center;padding-top: 40px;padding-bottom: 15px;">CONTACTANOS</h2>
					<input type="text" class="form-group" name="nombre" placeholder="Nombre">
					<input type="text" class="form-group" name="telefono" placeholder="Telefono">
					<input type="text" class="form-group" name="correo" placeholder="Correo">
					<button>Enviar</button>
				</form>
				<div style="margin-top: 20px;text-align: center;">
					<a href="https://www.facebook.com/AlmacenesEZANic/" style="color: #FFFFFF;">Visita nuestra pagina de Facebook</a>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<img src="../img/EZA-02.png">
		</div>		
	</div>
</body>
</html>
