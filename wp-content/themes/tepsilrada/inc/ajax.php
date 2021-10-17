<?php

add_action('wp_ajax_mail-receiver', 'mailReceiver');
add_action('wp_ajax_nopriv_mail-receiver', 'mailReceiver');

function mailReceiver()
{
    if(!$_POST['formdata']) return null;
    $data = $_POST['formdata'];

    $name = $data[array_search('name', array_column($data, 'name'))]['value'];
    $lastname = $data[array_search('lastname', array_column($data, 'name'))]['value'];
    $message = $data[array_search('message', array_column($data, 'name'))]['value'];
    $phone = "+38" . $data[array_search('phone', array_column($data, 'name'))]['value'];
    $email = $data[array_search('email', array_column($data, 'name'))]['value'];
    $headers = array("From: $lastname $name. <$email>", "Content-Type: text/html");

    $readyMessage = "Письмо від: $lastname $name. <br>E-mail: $email. <br>Телефон: $phone.<br><br> Повідомлення: $message";
    $mail = wp_mail("04377428@mail.gov.ua", 'Письмо до Івана Леонтьєва від громадян', $readyMessage, $headers);
    $mail === true ? wp_send_json_success() : wp_send_json_error();
    wp_die();
}

function var_log( $file, ...$var ) {
    ob_flush();
    ob_start();
    var_dump( $var );

    return file_put_contents( $file, ob_get_flush(), FILE_APPEND );
}

/**
 * Настройка SMTP
 *
 * @param PHPMailer $phpmailer объект мэилера
 */
function mihdan_send_smtp_email($phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USER;
    $phpmailer->Password   = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_NAME;
}
add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );

function mihdan_debug_wp_mail( $wp_error ) {
    return error_log( print_r( $wp_error, true ) );
}
add_action( 'wp_mail_failed', 'mihdan_debug_wp_mail', 10, 1 );
