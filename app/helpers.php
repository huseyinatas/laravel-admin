<?php

function admin_mail_control($mail){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        return $mail;
    }
    return null;
}
