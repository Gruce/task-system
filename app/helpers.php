<?php

function dg($data)
{
    \Debugbar::info($data);
}

function lang($val){
    return app()->getLocale() == $val ? true : false;
}

function ar(){
    return app()->getLocale() == 'ar' ? true : false;
}

function en(){
    return app()->getLocale() == 'en' ? true : false;
}