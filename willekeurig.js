function goedkeuren(id) {
alert('hallo ' + id);

location.href = "http://localhost/Level%204/KnowItAll/goedkeuren.php?gebruiker=" +id;
}

function afwijzen(id) {
    alert('hallo' + id);

    location.href = "http://localhost/Level%204/KnowItAll/afwijzen.php?gebruiker=" +id;

}

function gebruikerverwijderen(id) {
    alert('hallo' + id)  ;

    location.href = "http://localhost/Know-IT_All/KnowItAll/gebruikerverwijderen.php?gebruiker=" +id;

}