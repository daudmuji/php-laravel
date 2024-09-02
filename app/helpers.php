<?php

function dekrip(string $value)
{
    try {
        return Crypt::decryptString($value);
    } catch (DecryptException $e) {
        return $e->getMessage();
    }
}

function enkrip(string $value)
{
    try {
        return Crypt::encryptString($value);
    } catch (EncryptException $e) {
        return $e->getMessage();
    }
}

function dateWithFullMonthFormat($date)
{
    return Carbon::parse($date)->locale(config('app.locale'))->translatedFormat('j F Y');
}
