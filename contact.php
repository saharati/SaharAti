<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
<<<<<<< HEAD
require $_SERVER['DOCUMENT_ROOT'] . '/includes/details.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/SMTP.php';
=======
//require $_SERVER['DOCUMENT_ROOT'] . '/includes/details.php';
>>>>>>> branch 'master' of https://github.com/saharati/SaharAti.git
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
        $message = 'Sender: ' . $_POST['name'] . '
Email: ' . $_POST['email'] . '
Message: ' . $_POST['message'];
        try
        {
            $mail = new PHPMailer(true);
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Host = $host;
            $mail->CharSet = 'UTF-8';
            $mail->Username = $username;
            $mail->Password = $password;
            $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
            $mail->SetFrom('dev@saharati.co.il', 'Sahar Atias');
            $mail->Subject = 'New message from saharati.co.il';
            $mail->Body = strip_tags($message);
            $mail->AddReplyTo($_POST['email'], htmlspecialchars_decode($_POST['name'], ENT_QUOTES));
            $mail->AddAddress('dev@saharati.co.il', 'Sahar Atias');
            if ($mail->Send())
                $validation['result'] = true;
            else
                $validation['mailproblem'] = true;
        }
        catch (exception $e)
        {
            $validation['mailproblem'] = true;
        }
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
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php';
if (isset($_POST['submit']))
{
    echo '<script>';
    if ($validation['result'])
        echo 'alert("Your message was successfully sent ✔");';
    else
    {
        echo 'alert("';
        if ($validation['nameempty']) echo 'Please fill in your name.\n';
        if ($validation['emailempty']) echo 'Please fill in your email address.\n';
        elseif ($validation['emailwrong']) echo 'Your email address seems to be invalid.\n';
        if ($validation['contentsempty']) echo 'Please enter your message.\n';
        if ($validation['mailproblem']) echo 'An unknown error occurred, please try again later.';
        echo '");';
    }
    echo '</script>';
}
?>
</div>
</body>
</html>