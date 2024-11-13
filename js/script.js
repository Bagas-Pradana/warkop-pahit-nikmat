// Toggle Class="active"
const navigation = document.querySelector('.navbar-nav');
// Ketika Hamburger menu ada aksi click
document.querySelector('#menu').onclick = () => {
    navigation.classList.toggle('active'); // menambah class active
};
// Aero Function = () =>

// Membuat Autoklik DI luar side bar (Luar Dari Elemen) menjadi hilang Icon Menunya
// Navigasi Auto Disaappear
const menu = document.querySelector('#menu');
// Ketika di klik (butuh EventClick)
//  saya akan mendengarkan (memberi event listener pada saat klik mouse)
// tapi efek aksi event listener di luar elemennya
document.addEventListener('click', function(e){ //ketika di klik akan menjalankan eventlistener 'click' dan function (e)
    if(!menu.contains(e.target) && !navigation.contains(e.target)) { //jika kliknya bukan menu dan navigation
        navigation.classList.remove('active'); //menghilangkan class active
    }
});


// Time 
function displayDateTime() {
    const now = new Date();
    const date = now.toLocaleDateString();
    const time = now.toLocaleTimeString();
    
    document.getElementById("datetime").innerText = `${date} ${time}`;
}

  // Panggil fungsi pertama kali
displayDateTime();

  // Update setiap detik
setInterval(displayDateTime, 1000);

