<?php
global $img;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Авторизация | НетПандемии</title>
	<!-- Required meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<? include_once "includes/nav.php"; ?>
	<br><br><br>
	<section class="mt-5">
        <div class="cotainer">
        <div class="row justify-content-center w-100">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Авторизация</div>
                    <div class="card-body">
                        <?php if(isset($data['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                Неверные данные
                            </div>
                        <?php endif;?>
                        <form action="/auth/login" method="POST" class="was-validated">

                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Логин</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control is-invalid" name="login" aria-describedby="validatedInputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                <div class="col-md-6">
                                    <input name="password" type="password" id="password" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</section>
</body>
</html>