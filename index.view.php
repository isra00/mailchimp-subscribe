<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Añadir suscriptores</title>

	<link rel="stylesheet" href="static/normalize.css" />
	<link rel="stylesheet" href="static/foundation.min.css" />
</head>
<body>

	<section class="main">

		<div class="row">
			<div class="large-12 columns"><h1 class="subheader">Añadir suscriptores</h1></div>
		</div>

		<div class="row">
			<div class="large-12 columns">
			<?php foreach ($notifications as $notification) : ?>
				<div class="alert-box <?php echo $notification['type'] ?>">
					<?php echo $notification['message'] ?>
				</div>
			<?php endforeach ?>
			</div>
		</div>

		<form method="post" action="index.php">
			<div class="row">
				<div class="large-12 columns">
					<label class="<?php validation_error('lista') ?>" for="lista">Lista <strong>*</strong></label>
					<select name="lista" id="lista">
					<?php foreach ($lists as $list) : ?>
						<option value="<?php echo $list['id'] ?>" <?php if (post('lista', true) == $list['id']) echo 'selected="selected"' ?>><?php echo $list['name'] ?></option>
					<?php endforeach ?>
					</select>
					<?php if (!is_valid('lista')) : ?><small class="error"><?php echo $validation['lista'] ?></small><?php endif ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label class="<?php validation_error('email') ?>" for="email">E-mail <strong>*</strong></label>
					<input class="<?php validation_error('email') ?>" name="email" id="email" type="text" value="<?php post('email') ?>">
					<?php if (!is_valid('email')) : ?><small class="error"><?php echo $validation['email'] ?></small><?php endif ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label class="<?php validation_error('nombre') ?>" for="nombre">Nombre</label>
					<input class="<?php validation_error('nombre') ?>" name="nombre" id="nombre" type="text" value="<?php post('nombre') ?>">
					<?php if (!is_valid('nombre')) : ?><small class="error"><?php echo $validation['nombre'] ?></small><?php endif ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<label class="<?php validation_error('medio') ?>" for="medio">Medio</label>
					<input class="<?php validation_error('medio') ?>" name="medio" id="medio" type="text" value="<?php post('medio') ?>">
					<?php if (!is_valid('medio')) : ?><small class="error"><?php echo $validation['medio'] ?></small><?php endif ?>
				</div>
			</div>
			<div class="row">
				<div class="large-12 columns">
					<button type="submit" name="sent">Añadir</button>
				</div>
			</div>
		</form>
	</section>
</body>
</html>