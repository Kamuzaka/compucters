<?php
global $img;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Панель администратора | НетПандемии</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    
	<? include_once "includes/nav.php"; ?>

	<section class="mt-5">
        <div class="cotainer">
            <div class="row justify-content-center w-100">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Рассылка</div>
                        <div class="card-body">
                            <?php if (isset($data['error'])) :?>
                            <div class="alert alert-danger" role="alert">
                                <?= $data['error'];?>
                            </div>
                            <?php elseif (isset($data['success'])): ?>
                                <div class="alert alert-success" role="alert">
	                                <?= $data['success'];?>
                                </div>
                            <?php endif;?>
                            <form action="/admin/send" method="POST" class="was-validated">

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Тема</label>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Тема письма" id="email_address" class="form-control is-invalid" name="subject" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Текст письма</label>
                                    <div class="col-md-6">
                                        <textarea name='text' rows="10" class="form-control is-invalid" id="validationTextarea" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
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