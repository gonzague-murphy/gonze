var x = function(){
        $('#galerie').fadeIn(1800, function(){
        });
        $('#loupe input').focus(function(){
            //alert('hello');
            $(this).animate({'width' : '20%'}, 280, function(){
                //alert("hello!");
            });
        });
            };

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

var searchBox = function(){
    
}




