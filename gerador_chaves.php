<?php

/**
 * Gerador de Chaves de Segurança
 * 
 * Este script contém funções para gerar diferentes tipos de chaves seguras
 */

/**
 * Gera uma chave aleatória de 64 caracteres
 * @param int $tamanho Tamanho da chave (padrão: 64)
 * @return string Chave gerada
 */
function gerarChave64($tamanho = 64) {
    return bin2hex(random_bytes($tamanho / 2));
}

/**
 * Gera uma chave base64
 * @param int $tamanho Tamanho da chave em bytes
 * @return string Chave em base64
 */
function gerarChaveBase64($tamanho = 32) {
    return base64_encode(random_bytes($tamanho));
}

/**
 * Gera uma chave UUID v4
 * @return string UUID v4
 */
function gerarUUID() {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

/**
 * Gera uma chave com caracteres especiais
 * @param int $tamanho Tamanho da chave
 * @return string Chave com caracteres especiais
 */
function gerarChaveComEspeciais($tamanho = 32) {
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-=[]{}|;:,.<>?';
    $chave = '';
    $max = strlen($caracteres) - 1;
    
    for ($i = 0; $i < $tamanho; $i++) {
        $chave .= $caracteres[random_int(0, $max)];
    }
    
    return $chave;
} 