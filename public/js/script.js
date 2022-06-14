$(document).ready(function(){
    function getMahasiswaApi(){
        $.ajax({
            type: "GET",
            url: "http://daftar-mahasiswa-lumen.test/mahasiswa",
            datatype: "json",
            success: function(response){
                console.log(response);
            }
        });
    }
});