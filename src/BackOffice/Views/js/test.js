var i = 0;

var breathLeft = function(){
    if(i%2 || i==0){
        $('h1').animate({'marginLeft' : "17.5%"}, 280, function(){});
        $('#mainMenu').animate({'marginLeft' : '16.1%'}, 280, function(){});
        $('#content').animate({'marginLeft' : '15.3%'}, 280, function(){});
        $('#admin_menu').fadeIn('fast', function(){});
        i++;
    }
    else{
        $('h1').animate({'marginLeft' : "6.5%"}, 250, function(){});
        $('#mainMenu').animate({'marginLeft' : '5%'}, 250, function(){});
        $('#content').animate({'marginLeft' : '5.5%'}, 250, function(){});
        $('#admin_menu').fadeOut(50, function(){});
        i++;
    }
};

//Hover sur salles de page d'accueil
var accueil = function(){
    $('.boxArticle').hover(function(){
        $quelleBox = "#box" + ($(this).index() + 1).toString();
        //alert($quelleBox);
        $($quelleBox).find('.desc').fadeIn('fast', function(){});
    }, function(){
        $quelleBox = "#box" + ($(this).index() + 1).toString();
        //alert($quelleBox);
        $($quelleBox).find('.desc').fadeOut('fast', function(){});
    });
};

var rechercheAjax = function(){
    $('.town').change(function(){
        var valInput = "ville="+$('.town').val();
        $("#galerie").load("index.php?controller=ProduitController&action=triVille", valInput);
    });
};

var launching = function(){
    $('#logMeIn').css({'display' : 'none'});
        $('.user_menu ul').prepend("<li id='connexion'>Connexion </li>");
        $('#twoway').css({'height' : '100px'});
        $('#connexion').click(function(){
            $('#twoway').animate({'height' : '210px'}, 250, function(){
                $('#logMeIn').css({'display' : 'block'});
                $('#connexion').css({'display' : 'none'});
            });
        });
        
};

var loginSubmit = function(){
    $('#logMeIn').submit(function(event){
        /*var pseudo = $('#pseudo').val();
        var mdp = $('#mdp').val();
        //alert(pseudo);
        var dataString = 'pseudo=' + pseudo + '&mdp=' + mdp;
        $.ajax({
            type: "POST",
            url: "index.php?controller=MembreController&action=lanceLogin",
            data: dataString
        });*/
        event.preventDefault();
    });
}

var x = function(){
        launching();
        loginSubmit();
        $(".dateGen").datetimepicker({format:'d-m-Y H:i:s'});
        $('#galerie').fadeIn(1800, function(){
        });
        accueil();
        $('#loupe input').focus(function(){
            //alert('hello');
            $(this).animate({'width' : '20%'}, 280, function(){
                //alert("hello!");
            });
        });
        rechercheAjax();
    };




