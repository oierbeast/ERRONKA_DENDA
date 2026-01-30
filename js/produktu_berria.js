/**
 * produktu_berria.js - Validación del formulario para crear nuevos productos
 */

(function(){
    document.addEventListener('DOMContentLoaded', function(){
        var form = document.getElementById("produktuBerriaForm");
        if (!form) return;
        
        form.addEventListener("submit", function(event) {
            var izena = document.getElementById("izena").value.trim();
            var kontsola = document.getElementById("kontsola").value.trim();
            var marka = document.getElementById("marka").value.trim();
            var urtea = document.getElementById("urtea").value.trim();
            var prezioa = document.getElementById("prezioa").value.trim();

            var errorea = "";

            if (izena === "" || kontsola === "" || marka === "" || urtea === "" || prezioa === "") {
                errorea = "Eremu guztiak bete behar dira.";
            } else if (isNaN(urtea) || urtea < 1900 || urtea > 2100) {
                errorea = "Urtea 1900 eta 2100 artean egon behar da.";
            } else if (isNaN(prezioa) || prezioa <= 0) {
                errorea = "Prezioa zenbaki positiboa izan behar da.";
            }

            if (errorea !== "") {
                alert(errorea);
                event.preventDefault(); // Evita que se envíe el formulario
            }
        });
    });
})();
