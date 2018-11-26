<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= 'estate' ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <?= $this->Html->css('bootstrap.css') ?>

    <!-- Waves Effect Css -->
    <?= $this->Html->css('wave.css') ?>

    <?= $this->Html->css('animate.css') ?>
    <!-- Animation Css -->


    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="login-page">
<div class="login-box">


    <div class="card">
        <div class="body">
            <?php echo $this->Form->create('users', array(
                'inputDefaults' => array(
                    'div' => 'form-group',
                    'label' => false,
                    'wrapInput' => false,
                    'class' => 'form-control'
                ),

            )); ?>
            <div class="logo align-justify">
                <div class="form-line">
                      <img align="center" src="webroot\img\logo.png" style="margin-left: 26%;" height="100px" width="auto" alt="User"/>
                </div>

            </div>
            <div class="msg">Sign in to start your session</div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                <div class="form-line">

                    <input type="text" class="form-control" name="contact" placeholder="Username" required
                           autofocus>
                </div>

            </div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                <div class="form-line">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 p-t-5">
                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-xs-4">
                    <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                </div>
            </div>
            <div class="row m-t-15 m-b--20">

                <div class="col-xs-6 align-right">
                    <a href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script(['jquery.min', 'bootstrap', 'bootstrap-select', 'jquery.slimscroll', 'waves', 'admin', 'demo', 'autosize.js', 'moment.js', 'bootstrap-material-datetimepicker.js', 'basic-form-elements.js', 'sign-in.js']); ?>

</body>

</html>
