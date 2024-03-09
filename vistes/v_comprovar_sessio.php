<?php
if (isset($_SESSION['user_data'])) {
    echo 'active';
} else {
    echo 'inactive';
}
?>