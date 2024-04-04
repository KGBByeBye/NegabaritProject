<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['act']) && $_POST['act'] == 'order') {
    

    if(isset($_POST['name']) && isset($_POST['phone'])){
        //В переменную $token нужно вставить токен, который нам прислал @botFather
        $token = "7174010455:AAFKY6h5uKh-l902Xpy05uoMwXioQ3CADX8";

        //Сюда вставляем chat_id
        $chat_id = "-4181348320";


        $name = $_POST['name'];
        $phone = $_POST['phone'];


        $arr = array(
            'Имя:' => $name,
            'Телефон:' => $phone
        );


        $txt = "";
        foreach($arr as $key => $value) {
            $txt .= "<b>".$key."</b> ".$value."%0A";
        }

        //Передаем данные боту
        $sendToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}");
        

        if ($sendToTelegram) {

            header('Location: index.html');
            exit; 


            echo "<script>window.onload = function() {document.querySelector('.popup__box').style.display = 'block';}</script>";
        } else {
            echo "Ошибка при отправке данных в Telegram.";
        }
    } else {
        echo "Поля 'name' и 'phone' должны быть заполнены!";
    }
} else {
    echo "Неверный запрос.";
}
?>
