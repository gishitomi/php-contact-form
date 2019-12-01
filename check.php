<?
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header('Location: index.php');
}

// ニックネーム
$nickname = $_POST['nickname'];
// メールアドレス
$email = $_POST['email'];
// お問い合わせ
$content = $_POST['content'];


// 入力内容のチェック
if ($nickname == '' || $email == '' || $content == '') {
    $message = '入力内容に不備があります。';
} else {
    $message = '入力内容をご確認ください';
}
if ($nickname == '') {
    $nickname_result = 'ニックネームが入力されていません。';
} else {
    $nickname_result = $nickname . '様';
}

if ($email == '') {
    $email_result = 'メールアドレスが入力されていません。';
} else {
    $email_result = $email;
}

if ($content == '') {
    $content_result =  'お問い合わせ内容が入力されていません。';
} else {
    $content_result = $content;
}
require_once('function.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/check.css">
</head>

<body>
    <div class="container-wrapper">
        <div class="container-wrap">
            <div class="container">
                <h1>Confarm</h1>
                <div class="message">
                    <p><?php echo h($message); ?></p>
                </div>
                <main>
                    <div class="left-box">
                        <div class="name">
                            お名前　:　　　　　<p><?php echo h($nickname_result); ?></p>
                        </div>
                        <div class="email">
                            メールアドレス :　　<p><?php echo h($email_result); ?></p>


                        </div>
                    </div>
                    <div class="right-box">
                        <div>
                            メッセージ ▼<p><?php echo h($content_result); ?></p>


                        </div>
                    </div>
                </main>
                <!-- submitと書いてあるところにactionのファイルに飛ぶ -->
                <form method="POST" action="thanks.php">
                    <input type="hidden" name="nickname" value="<?= h($nickname) ?>">
                    <input type="hidden" name="email" value="<?= h($email) ?>">
                    <input type="hidden" name="content" value="<?= h($content) ?>">
                    <button type="button" class="btn-square-shadow" onclick="history.back()">戻る</button>
                    <?php if ($nickname != '' && $email != '' && $content != '') : ?>
                        <button type="submit" class="btn-square-shadow">OK</button>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>