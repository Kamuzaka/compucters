<?php
global $img;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация | НетПандемии</title>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
<body>
    <? include_once "includes/nav.php"; ?>

    <section class="mt-5">
        <div class="cotainer">
            <div class="row justify-content-center w-100">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Регистрация</div>
                        <div class="card-body">
                            <form action="/registration/" method="POST" class="was-validated">

                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">ФИО</label>
                                    <div class="col-md-6">
                                        <input placeholder="Иванов Иван Иванович" type="text" id="full_name" name="name"  class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                    <?php if (isset($data['errors']['name'])): ?>
                                    <div class="col-md-2">
                                        <span class="text-danger">
                                            <?= $data['errors']['name']; ?>
                                        </span>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Пол</label>
                                    <div class="col-md-3 mt-2 ml-5">
                                        <div class="custom-control custom-radio">
                                            <input value="1" type="radio" class="custom-control-input" id="customControlValidation2" name="sex" required>
                                            <label class="custom-control-label" for="customControlValidation2">Мужской</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt-2">
                                        <div class="custom-control custom-radio">
                                            <input value="0" type="radio" class="custom-control-input" id="customControlValidation3" name="sex" required>
                                            <label class="custom-control-label" for="customControlValidation3">Женский</label>
                                        </div>  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Номер телефона</label>
                                    <div class="col-md-6">
                                        <input placeholder="+7 (919) 479-99-66" name="phone" type="text" id="phone_number" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
	                                <?php if (isset($data['errors']['phone'])): ?>
                                        <div class="col-md-2">
                                        <span class="text-danger">
                                            <?= $data['errors']['phone']; ?>
                                        </span>
                                        </div>
	                                <?php endif;?>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                    <div class="col-md-6">
                                        <input placeholder="иванов@почта.рус" type="text" id="email_address" class="form-control is-invalid" name="email" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Повторите E-Mail</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control is-invalid" name="email_repeat" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                                    <div class="col-md-6">
                                        <input name="password" type="password" id="password" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Повторите пароль</label>
                                    <div class="col-md-6">
                                        <input name="password_repeat" type="password" id="password" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                    <div class="col-md-2">
                                        <span class="text-danger">
                                            <?= $data['errors']['password_repeat']; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="age" class="col-md-4 col-form-label text-md-right">Возраст</label>
                                    <div class="col-md-6">
                                        <input name="age" type="number" id="age" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Регион</label>
                                    <div class="col-md-6">
                                        <input placeholder="Россия, Ростовская обл., Ростов-на-Дону" name="region" type="text" class="form-control is-invalid" aria-describedby="validatedInputGroupPrepend">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right">Заболевания</label>
                                    <div class="col-md-6">
                                        <textarea name="info" class="form-control is-invalid" id="validationTextarea" placeholder="Сопутствующие заболевания"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Подписаться на рассылку</button>
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