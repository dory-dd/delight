<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['edit'] == "yes") {
 file_put_contents($PATH."makedeny_host.cgi", $_POST['host']);
 file_put_contents($PATH."makedeny_ip.cgi", $_POST['ip']);
 file_put_contents($PATH."makedeny_ua.cgi", $_POST['ua']);
 file_put_contents($PATH."makedeny_account.cgi", $_POST['account']);
 file_put_contents($PATH."makedeny_area.cgi", $_POST['area']);
}
$host = implode('', file($PATH."makedeny_host.cgi"));
$ip = implode('', file($PATH."makedeny_ip.cgi"));
$ua = implode('', file($PATH."makedeny_ua.cgi"));
$account = implode('', file($PATH."makedeny_account.cgi"));
$area = implode('', file($PATH."makedeny_area.cgi"));
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content>
<meta name="author" content>
<title>スレッド作成規制</title>
<link rel="stylesheet" href="/static/a.css">
</head>
<body>
<div class="main">
<form method="post" action="?bbs=<?=$_REQUEST['bbs']?>&mode=kisei3">
<input type="hidden" name="password" value="<?=$_REQUEST['password']?>">
<input type="hidden" name="edit" value="yes">
<div class="back"><a href="./admin.php">← 管理ページへ戻る</a></div>
<h3>スレッド作成規制</h3>
<div><b>リモートホスト</b></div>
<div class="notice mt5">
・&lt;&gt;が区切り文字、<b>規制対象(リモートホスト)</b>&lt;&gt;<b>発動タイトル(省略可)</b>&lt;&gt;<b>発動ワード(省略可)</b>の形で記入してください。<br>
・<b>発動タイトル</b>に記入されている場合はそのワードをタイトルに含むスレッド作成のみ規制。<br>
・<b>発動ワード</b>に記入されている場合はそのワードを含んだ場合のみ規制。特定範囲のみ適用されるNGワードとお考えください<br>
・1行につき1つの規制です。<br>
・行頭に半角の『#』を含んでいる行はコメント行として扱われます。<br>
・正規表現です。特殊な文字にご注意ください。<br>
</div>
<div><textarea style="font-size:9pt" rows="10" cols="70" name="host" wrap="OFF"><?=$host?></textarea></div>
<div><b>IPアドレス</b></div>
<div class="notice mt5">
・&lt;&gt;が区切り文字、<b>規制対象(リモートホスト)</b>&lt;&gt;<b>発動タイトル(省略可)</b>&lt;&gt;<b>発動ワード(省略可)</b>の形で記入してください。<br>
・<b>発動タイトル</b>に記入されている場合はそのワードをタイトルに含むスレッド作成のみ規制。<br>
・<b>発動ワード</b>に記入されている場合はそのワードを含んだ場合のみ規制。特定範囲のみ適用されるNGワードとお考えください<br>
・1行につき1つの規制です。<br>
・行頭に半角の『#』を含んでいる行はコメント行として扱われます。<br>
・正規表現です。特殊な文字にご注意ください。<br>
</div>
<div><textarea style="font-size:9pt" rows="10" cols="70" name="ip" wrap="OFF"><?=$ip?></textarea></div>
<div><b>User-Agent</b></div>
<div class="notice mt5">
・&lt;&gt;が区切り文字、<b>規制対象(User-Agent)</b>&lt;&gt;<b>発動タイトル(省略可)</b>&lt;&gt;<b>発動ワード(省略可)</b>の形で記入してください。<br>
・<b>発動タイトル</b>に記入されている場合はそのワードをタイトルに含むスレッド作成のみ規制。<br>
・<b>発動ワード</b>に記入されている場合はそのワードを含んだ場合のみ規制。特定範囲のみ適用されるNGワードとお考えください<br>
・1行につき1つの規制です。<br>
・行頭に半角の『#』を含んでいる行はコメント行として扱われます。<br>
・正規表現です。特殊な文字にご注意ください。<br>
</div>
<div><textarea style="font-size:9pt" rows="10" cols="70" name="ua" wrap="OFF"><?=$ua?></textarea></div>
<div><b>ClientID</b></div>
<div class="notice mt5">
・&lt;&gt;が区切り文字、<b>規制対象</b>&lt;&gt;<b>発動タイトル(省略可)</b>&lt;&gt;<b>発動ワード(省略可)</b>の形で記入してください。<br>
・<b>発動タイトル</b>に記入されている場合はそのワードをタイトルに含むスレッド作成のみ規制。<br>
・<b>発動ワード</b>に記入されている場合はそのワードを含んだ場合のみ規制。特定範囲のみ適用されるNGワードとお考えください<br>
・1行につき1つの規制です。<br>
・行頭に半角の『#』を含んでいる行はコメント行として扱われます。<br>
・正規表現です。特殊な文字にご注意ください。<br>
</div>
<div><textarea style="font-size:9pt" rows="10" cols="70" name="account" wrap="OFF"><?=$account?></textarea></div>
<div><b>国・地域</b></div>
<div class="notice mt5">
・国・地域による投稿規制は基本設定の<b>Geolocation API</b>を<b>使用する</b>にしている場合のみ使用可能<br>
・&lt;&gt;が区切り文字、<b>規制対象(国コード・県名・市名)</b>&lt;&gt;<b>発動タイトル(省略可)</b>&lt;&gt;<b>発動ワード(省略可)</b>の形で記入してください。<br>
・<b>発動タイトル</b>に記入されている場合はそのワードをタイトルに含むスレッド作成のみ規制。<br>
・<b>発動ワード</b>に記入されている場合はそのワードを含んだ場合のみ規制。特定範囲のみ適用されるNGワードとお考えください<br>
・1行につき1つの規制です。<br>
・行頭に半角の『#』を含んでいる行はコメント行として扱われます。<br>
・正規表現です。特殊な文字にご注意ください。<br>
</div>
<div><textarea style="font-size:9pt" rows="10" cols="70" name="area" wrap="OFF"><?=$area?></textarea></div>
<hr><div class="contents"><input type="submit" name="Submit" class="btn btn-primary btn-block" value="適用"></div>
</form>
</div>
</body>
</html>
<?php exit;