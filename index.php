<?php
if ($_POST["username"]){
    $username = $_GET["username"];
    $json = file_get_contents("https://instagram.com/$username/?__a=1");
    $data = json_decode($json, true);
    if ($_POST["quality"] == 150){
        $pp = $data["graphql"]["user"]["profile_pic_url"];
    }elseif($_POST["quality"] == 320){
        $pp = $data["graphql"]["user"]["profile_pic_url_hd"];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instagram Profil Fotoğrafı Görüntüleme</title>
</head>
<body style="text-align: center;">
<?php if(isset($pp)) {
    echo '<img src="'.$pp.'" width="150">';
}?>
<form method="post">
    <div>
     <label> Kullanıcı adı: </label>
    <input name="username" value="" placeholder="Kullanıcı adı">
    </div>
    <div>
        <label>Çözünürlük: &nbsp;</label>
    <select name="quality">
        <option value="150">150x150px</option>
        <option value="320">320x320px</option>
    </select>
    </div>
    <button type="submit">Gönder</button>
</form>
</body>
</html>
