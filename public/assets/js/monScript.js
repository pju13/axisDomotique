/*****************************************************************************************
 * Affichage de la météo à l'instant T + 5 jours à venir sur la ville de marseille
 * AJAX
 */
let xhr         = new XMLHttpRequest();
let result      = document.getElementById("resultMeteo");
let resultTitre = document.getElementById("resultMeteoTitre");

xhr.onreadystatechange = function() {

    // if (selectVille.value !== "0") {
        // console.log(this.readyState, this.status);

        /* Parcours de vie de la requête HTTP */
        if (this.readyState == 4) {

            // Tout est ok !!
            let meteoCurrentTitre   = '';
            let meteoCurrent        = '';

            if (this.status == 200) {
                let mjJson = JSON.parse(this.responseText);

                meteoCurrentTitre = 'Marseille, ';
                meteoCurrentTitre += '<img src="'+mjJson.current_condition.icon_big+'" width="8%" height="8%" alt="logo météo "/>';
                meteoCurrentTitre += mjJson.current_condition.condition+', '+mjJson.current_condition.tmp+' °C';

                meteoCurrent += '<h2>Météo <i class="fas fa-cloud-sun"></i> à venir</h2>';
                for (var i = 1; i < 5; i++) {
                    switch(i) {
                        case 1:
                            meteoCurrent += '<article>';
                            meteoCurrent += '<p>'+mjJson.fcst_day_1.date+'</p>';
                            meteoCurrent += '<p><img src="'+mjJson.fcst_day_1.icon_big+'" alt="logo météo "/></p>';
                            meteoCurrent += '<p class="taillePetite">'+mjJson.fcst_day_1.condition+'<br> Tmin: '+mjJson.fcst_day_1.tmin+'°C / Tmax: '+mjJson.fcst_day_1.tmax+'°C</p>';
                            meteoCurrent += '</article>';
                            break;
                        case 2:
                            meteoCurrent += '<article>';
                            meteoCurrent += '<p>'+mjJson.fcst_day_2.date+'</p>';
                            meteoCurrent += '<p><img src="'+mjJson.fcst_day_2.icon_big+'" alt="logo météo "/></p>';
                            meteoCurrent += '<p class="taillePetite">'+mjJson.fcst_day_2.condition+'<br> Tmin: '+mjJson.fcst_day_2.tmin+'°C / Tmax: '+mjJson.fcst_day_2.tmax+'°C</p>';
                            meteoCurrent += '</article>';
                            break;
                        case 3:
                            meteoCurrent += '<article>';
                            meteoCurrent += '<p>'+mjJson.fcst_day_3.date+'</p>';
                            meteoCurrent += '<p><img src="'+mjJson.fcst_day_3.icon_big+'" alt="logo météo "/></p>';
                            meteoCurrent += '<p class="taillePetite">'+mjJson.fcst_day_3.condition+'<br> Tmin: '+mjJson.fcst_day_3.tmin+'°C / Tmax: '+mjJson.fcst_day_3.tmax+'°C</p>';
                            meteoCurrent += '</article>';
                            break;
                        case 4:
                            meteoCurrent += '<article>';
                            meteoCurrent += '<p>'+mjJson.fcst_day_4.date+'</p>';
                            meteoCurrent += '<p><img src="'+mjJson.fcst_day_4.icon_big+'" alt="logo météo "/></p>';
                            meteoCurrent += '<p class="taillePetite">'+mjJson.fcst_day_4.condition+'<br> Tmin: '+mjJson.fcst_day_4.tmin+'°C / Tmax: '+mjJson.fcst_day_4.tmax+'°C</p>';
                            meteoCurrent += '</article>';
                            break;
                    };
                }
                resultTitre.innerHTML   = meteoCurrentTitre;
                result.innerHTML        = meteoCurrent;
            } else {
                alert("Météo Ajax : Erreur constatée :( ");
                result.innerHTML        = '';
                resultTitre.innerHTML   = '';
            }
        } else if ( this.readyState >= 1 && this.readyState <= 3) {
            result.innerHTML = `
                <img src="{{ asset('assets/img/57932-full.gif') }}" alt="Attente de la météo..." />
            `;
        }
    // } else 
    //     result.innerHTML = '';
};
xhr.open("GET", "https://www.prevision-meteo.ch/services/json/marseille");
xhr.send(null);

/*****************************************************************************************
 * FIN Gestion Météo
 *****************************************************************************************/ 

 /*****************************************************************************************
 * Gestion des variateurs des ampoules
 */
var variateursAmpoules = document.querySelectorAll(".variateursAmpoules");
if (variateursAmpoules.length != 0)
{
    variateursAmpoules.forEach(function(varAmpoule) {
        varAmpoule.addEventListener("input", function(){
            var id      = varAmpoule.getAttribute("data-id");
            //var lien    = varAmpoule.getAttribute("data-lien");

            // Récupérer l'id du champ image Ampoule :
            var imgAmpoule  = document.getElementById("ampoule_"+id);
            var InfoAmpoule = document.getElementById("InfoAmpoule_"+id);
            //console.log(imgAmpoule);

            if (varAmpoule.value == 0 ) {
                imgAmpoule.src = assetsBaseDir + "lum_off.png";
            }
            else {
                imgAmpoule.src = assetsBaseDir + "lum_on.png";
            }
            InfoAmpoule.innerHTML = varAmpoule.value + " %";

            // Affichage le bouton de sauvegarde :
            var btnAmpoule = document.getElementById("btnAmpoule_"+id);
            btnAmpoule.style.visibility = "visible";
        });
    });
}
