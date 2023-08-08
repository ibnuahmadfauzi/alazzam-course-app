$(document).ready( function () {
    $('.myTable').DataTable();
    setTimeout(function(){
        $("#submit-kuis").trigger('click');
    }, $('.durasi').val() * 60 * 1000);

    var targetTime = new Date().getTime() + ($('.durasi').val() * 60 * 1000); // Waktu saat ini + 10 menit

            var countdownInterval = setInterval(function() {
                var now = new Date().getTime();
                var timeRemaining = targetTime - now;

                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                var countdownText = minutes + "m " + seconds + "s";
                $("#countdown").text(countdownText);

                if (timeRemaining <= 0) {
                    clearInterval(countdownInterval);
                    $("#countdown").text("Waktu telah habis!");
                }
            }, 1000); // Interval setiap 1 detik (1000 milidetik)
} );
