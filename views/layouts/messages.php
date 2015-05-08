<?php
if (isset($_SESSION['messages'])) {
    echo '<div class="inner">';
    foreach ($_SESSION['messages'] as $msg) {
        if ($msg['type'] === 'success') {
            echo '<div class="alert alert-success"><strong><span class="glyphicon glyphicon-ok"></span>' .
                htmlspecialchars($msg['text']) . '</strong></div>';
        } else {
            echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span><strong>' .
                htmlspecialchars($msg['text']) . '</strong></div>';
        }
    }
    echo '</div>';
    unset($_SESSION['messages']);
}
