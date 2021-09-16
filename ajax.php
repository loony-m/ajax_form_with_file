<? 
error_reporting(0);

if($_REQUEST['ajax'] == 'Y'){
    
    $requireField = [
        'surname' => 'Фамилия',
        'name' => 'Имя',
        'last_name' => 'Отчество',
        'city' => 'Город',
        'phone' => 'Телефон',
        'email' => 'E-mail',
    ];
    $arResult = [];
    $error = [];

    foreach ($requireField as $code => $name) {
        if(empty($_REQUEST[$code])){
            $error[] = 'После "'.$name.'" обазательно для заполнения';
        }
    }

    if(!empty($_FILES)){
        $uploaddir = __DIR__.'/upload/';
        $uploadfile = $uploaddir . $_FILES['file']['name'];

        if(strpos($_FILES['file']['name'], 'php') === false){
            if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                $error[] = "Не удалось загрузить файл, обратитесь к администратору";
            }
        }else{
            $error[] = "Не удалось загрузить файл, запрещенный формат файла";
        }
    }

    if(empty($error)){
        $to = 'romana@romana.ru'; 

        $subject = "Заявки с общей формы. Romana.ru"; 

        $message = '';
        $message .= 'Фамилия: '.$_REQUEST['surname'].'<br>';
        $message .= 'Имя: '.$_REQUEST['name'].'<br>';
        $message .= 'Отчество: '.$_REQUEST['last_name'].'<br>';
        $message .= 'Город: '.$_REQUEST['city'].'<br>';
        $message .= 'Телефон: '.$_REQUEST['phone'].'<br>';
        $message .= 'E-mail: '.$_REQUEST['email'].'<br>';
        $message .= 'Комментарий: '.$_REQUEST['comment'].'<br>';
        $message .= 'Путь до файла: '.$uploadfile.'<br>';

        $headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
        $headers .= "From: Письмо с сайта от <romana@romana.ru>\r\n";
        $headers .= "Reply-To: romana@romana.ru\r\n"; 

        if(mail($to, $subject, $message, $headers)){
            $arResult = ['success' => true, 'text' => 'Письмо успешно отправлено!'];
        }else{
            $arResult = ['success' => false, 'text' => 'Проблема с отправкой почты, обратитесь к администратору'];
        }
    }else{
        $arResult = ['success' => false, 'text' => $error];
    }

    echo json_encode($arResult);
}
?>