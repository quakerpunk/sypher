<?php

/**
 * Cipher class for decrypting text files and content.
 *
 * @package Sypher
 * @author  Shawn Borton <shawn@shawnborton.info>
 */

namespace Sypher;

use Sypher\CipherKey;

/**
 * The Cipher class.
 *
 * @package Sypher
 * @author  Shawn Borton <shawn@shawnborton.info>
 */
class Cipher
{
    /**
     * Decrypts a ciphered string
     *
     * @param $cipheredString
     *   The ciphered string
     * @return $decipheredString
     *   The decrypted string
     */
    public function simpleCipher($cipheredString)
    {
        $decipheredString = "";
        $cipheredArr = explode(" ", $cipheredString);

        foreach ($cipheredArr as $word) {
            // We'll check a few common words to speed up decryption.
            if (array_key_exists($word, CipherKey::COMMONS)) {
                $decipheredString .= CipherKey::COMMONS[$word] . " ";
            } else {
                // We'll go by letter.
                $letters = str_split($word);
                foreach ($letters as $letter) {
                    if (array_key_exists($letter, CipherKey::CIPHER)) {
                        $decipheredString .= CipherKey::CIPHER[$letter];
                    } else {
                        // This may be uppercased or it may be punctuation.
                        $ltrCode = ord($letter);

                        if ($ltrCode >= 65 && $ltrCode <= 90) {
                            // If the code is between 65 and 90,
                            // it's an uppercase letter
                            $decipheredString .= strtoupper(
                                CipherKey::CIPHER[strtolower($letter)]
                            );
                        } else {
                            // It's punctuation,
                            // so just add it to the deciphered string.
                            $decipheredString .= $letter;
                        }
                    }

                }
                $decipheredString .= " ";
            }
        }

        return rtrim($decipheredString);
    }
}