//felhasznalok latszik
var flatszik = true;
//munkak latszik
var mlatszik = true;
//referenciak latszik
var rlatszik = true;
//uzenetek latszik
var ulatszik = true;

//user szerk. latszik
var uszlatszik = true;
//user delete latszik
var udlatszik = true;

//work szerk. latszik
var wszlatszik = true;
//work delete latszik
var wdlatszik = true;

//üzenet latszik
var uzlatszik = true;


//referencia szerk. latszik
var refszlatszik = true;

//referencia delete latszik
var refdlatszik = true;


function felhasznalok()
{
    var div = document.getElementById("felhasznalok");
    if(flatszik == true)
    {
        div.style.display = 'none';
        flatszik = false;
    }
    else if(flatszik == false)
    {
        div.style.display = 'block';
        flatszik = true;
    }
}

function munkak()
{
    var div = document.getElementById("munkak");
    if(mlatszik == true)
    {
        div.style.display = 'none';
        mlatszik = false;
    }
    else if(mlatszik == false)
    {
        div.style.display = 'block';
        mlatszik = true;
    }
}

function referenciak()
{
    var div = document.getElementById("referenciak");
    if(rlatszik == true)
    {
        div.style.display = 'none';
        rlatszik = false;
    }
    else if(rlatszik == false)
    {
        div.style.display = 'block';
        rlatszik = true;
    }
}

function uzenetek()
{
    var div = document.getElementById("uzenetek");
    if(ulatszik == true)
    {
        div.style.display = 'none';
        ulatszik = false;
    }
    else if(ulatszik == false)
    {
        div.style.display = 'block';
        ulatszik = true;
    }
}

function userSzerkesztes(id, name, username, email, pozicio)
{
    var div = document.getElementById("uszerk");
    if(uszlatszik == true)
    {
        div.style.display = 'block';
        uszlatszik = false;
    }
    else if(uszlatszik == false)
    {
        div.style.display = 'none';
        uszlatszik = true;
    }

    var tid = document.getElementsByName("id")[0].value = id;
    var tname = document.getElementsByName("name")[0].value = name;
    var tusername = document.getElementsByName("euid")[0].value = username;
    var temail = document.getElementsByName("email")[0].value = email;
    var tpozicio = document.getElementsByName("position")[0].value = pozicio;
}

function specificUserDelete(id, name) {
    var div = document.getElementById("udelete");
    if(udlatszik == true)
    {
        div.style.display = 'block';
        udlatszik = false;
    }
    else if(udlatszik == false)
    {
        div.style.display = 'none';
        udlatszik = true;
    }

    var tid = document.getElementsByName("did")[0].value = id;
    var string = document.getElementById("dname").innerText = "Biztos törölni akarja a(z) " + name + " nevű felhasználót?"
}

function workEdit(id, megnevezes, feladat, fizetes, elerhetoseg) {
    var div = document.getElementById("wszerk");
    if(wszlatszik == true)
    {
        div.style.display = 'block';
        wszlatszik = false;
    }
    else if(wszlatszik == false)
    {
        div.style.display = 'none';
        wszlatszik = true;
    }

    var tid = document.getElementsByName("swid")[0].value = id;
    var tname = document.getElementsByName("wnev")[0].value = megnevezes;
    var tusername = document.getElementsByName("wfeladat")[0].value = feladat;
    var temail = document.getElementsByName("wfizetes")[0].value = fizetes;
    var tpozicio = document.getElementsByName("welerhetoseg")[0].value = elerhetoseg;
}

function specificWorkDelete(id, megnevezes) {
    var div = document.getElementById("wdelete");
    if(wdlatszik == true)
    {
        div.style.display = 'block';
        wdlatszik = false;
    }
    else if(wdlatszik == false)
    {
        div.style.display = 'none';
        wdlatszik = true;
    }

    var tid = document.getElementsByName("wid")[0].value = id;
    var string = document.getElementById("wname").innerText = "Biztos törölni akarja a(z) " + megnevezes + " nevű munkát?"
}

function messageOpen(id, felado, elerhetoseg, cimzett, szoveg, allapot) {
    var div = document.getElementById("uzenetmegtekint");
    if(uzlatszik == true)
    {
        div.style.display = 'block';
        uzlatszik = false;
    }
    else if(uzlatszik == false)
    {
        div.style.display = 'none';
        uzlatszik = true;
    }

    var tid = document.getElementsByName("uzid")[0].value = id;
    var felado = document.getElementsByName("felado")[0].value = felado;
    var elerhetoseg = document.getElementsByName("elerhetoseg")[0].value = elerhetoseg;
    var cimzett = document.getElementsByName("cimzett")[0].value = cimzett;
    var szoveg = document.getElementsByName("szoveg")[0].value = szoveg;
    if (allapot == "olvasatlan")
    {
        var allapot = document.getElementsByName("allapot")[0].value = "olvasott";
    }
}

function referenciaEdit(id, megnevezes, leiras, kepek) {
    console.log(kepek)
    var div = document.getElementById("refszerk");
    if(refszlatszik == true)
    {
        div.style.display = 'block';
        refszlatszik = false;
    }
    else if(refszlatszik == false)
    {
        div.style.display = 'none';
        refszlatszik = true;
    }

    var rid = document.getElementsByName("rid")[0].value = id;
    var rname = document.getElementsByName("rmegnevezes")[0].value = megnevezes;
    var rleiras = document.getElementsByName("rleiras")[0].value = leiras;
    var rkepek = document.getElementsByName("rkepek")[0].value = kepek;
}

function referenciaDelete(id, megnevezes) {
    var div = document.getElementById("refdelete");
    if(refdlatszik == true)
    {
        div.style.display = 'block';
        refdlatszik = false;
    }
    else if(refdlatszik == false)
    {
        div.style.display = 'none';
        refdlatszik = true;
    }

    var tid = document.getElementsByName("rid")[0].value = id;
    var string = document.getElementById("rname").innerText = "Biztos törölni akarja a(z) " + megnevezes + " nevű referenciát?"
}