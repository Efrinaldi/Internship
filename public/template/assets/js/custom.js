/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

var path = location.pathname.split('/')
var url = location.origin + '/' + path[1]

$('ul.sidebar-menu li a').each(function(){
    if($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
})

// data table
$(document).ready( function () {
    $('#table1').DataTable();
} );

// modal confirmation
function submitDel(id) {
    $('#del-'+id).submit()
}

function returnLogout() {
    var link = $('#logout').attr('href')
    $(location).attr('href', link)
}


function downloadExcel() {
    let key = $('#keyword').val()
    let awal = $('#tgl_awal').val()
    let akhir = $('#tgl_akhir').val()
    Swal.fire({
        title: 'Rentang Tanggal',
        html: `
        <form action="export" method="post">
            <div class="form-group">
                <div class="mb-2">
                    <input type="text" name="driver" value="`+key+`">
                </div>
                <input type="date" name="startdate" id="startdate" value="`+awal+`" required> -
                <input type="date" name="enddate" id="enddate" value="`+akhir+`" required>
            </div>    
            <button type="submit" class="btn btn-primary">Unduh</button>
        </form>
   
        `,
        focusConfirm: false,
        showConfirmButton: false,

        // icon: 'success',
        confirmButtonText: 'Kembali',
        target: '#content'
    })
}