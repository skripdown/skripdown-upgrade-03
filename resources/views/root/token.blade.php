@php
    $alphabet='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';$length=strlen($alphabet);$begin='';$end='';$token=csrf_token();for($i=0;$i<5;$i++){$begin.=$alphabet[rand(0,$length-1)];}for($i=0;$i<6;$i++){$end.=$alphabet[rand(0,$length-1)];}$token=strrev($begin.$token.$end);
@endphp
_response.init('{{$token}}');
