<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-info,<?= h($class) ?>" onclick="this.classList.add('hidden');">
    <strong>Heads up!</strong> This <a href="javascript:void(0);" class="alert-link"><?= $message ?></a>
</div>
