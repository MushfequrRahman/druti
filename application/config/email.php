<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol' => 'ssmtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'ssl://ssmtp.googlemail.com', 
    'smtp_port' => 465,
    'smtp_user' => 'maitreefreelancing@gmail.com',
    'smtp_pass' => 'UNdefinedsymbolcosmos09matrix!',
    'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
    'mailtype' => 'text', //plaintext 'text' mails or 'html'
    //'smtp_timeout' => '4', //in seconds
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);