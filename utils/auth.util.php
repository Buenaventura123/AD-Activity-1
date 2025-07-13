<?php
declare(strict_types=1);

class Auth
{
    public static function init(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login(string $email, string $password): bool
    {
        self::init();
        require_once UTILS_PATH . '/dbConnection.util.php';
        $pdo = getDatabaseConnection();

        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function signup(string $name, string $email, string $password): bool
    {
        self::init();
        require_once UTILS_PATH . '/dbConnection.util.php';
        $pdo = getDatabaseConnection();

        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO users (username, password, first_name, middle_name, last_name) 
            VALUES (:username, :password, :fn, NULL, :ln)');

        // Since your signup form only has "name" and "email", use name for first_name & last_name for now
        return $stmt->execute([
            'username' => $email,
            'password' => $hash,
            'fn' => $name,
            'ln' => $name
        ]);
    }

    public static function logout(): void
    {
        self::init();
        session_destroy();
    }

    public static function user(): ?array
    {
        self::init();
        return $_SESSION['user'] ?? null;
    }
}
