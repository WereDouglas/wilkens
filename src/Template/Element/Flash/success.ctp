<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="alert alert-success" onclick="this.classList.add('hidden')">
    <strong>Done</strong> <a href="javascript:void(0);" class="alert-link"><?= $message ?></a>.
</div>
