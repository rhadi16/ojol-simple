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
} else if (desc_in == "suc-in-ord") {
  Swal.fire(
    'Berhasil!',
    'Silahkan Menunggu Driver',
    'success'
  )
} else if (desc_in == "suc-ed-ord") {
  Swal.fire(
    'Berhasil!',
    'Tujuan Diubah',
    'success'
  )
} else if (desc_in == "suc-del-ord") {
  Swal.fire(
    'Berhasil!',
    'Tujuan Dihapus',
    'success'
  )
}

menu_btn.addEventListener("click", () => {
  sidebar.classList.toggle("active-nav");
  container.classList.toggle("active-cont");
});

$('#btn-edit').click(function() {
  geo_position_js.getCurrentPosition(success_callback1,error_callback,{enableHighAccuracy:true});
});

function success_callback1(p)
{
  // alert('lat='+p.coords.latitude.toFixed(7)+';lon='+p.coords.longitude.toFixed(7));
  $('#lat1').val(p.coords.latitude.toFixed(7));
  $('#lon1').val(p.coords.longitude.toFixed(7));
}

if(geo_position_js.init()){
  geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true});
}
else{
  alert("Functionality not available");
}

function success_callback(p)
{
  // alert('lat='+p.coords.latitude.toFixed(7)+';lon='+p.coords.longitude.toFixed(7));
  $('#lat').val(p.coords.latitude.toFixed(7));
  $('#lon').val(p.coords.longitude.toFixed(7));
}

function error_callback(p)
{
  alert('error='+p.message);
}
// Clear the browser app cache
// document
//   .getElementById('btn-clear-cache')
//   .addEventListener('click', () => {
//     PWA.Navigator.clearCache();
//     var toast = new bootstrap.Toast(toastLiveExample);

//     toast.show();
//   })
// ;
