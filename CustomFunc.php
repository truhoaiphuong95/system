<?php

function UserInfo() {
    return Auth::guard('staff')->user();
}

function PhoneFormat($data) {
    if(  preg_match( '/^0(\d{3})(\d{3})(\d{3})$/', $data,  $matches ) )
    {
        $result = '0' .$matches[1] . '-' .$matches[2] . '-' . $matches[3];
        return $result;
    }
}

function MoneyFormat($data) {
    return number_format($data,0,",",".");
}

function DateFormat($data) {
    return date('d/m/Y', strtotime($data));
}

function TuitionAfter($tuition, $rate) {
    return round($tuition * (1 - ($rate/100)));
}

?>