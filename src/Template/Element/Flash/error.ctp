<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger" onclick="this.classList.add('hidden');">
    <a href="javascript:void(0);" class="alert-link">
        <div class="icon">
            <i class="material-icons col-white">cancel</i>
            <?= $message ?>
        </div>

    </a>
</div>
