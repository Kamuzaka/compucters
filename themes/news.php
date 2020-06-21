<?php
global $img;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>#НЕТПАНДЕМИИ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<? include_once "includes/nav.php"; ?>
<section class="mt-5">
	<div class="container">
        <div class="row">
            <h1>#НЕТПАНДЕМИИ</h1>
        </div>
        <br>
		<div class="row">
			<div class="col">
				<div class="card" style="width: 18rem;">
					<img src="<?= $img ?>news1.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Первые заболевшие...</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde obcaecati facere quas corporis vitae et!</p>
						<a href="#" class="btn btn-primary">Читать</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="width: 18rem;">
					<img src="<?= $img ?>news2.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Болезнь распространяется</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde obcaecati facere quas corporis vitae et!</p>
						<a href="#" class="btn btn-primary">Читать</a>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card" style="width: 18rem;">
					<img src="<?= $img ?>news4.jpg" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Госпитализация</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde obcaecati facere quas corporis vitae et!</p>
						<a href="#" class="btn btn-primary">Читать</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</body>
</html>