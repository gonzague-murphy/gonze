var x = function(){
        $('#galerie').fadeIn(1800, function(){
        });
        
            };

var i = 0;

var breathLeft = function(){
    if(i%2 || i==0){
        $('h1').animate({'marginLeft' : "17.5%"}, 280, function(){});
        $('#mainMenu').animate({'marginLeft' : '16.1%'}, 280, function(){});
        $('#content').animate({'marginLeft' : '9.8%'}, 280, function(){});
        $('#admin_menu').fadeIn('fast', function(){});
        i++;
    }
    else{
        $('h1').animate({'marginLeft' : "6.5%"}, 250, function(){});
        $('#mainMenu').animate({'marginLeft' : '5%'}, 250, function(){});
        $('#content').animate({'marginLeft' : '0'}, 250, function(){});
        $('#admin_menu').fadeOut(50, function(){});
        i++;
    }
};


