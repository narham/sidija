<!doctype html>
<html lang="en">

<head>
    <title>Login SIDIJA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('public'); ?>/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(<?= base_url("public"); ?>/images/background.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <b>
                        <h1 class="heading-section text text-warning">E-LOG BOOK DINAS JAGA TARUNA <br>POLITEKNIK
                            PENERBANGAN
                            MAKASSAR
                        </h1>
                    </b>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Silahkan Login</h3>
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url(); ?>/auth/login">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required id="username"
                                    name="username">
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password"
                                    required id="password" name="password">
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Masuk</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('public'); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('public'); ?>/js/popper.js"></script>
    <script src="<?= base_url('public'); ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('public'); ?>/js/main.js"></script>

</body>

</html>