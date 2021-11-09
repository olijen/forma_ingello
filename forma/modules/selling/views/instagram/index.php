<?php

use yii\helpers\Html;

$this->title = 'Анализ instagram';
?>
    <div class="row">
        <div class="col-md-6">
            <form method="post">
                <textarea style="width: 100%; height: 90%;" name="accounts" ></textarea>

                <?= Html:: hiddenInput(
                    \Yii::$app->getRequest()->csrfParam,
                    \Yii :: $app->getRequest()->getCsrfToken(), []
                ); ?>

                <input class="btn btn-primary btn-block" type="submit" value="Сканировать"/>

            </form>
        </div>

        <div class="col-md-6">
            <?php
            $iframes = '';
            if (!empty($_POST['accounts'])) {
                $accounts = explode("\n", $_POST['accounts']);

                $count = 0;
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                foreach ($accounts as $account) {
                    $count ++;
                    if ($count <= ($page*10)) continue;
                    if ($count >= ($page*10) + 10) return;
                    $account = trim($account);
                    echo '<br>#'.$count. ' @' .$account;
                    $error = 'ERROR?';
                    try {
                        $config = array(
                            'http' => array(
                                //'proxy'           => 'tcp://51.158.169.52:80',
                                'request_fulluri' => true,
                                "header" => "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1\r\n"
                            ),
                        );
                        $config = stream_context_create($config);
                        //$html = file_get_contents("https://instagram.com/".$account, false. $config);
                        @$html = file_get_contents("https://www.instagram.com/".$account.'/?__a=1', false, $config);
                    } catch (Exception $e) {
                        $error = $e->getMessage();
                    }
                    //получить<header>
                    @preg_match("/<header .*<\/header>/", $html, $headerHtml);
                    ECHO $html;
                    if (!empty($headerHtml))
                        echo '<br><div style="height: 10%;"> -> '.$headerHtml[0].'</div>';
                    else
                        echo '<br>!!! '.$error;
                }
            } else {
                echo $iframes = '<br><-- Введите 1 или больше инстаграм аккаунтов с новой строки';
            }

            ?>
        </div>
    </div>


<?php

