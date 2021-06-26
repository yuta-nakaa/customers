<?php

require_once __DIR__ . '/config.php';

function connectDb()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function getCustomersInfo()
{
    $dbh = connectDb();

    $sql = <<<EOM
    SELECT
        *
    FROM
        customers
    EOM;

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertValidate($company,$name,$email)
{
    $errors = [];

    if ($company  == '') {
        $errors[] = '会社名を入力してください';
    }
    if ($name  == '') {
        $errors[] = '氏名を入力してください';
}
    if ($email  == '') {
        $errors[] = 'メールアドレスを入力してください';
}
    return $errors;
}