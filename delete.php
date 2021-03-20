<?php

unlink("uploads/{$_GET["name"]}");
unlink("evaluation_forms/{$_GET["name"]}.html");

// Redirecting back
header("Location: " . $_SERVER["HTTP_REFERER"]);