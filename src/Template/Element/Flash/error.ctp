<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
    <strong>Oh snap!</strong> <a href="javascript:void(0);" class="alert-link"><?= $message ?></a> and try again.
</div>
