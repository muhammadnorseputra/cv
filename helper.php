<?php  
function convertDate($date) {
    return str_replace(["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"], date('d F Y', strtotime($date)));
}
?>