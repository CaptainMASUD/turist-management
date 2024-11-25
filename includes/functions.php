<?php
function redirect($url) {
    header("Location: $url");
    exit();
}

function sanitize($input) {
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}
?>
