<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$customers_info = getCustomersInfo();
?>
<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.html' ?>

<body>
    <div class="wrapper">
        <h1 class="title"><a href="index.php">顧客管理アプリ</a></h1>
        <div class="customer-area">
            <h2 class="sub-title">顧客リスト</h2>
            <table class="customer-list">
                <thead>
                    <tr>
                        <th class="customer-company">会社名</th>
                        <th class="customer-name">氏名</th>
                        <th class="customer-email">メールアドレス</th>
                        <th class="edit-link-area"></th>
                        <th class="delete-link-area"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers_info as $info) : ?>
                        <tr>
                            <td><?= h($info['company']) ?></td>
                            <td><?= h($info['name']) ?></td>
                            <td><?= h($info['email']) ?></td>
                            <td><a href="edit.php?id=<?= h($info['id']) ?>" class="btn edit-btn">編集</a></td>
                            <td><a href="delete.php?id=<?= h($info['id']) ?>" class="btn delete-btn">削除</a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="new.php" class="btn new-btn">新規登録</a>
        </div>
    </div>
</body>