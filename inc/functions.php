<?php
function generateRandomString($length = 25)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function mailRegConfirm($email, $confirmation_code)
{
	$mailHandler = Swift_MailTransport::newInstance();

	$message = Swift_Message::newInstance();
	$message->setTo($email);
	$message->setSubject("Welcome to the Synful Toolbox");
	$message->setBody("Thank you for registering at the Synful Toolbox. In order to confirm your registration please go to the following link http://wontoolbox.com/toolbox/validate?confirmation=".$confirmation_code);
	$message->setFrom("ai@wontoolbox.com", "Synful AI");
	$mailer = Swift_Mailer::newInstance($mailHandler);
	$mailer->send($message);
}

function execRegistration($password, $confirmation_code)
{
	$pOptions = ['cost' => 11];
	$password = password_hash($password, PASSWORD_BCRYPT, $pOptions);

	$userDB = new DBConnection();

	$userDB->query('INSERT INTO users (username, password, email, confirm_email, status, confirm_code, ip_address) VALUES (:username, :password, :email, :confirm_email, :status, :confirm_code, :ip_address)');
	$userDB->bind(':username', strtolower($_POST['register_username']));
	$userDB->bind(':password', $password);
	$userDB->bind(':email', $_POST['register_email']);
	$userDB->bind(':confirm_email', 0);
	$userDB->bind(':status', 1);
	$userDB->bind(':confirm_code', $confirmation_code);
	$userDB->bind(':ip_address', $_SERVER['REMOTE_ADDR']);
	$userDB->execute();
	mailRegConfirm($_POST['register_email'], $confirmation_code);
	$register_success = 1;
}

function checkRegistration()
{
	$userDB = new DBConnection();
	$userDB->query('SELECT * FROM users WHERE username = :user');
	$userDB->bind(':user', $_POST['register_username']);
	$row = $userDB->single();
	$isRegistered = $userDB->rowCount();
	if($isRegistered)
	{
		return $isRegistered;
	} else {
		return 0;
	}

}

function downloadAudio($url)
{
	try
	{
		new yt_downloader($url, TRUE, 'audio');
    }
	catch (Exception $e)
	{
        die($e->getMessage());
    }
}

function drawArray(DirectoryIterator $directory)
{
    $result=array();
    foreach($directory as $object)
    {
        if($object->isDir()&&!$object->isDot())
        {
            $result[$object->getFilename()]=drawArray(new DirectoryIterator($object->getPathname()));
        }
        else if($object->isFile())
        {
            $result[]=$object->getFilename();
        }
    }
    return $result;
}