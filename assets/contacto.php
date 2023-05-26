<?php                                       

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);

    if (isset($_POST["enviar"])) { 
        $nombre = $_POST["user"];
        $asunto = $_POST["subject"];
        $email = $_POST["email"];
        $mensaje = $_POST["message"];

        

        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'yuiko1590wey@gmail.com';
            $mail->Password   = 'reynaldo123456CC';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('yuiko1590wey@gmail.com', 'Reynaldo Cahuana');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Correo electronico';
            $mail->Body    = $body;
            $mail->Charset = 'UTF-8';
            $mail->send();
            // echo "Correo enviado!";
            header ("location:revisaTuCorreo.php");
        } catch (Exception $e) {
            echo $e;
        }
    }
?>

    <div class="container__form">
        <form class="form">
            <label class="form__label">Nombre</label>
            <input class="form__input" type="text" name="user" placeholder="Nombre">
            
            <label class="form__label">Asunto</label>
            <input class="form__input" type="text" name="subject" placeholder="Asunto">
            
            <label class="form__label">E-mail</label>
            <input class="form__input" type="email" name="email" placeholder="E-mail">  
            
            <label class="form__label">Mensaje</label>
            <textarea class="form__textarea" rows="5" id="comment" name="message"></textarea>
           
            <button type="submit" class="btn-submit" name="enviar">Enviar</button>
        </form>
    </div>