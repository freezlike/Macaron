<div id="notif" class="alert alert-<?php echo (isset($type) && $type === 'error') ? 'danger' : 'info'; ?>"
     onclick="$(this).slideUp();"
     >
    <button class="close"></button>
    <span>
        <?php echo $message; ?>
    </span>
</div>