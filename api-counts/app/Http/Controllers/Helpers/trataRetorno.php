<?php

class TrataRetorno {
     function handleReturn($thereIsError, $errorCode, $message)
    {
        return [
            'Erro :' => $thereIsError,
            'Código de erro :' => $errorCode,
            'Mensagem :' => $message
        ];
    }
}
