function Klient(){
            document.getElementById("pierwszy").style.display = "block";
            document.getElementById("drugi").style.display = "none";
            document.getElementById("trzeci").style.display = "none";

        }
        function adres(){
            document.getElementById("pierwszy").style.display = "none";
            document.getElementById("drugi").style.display = "block";
            document.getElementById("trzeci").style.display = "none";

        }
        
        function kontakt(){
            document.getElementById("pierwszy").style.display = "none";
            document.getElementById("drugi").style.display = "none";
            document.getElementById("trzeci").style.display = "block";

        }
        let currentProgress = 16;
        function updateProgress(){
            const postep = document.getElementById("postep");
            if (currentProgress < 100){
                currentProgress +=12;
                if (currentProgress > 100) currentProgress  =0;
            }
            postep.style.width = currentProgress +'%';
        }
        function info(){
            const imie = document.getElementById("imie").value;
            const nazwisko = document.getElementById("nazwisko").value;
            const data = document.getElementById("data").value;
            const ulica = document.getElementById("ulica").value;
            const numer = document.getElementById("numer").value;
            const miasto = document.getElementById("miasto").value;
            const tele = document.getElementById("telefon").value;
            const rodo = document.getElementById("rodo").checked;
            if (rodo){
                const rodo = "on";
                console.log(imie +", "+nazwisko+", "+data+", "+ulica+", "+numer+", "+miasto+", "+tele+", "+rodo);
            }else{
                console.log("nie dam informacji");
            }
        }