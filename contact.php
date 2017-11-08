<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
//require $_SERVER['DOCUMENT_ROOT'] . '/includes/details.php';
function sanitize($data)
{
    if (is_array($data))
    {
        foreach ($data as &$value)
            $value = sanitize($value);
        unset($value);
    }
    else
        $data = htmlspecialchars(trim(htmlspecialchars_decode($data, ENT_QUOTES)), ENT_QUOTES);
    return $data;
}
$validation = array('nameempty' => false, 'emailempty' => false, 'messageempty' => false, 'emailwrong' => false, 'mailproblem' => false, 'result' => false);
if (isset($_POST['name'], $_POST['email'], $_POST['message']))
{
    $_POST = sanitize($_POST);
    if (empty($_POST['name']))
        $validation['nameempty'] = true;
    if (empty($_POST['email']))
        $validation['emailempty'] = true;
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        $validation['emailwrong'] = true;
    if (empty($_POST['message']))
        $validation['messageempty'] = true;
    if (count(array_unique($validation)) === 1 && !current($validation))
    {
        $mailtext = 'התקבלה הודעה חדשה מאתר סהר אטיאס, להלן פרטי ההודעה:
שם השולח: ' . $_POST['name'] . '
אימייל: ' . $_POST['email'] . '
תוכן: ' . $_POST['message'];
        
        try
        {
            global $mail_host, $mail_username, $mail_password;
            require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/PHPMailer.php';
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Host = $mail_host;
            $mail->CharSet = 'UTF-8';
            $mail->Username = $mail_username;
            $mail->Password = $mail_password;
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
            $mail->SetFrom('support@imutz.org', 'עמותת חבר לי');
            $mail->ClearAddresses();
            $mail->Subject = htmlspecialchars_decode($subject, ENT_QUOTES);
            $mail->Body = strip_tags($message);
            $mail->AddReplyTo($from, htmlspecialchars_decode($fromName, ENT_QUOTES));
            $mail->AddAddress($to, htmlspecialchars_decode($toName, ENT_QUOTES));
            return $mail->Send();
        }
        catch (exception $e)
        {
            return false;
        }
        
        if (sendMail($_POST['title'], $mailtext, $_POST['email'], $_POST['name'], $toEmail, $toName))
            $validation['result'] = true;
        else
            $validation['mailproblem'] = true;
    }
}
else
    $_POST['name'] = $_POST['email'] = $_POST['message'] = '';
?>
<!DOCTYPE html>
<html lang="en">
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php'; ?>
<body>
<div id="wrapper">
<?php printHeader(5); ?>
<main>
<div id="content-wrap">
<div class="content-wrap-inner">
<h2>Contact Me</h2>
<p>Feel free to use the form below to contact me in any matter.</p>
<p>This page is still under development.</p>
<form action="" method="post">
<label>Name
<input type="text" name="name" required value="<?php if (!$validation['result']) echo $_POST['name']; ?>">
</label>
<label>Email
<input type="email" name="email" required value="<?php if (!$validation['result']) echo $_POST['email']; ?>">
</label>
<label>Message
<textarea required name="message"><?php if (!$validation['result']) echo $_POST['message']; ?></textarea>
</label>
<label>
<input type="submit" name="submit" value="Send">
</label>
</form>
</div>
</div>
</main>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
</div>
</body>
</html>