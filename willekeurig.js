function goedkeuren(id) {


location.href = "http://localhost/Level%204/KnowItAll/goedkeuren.php?gebruiker=" +id;
}

function afwijzen(id) {

    location.href = "http://localhost/Level%204/KnowItAll/afwijzen.php?gebruiker=" +id;

}

function gebruikerverwijderen(id) {

    location.href = "http://localhost/Know-IT_All/KnowItAll/gebruikerverwijderen.php?gebruiker=" +id;

}



/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function logo() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav responsive") {
        document.getElementById("logo").style.display = "none";
    } else if (x.className === "topnav" ) {
        document.getElementById("logo").style.display = "block";
    }

}
