<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);


echo "Hello World!<br><br>";
// Verbindung zur Datenbank herstellen
$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Benutzerdaten aus dem Formular abrufen
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Passwort hashen
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL-Abfrage zum Einfügen der Benutzerdaten in die Datenbank
$sql = "INSERT INTO users (user_name, user_password, user_email) VALUES ('$username', '$hashed_password', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "Registrierung erfolgreich!";
} else {
  echo "Fehler: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>