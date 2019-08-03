<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/details.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/includes/mailer/SMTP.php';
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
$validation = array('nameempty' => false, 'emailempty' => false, 'messageempty' => false, 'captchaempty' => false, 'emailwrong' => false, 'mailproblem' => false, 'captchawrong' => false, 'result' => false);
if (isset($_POST['name'], $_POST['email'], $_POST['message'], $_POST['g-recaptcha-response']))
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
    if (empty($_POST['g-recaptcha-response']))
        $validation['captchaempty'] = true;
    else
    {
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptchaSecret . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
        $responseKeys = json_decode($response, true);
        if (!$responseKeys["success"])
            $validation['captchawrong'] = true;
    }
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
<div class="g-recaptcha" data-sitekey="6LdyIbEUAAAAAG8MLV9087tQE-JIhpWtRqd9hJRo"></div>
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
        if ($validation['messageempty']) echo 'Please enter your message.\n';
        if ($validation['captchaempty']) echo 'Please complete the captcha.\n';
        elseif ($validation['captchawrong']) echo 'The captcha you entered was invalid.\n';
        if ($validation['mailproblem']) echo 'An unknown error occurred, please try again later.';
        echo '");';
    }
    echo '</script>';
}
?>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>