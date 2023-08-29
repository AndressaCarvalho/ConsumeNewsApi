<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>News API</title>
    </head>
    <body>
        <?php
        $url = "https://newsapi.org/v2/everything?q=bitcoin&apiKey=97dff2d153a04d1d891038877d25ad50";

        $cUrl = curl_init($url);

        $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
        curl_setopt($cUrl, CURLOPT_USERAGENT, $config['useragent']);
        curl_setopt($cUrl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cUrl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($cUrl);

        if (curl_errno($cUrl)) {
            echo 'Erro! Mensagem: '.curl_error($cUrl);
        } else {
            $data = json_decode($response, true);

            foreach ($data["articles"] as $a => $article) {
                echo '<h3>'.$article['title'].'</h3>';
                echo '<h5>Autor(es): '.$article['author'].'</h5>';
                echo '<img src="'.$article['urlToImage'].'" width="250" height="200"/>';
                echo '<p>Publicado em '.$article['publishedAt'].'</p>';
                echo '<p>'.$article['description'].'</p>';
                echo '<a href="'.$article['url'].'">Leia mais</a>';
                echo '<hr>';
            }
        }
        ?>
    </body>
</html>
