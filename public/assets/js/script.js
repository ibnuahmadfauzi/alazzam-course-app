$(document).ready( function () {
    $('.myTable').DataTable();
    setTimeout(function(){
        $("#submit-kuis").trigger('click');
    }, 0.5 * 60 * 1000);
} );
