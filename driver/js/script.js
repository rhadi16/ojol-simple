const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "success-reg") {
    Swal.fire(
      'Berhasil Melakukan Registrasi!',
      'Silahkan Login Sebagai Admin',
      'success'
    )
} else if (desc_in == "failed-reg2") {
    Swal.fire(
      'Gagal Melakukan Registrasi!',
      'Silahkan Registrasi Ulang',
      'error'
    )
} else if (desc_in == "failed-reg") {
    Swal.fire(
      'Gagal Melakukan Registrasi!',
      'Email Telah Terpakai',
      'error'
    )
} else if (desc_in == "failed-log") {
    Swal.fire(
      'Gagal Melakukan Login!',
      'Email Atau Password Salah',
      'error'
    )
}
// var menu_btn = document.querySelector("#menu-btn");
// var sidebar = document.querySelector("#sidebar");
// var container = document.querySelector(".my-container");
// var toastLiveExample = document.getElementById('liveToast');

// menu_btn.addEventListener("click", () => {
//   sidebar.classList.toggle("active-nav");
//   container.classList.toggle("active-cont");
// });

// $(document).ready(function(){
//   $('a[data-bs-toggle="tab"]').on('show.bs.tab', function (event) {
//     localStorage.setItem('activeTab', $(event.target).attr('data-bs-target'));
//   });

//   var activeTab = localStorage.getItem('activeTab');
//   if(activeTab){
//     $('#myTab a[data-bs-target="' + activeTab + '"]').tab('show');
//   }
// });
// // Clear the browser app cache
// // document
// //   .getElementById('btn-clear-cache')
// //   .addEventListener('click', () => {
// //     PWA.Navigator.clearCache();
// //     var toast = new bootstrap.Toast(toastLiveExample);

// //     toast.show();
// //   })
// // ;
