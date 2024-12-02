// Menggunakan Library JQUERY

jQuery(document).ready(function() { //jquery ambil document, if ready jalankan function()
    // testing running JavaScript Biasa
    // var keyword = document.getElementById('kunci');
    // keyword.addEventListener('keyup', function() {
    //     // console.log('ok');
    // });

    // Menghilangkan id pada elemen HTML (kasus ini menghilangkan id tombol)
    jQuery('#kata-kunci').hide();

    
    // --------------------AJAX
    // step 1 membuat eventListener ('keyup') pada Input Label search
    jQuery('#key').on('keyup', function(){
        // testing Jquery
        // console.log('ok');

        // Memunculkan gambar loading pada elemen HTML (kasus ini elemennya class bukan id)
        jQuery('.image').show();

        //AJAX MENGGUNAKAN metode .load()
        // var keyVal = jQuery('#key').val();
        // console.log(keyVal); // Lihat nilai key yang dikirim
        // console.log(jQuery('#key').val()); //test debug #key
        // jQuery('#container').load('ajax/mahasiswa.php?key=' + keyVal);

        //AJAX MENGGUNAKAN metode jQuery.get
        var keyVal = jQuery('#key').val();
        jQuery.get('ajax/mahasiswa.php?key=' + keyVal, function(data) {
            // Mengganti Isi kontainer dari index menjadi mahasiswa.php
            jQuery('#container').html(data);
            jQuery('.image').hide();
            
        });

    });

});