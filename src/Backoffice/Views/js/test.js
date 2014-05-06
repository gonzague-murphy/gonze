var i = 0;
var geocoder;
var map;

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

function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var mapOptions = {
    zoom: 16,
    center: latlng
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if(status === google.maps.GeocoderStatus.OK){
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


var tabbedContent = function(){
     $('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and it's associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');

    $content = $($active[0].hash);

    // Hide the remaining content
    $links.not($active).each(function () {
      $(this.hash).hide();
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
      // Make the old tab inactive.
      $active.removeClass('active');
      $content.hide();

      // Update the variables with the new link and content
      $active = $(this);
      $content = $(this.hash);

      // Make the tab active.
      $active.addClass('active');
      $content.show();

      // Prevent the anchor's default click action
      e.preventDefault();
    });
  });
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
        $("#galerie").load("?controller=ProduitController&action=triVille", valInput);
    });
};

var rechercheEtat = function(){
    $('#state').change(function(){
        var valInput = "etat="+$('.state').val();
        $("#galerie").load("?controller=ProduitController&action=triState", valInput);
    });
};

var toggleStats = function(){
    $('#stats h3').next('table').hide();
    $('#stats h3').click(function(){
        var el = $(this).next('table');
        check = el.is(':visible') ? el.slideUp() : ($('table').slideUp()) (el.slideDown());
    });
};

var launching = function(){
    $('#logMeIn').css({'display' : 'none'});
        $('#twoway').css({'height' : '100px'});
        $('#connexion').click(function(){
            $('#twoway').animate({'height' : '220px'}, 250, function(){
                $('#logMeIn').css({'display' : 'block'});
                $('#connexion').css({'display' : 'none'});
            
            });
        });
        
};

var succesLogin = function(){
    $.ajax({
        type : "GET",
        async : true,
        url : "?controller=DefaultController&action=indexDisplay"
    });
};

var loginSubmit = function(){
    $('#logMeIn').submit(function(event){
        event.preventDefault();
        $('#twoway').css({'height' : '100px'});
        var pseudo = $('#pseudo').val();
        var mdp = $('#mdp').val();
        //alert(pseudo);
        var dataString = 'pseudo=' + pseudo + '&mdp=' + mdp;
        $.ajax({
            type: "POST",
            async : true,
            url: "?controller=MembreController&action=lanceLogin",
            data: dataString,
            success : function(){
                $(document).load("?controller=DefaultController&action=makeMenu", function(){
                alert("All es klar");
                });
            }
        });
    });
};

var closeMe = function(){
    parent.$.fn.colorbox.close();
};

var colorBoxLogin = function(){
    $('a.flyLogin').colorbox({iframe : true, href:"?controller=MembreController&action=justLogin", onClosed:function(){ location.reload(true); }});
    $('form.flyLogin').submit(closeMe());
 };


var searchForm = function(){
    $('#loupe').click(function(){
        $('.tripleSearch').toggle("fast", function(){});
    });
};

var carouselArrows = function(){
    var unslider = $('.carousel').unslider({
        speed: 500,               //  The speed to animate each slide (in milliseconds)
        delay: 3000
    });
    
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
        unslider.data('unslider')[fn]();
    });
};


var x = function(){
        tabbedContent();
        colorBoxLogin();
        searchForm();
        $(".dateGen").datetimepicker({format:'d-m-Y H:i:s'});
        $('a.signUp').colorbox({href:"/lokisalle/src/Backoffice/Views/contenu/Membre/formsignup.php"});
        rechercheAjax();
        rechercheEtat();
        toggleStats();
        carouselArrows();
        initialize();
        codeAddress();
    };




