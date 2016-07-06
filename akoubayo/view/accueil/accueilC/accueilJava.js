(function () { // On utilise une IEF pour ne pas polluer l'espace global

    // Fonction de désactivation de l'affichage des « tooltips »

    function deactivateTooltips() {

        var spans = document.getElementsByTagName('span'),
                spansLength = spans.length;

        for (var i = 0; i < spansLength; i++) {
            if (spans[i].className == 'tooltip') {
                spans[i].style.display = 'none';
            }
        }

    }


    // La fonction ci-dessous permet de récupérer la « tooltip » qui correspond à notre input

    function getTooltip(element) {

        while (element = element.nextSibling) {
            if (element.className === 'tooltip') {
                return element;
            }
        }

        return false;

    }


    // Fonctions de vérification du formulaire, elles renvoient « true » si tout est OK

    var check = {}; // On met toutes nos fonctions dans un objet littéral

    check['sexe_id_sexe'] = function () {

        var country = document.getElementById('sexe_id_sexe'),
                tooltipStyle = getTooltip(country).style;

        if (country.options[0].value != '0') {
            name.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }



    };


    check['ville_id'] = function (id) {

        var name = document.getElementById(id),
                tooltipStyle = getTooltip(name).style;

        if (/^[0-9]{5,5}$/.test(name.value)) {
            name.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            name.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };





    check['pseudo'] = function () {
        var login = document.getElementById('pseudo'),
                tooltipStyle = getTooltip(login).style;

        if (/^[a-zA-Z0-9]*$/.test(login.value)) {
            login.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            login.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }
    };
    check['mail'] = function () {

        var mail = document.getElementById('mail'),
                tooltipStyle = getTooltip(mail).style;

        if (mail.value.length >= 4 && /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail.value)) {
            mail.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            mail.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };

    check['pass'] = function () {

        var pwd1 = document.getElementById('pass'),
                tooltipStyle = getTooltip(pwd1).style;

        if (pwd1.value.length >= 6) {
            pwd1.className = 'correct';
            tooltipStyle.display = 'none';
            return true;
        } else {
            pwd1.className = 'incorrect';
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };


    check['sexe_id_sexe'] = function () {

        var country = document.getElementById('sexe_id_sexe'),
                tooltipStyle = getTooltip(country).style;

        if (country.options[country.selectedIndex].value != '0') {
            tooltipStyle.display = 'none';
            return true;
        } else {
            tooltipStyle.display = 'inline-block';
            return false;
        }

    };


    // Mise en place des événements

    (function () { // Utilisation d'une fonction anonyme pour éviter les variables globales.

        var myForm = document.getElementById('myForm'),
                inputs = document.getElementsByTagName('input'),
                inputsLength = inputs.length;

        for (var i = 0; i < inputsLength; i++) {
            if (inputs[i].type == 'text' || inputs[i].type == 'password') {

                inputs[i].onkeyup = function () {
                    check[this.id](this.id); // « this » représente l'input actuellement modifié
                };

            }
        }

        myForm.onsubmit = function () {

            var result = true;

            for (var i in check) {
                result = check[i](i) && result;
            }

            if (result) {
                document.getElementById('id_du_formulaire').submit();
            }

            return false;

        };

        myForm.onreset = function () {

            for (var i = 0; i < inputsLength; i++) {
                if (inputs[i].type == 'text' || inputs[i].type == 'password') {
                    inputs[i].className = '';
                }
            }

            deactivateTooltips();

        };

    })();


    // Maintenant que tout est initialisé, on peut désactiver les « tooltips »

    deactivateTooltips();

})();
               