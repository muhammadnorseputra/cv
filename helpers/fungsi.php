<?php  
function convertDate($date) {
    return str_replace(["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"], date('d F Y', strtotime($date)));
}

function splitIntoPairs($text) {
    // Memecah kalimat menjadi array kata-kata
    $words = explode(' ', $text);
    $pairs = [];

    // Membentuk pasangan kata
    for ($i = 0; $i < count($words); $i += 2) {
        if (isset($words[$i + 1])) {
            $pairs[] = $words[$i] . ' ' . $words[$i + 1];
        } else {
            // Jika kata terakhir tidak memiliki pasangan, tetap masukkan
            $pairs[] = $words[$i];
        }
    }

    return $pairs;
}
?>