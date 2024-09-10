<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (session_unset()) {
    echo "unset session";
} else {
    echo "not unset session";
}
