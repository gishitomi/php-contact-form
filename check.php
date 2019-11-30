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
if ($nickname == '') {
    $nickname_result = 'ニックネームが入力されていません。';
} else {
    $nickname_result = 'ようこそ、' . $nickname . '様';
}

if ($email == '') {
    $email_result = 'メールアドレスが入力されていません。';
} else {
    $email_result = 'メールアドレス：' . $email;
}

if ($content == '') {
    $content_result =  'お問い合わせ内容が入力されていません。';
} else {
    $content_result = 'お問い合わせ内容：' . $content;
}
require_once('function.php');
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <title>入力内容確認</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/check.css">
</head>

<body>
    <div class="container-wrapper">
        <div class="container-wrap">
            <div class="container">
                <h1>Confirm</h1>
                <!-- html上でphpの処理ができる -->

                <!-- htmlspecialchars()で<>や&をただの文字として見なすことができる -->
                <div class="message">
                    <p><?php echo h($nickname_result); ?></p>
                    <p><?php echo h($email_result); ?></p>
                    <p><?php echo h($content_result); ?></p>
                </div>
                <!-- formのactionは飛ぶ先のファイル名を記入
        formのmethodは呼び出すコマンドを記入 -->
                <form method="POST" action="thanks.php">
                    <!-- index.phpで入力した値はinputタグのみしか引き出せないので、新たにformのなかにinputを追加する -->
                    <!-- ?php echoを?= だけで書くことができる-->
                    <!-- type="hidden"にすると、表示されないが、データは保存される -->
                    <input type="hidden" name="nickname" value="<?= h($nickname) ?>">
                    <input type="hidden" name="email" value="<?= h($email) ?>">
                    <input type="hidden" name="content" value="<?= h($content) ?>">
                    <button type="button" class="btn-square-shadow " onclick="history.back()">Back</button>
                    <?php if ($nickname != '' && $email != '' && $content != '') : ?>
                        <button type="submit" class="btn-square-shadow ">OK</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>