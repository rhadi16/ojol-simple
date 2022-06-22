var menu_btn = document.querySelector("#menu-btn");
var sidebar = document.querySelector("#sidebar");
var container = document.querySelector(".my-container");
var toastLiveExample = document.getElementById('liveToast');

$(document).ready(function(){
  $('a[data-bs-toggle="tab"]').on('show.bs.tab', function (event) {
    localStorage.setItem('activeTab', $(event.target).attr('data-bs-target'));
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('#myTab a[data-bs-target="' + activeTab + '"]').tab('show');
  }
});

$(document).ready(function() {
  $('#example').DataTable();
  $('#example2').DataTable();
});

const desc_in = $('.desc-in').data('flashdata');
if (desc_in == "suc-ed-pro") {
  Swal.fire(
    'Berhasil!',
    'Profile Diubah',
    'success'
  )
} else if (desc_in == "suc-add-ord") {
  Swal.fire(
    'Berhasil!',
    'Orderan Diambil',
    'success'
  )
} else if (desc_in == "suc-com-ord") {
  Swal.fire(
    'Berhasil!',
    'Orderan Telah Diselesaikan',
    'success'
  )
}

menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});

// Clear the browser app cache
// document
//   .getElementById('btn-clear-cache')
//   .addEventListener('click', () => {
//     PWA.Navigator.clearCache();
//     var toast = new bootstrap.Toast(toastLiveExample);

//     toast.show();
//   })
// ;
