<?php 

function generatePrimaryKey($currentKey = 'A') {
    $nextKey = '';

    // Mengubah huruf ke dalam array karakter
    $keyChars = str_split($currentKey);

    // Mengecek apakah semua karakter adalah huruf 'Z'
    $isAllZ = true;
    foreach ($keyChars as $char) {
        if ($char !== 'Z') {
            $isAllZ = false;
            break;
        }
    }

    // Jika semua karakter adalah 'Z', tambahkan satu karakter 'A' di depannya
    if ($isAllZ) {
        $nextKey .= 'A';
    }

    // Tambahkan satu karakter di belakang
    $length = count($keyChars);
    $carry = true;
    for ($i = $length - 1; $i >= 0; $i--) {
        if ($carry) {
            $carry = false;

            // Jika karakter saat ini adalah 'Z', ubah menjadi 'A' dan set carry menjadi true
            if ($keyChars[$i] === 'Z') {
                $keyChars[$i] = 'A';
                $carry = true;
            } else {
                // Jika karakter saat ini bukan 'Z', tambahkan satu ke karakter saat ini dan selesai
                $keyChars[$i] = chr(ord($keyChars[$i]) + 1);
            }
        }
    }

    // Menggabungkan kembali karakter-karakter menjadi primary key
    $nextKey .= implode('', $keyChars);

    return $nextKey;
}

// Contoh penggunaan


?>