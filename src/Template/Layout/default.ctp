<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$active = ['yes','no'];
?>
<!DOCTYPE html>
<html>
<head>
<?=$this->element('head')?>
<?=$this->Html->css('base.css')?>
</head>
<body class="theme-red">
    <!-- Top Bar -->
    <?=$this->element('topBar')?>
     <section>
        <!-- Left Sidebar -->
        <?=$this->element('leftSideBar')?>
    </section>
    <section class="content">
     <?=$this->Flash->render()?>
        <div class="container-fluid">
        <?=$this->fetch('content')?>
        </div>
    </section>
    <footer>
    </footer>
    <?=$this->Html->script(['jquery.min', 'bootstrap', 'bootstrap-select', 'jquery.slimscroll', 'waves', 'admin', 'demo', 'autosize.js', 'moment.js']);?>

</body>
</html>
