<?php


# Merubah String ke Nomor ASCII
function stringToAscii($string)
{
  $asciiValues = [];
  for ($i = 0; $i < strlen($string); $i++) {
    $asciiValues[] = ord($string[$i]);
  }
  return $asciiValues;
}


# Merubah nomor ASCII ke Biner
function asciiToBinary($asciiValues)
{
  $binaryResult = [];
  foreach ($asciiValues as $value) {
    $binaryResult[] = str_pad(decbin($value), 8, '0', STR_PAD_LEFT);
  }
  return $binaryResult;
}


# Melakukan Operasi XOR
function xorBinary($binary1, $binary2)
{
  $result = "";
  for ($i = 0; $i < strlen($binary1); $i++) {
    $result .= ($binary1[$i] == $binary2[$i]) ? '0' : '1';
  }
  return $result;
}


# Konversi Biner ke Desimal, Jika hasil Desimal kurang dari 32 maka akan ditambah dengan angka 32
function binaryToDecimal($binary)
{
  $decimal = bindec($binary);
  if ($decimal < 32) {
    $decimal += 32;
  }
  return $decimal;
}


# Konversi Desimal ke ASCII
function decimalToAscii($decimal)
{
  return chr($decimal);
}


# Fungsi Enkripsi Plaintext dan Key
function encryptOTP($plainText, $key)
{
  $asciiPlainText = stringToAscii($plainText);
  $binaryPlainText = asciiToBinary($asciiPlainText);

  $asciiKey = stringToAscii($key);
  $binaryKey = asciiToBinary($asciiKey);

  $encryptedBinary = [];
  for ($i = 0; $i < count($binaryPlainText); $i++) {
    $encryptedBinary[] = xorBinary($binaryPlainText[$i], $binaryKey[$i]);
  }

  $encryptedDecimal = array_map('binaryToDecimal', $encryptedBinary);
  $encryptedAscii = array_map('decimalToAscii', $encryptedDecimal);

  return implode("", $encryptedAscii);
}
