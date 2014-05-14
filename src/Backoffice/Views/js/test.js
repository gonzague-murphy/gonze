var i = 0;
var geocoder;
var map;
var konami_keys = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
var konami_index = 0;
var areUReady = false;

document.onreadystatechange = function () {
  if(document.readyState == "complete") {
      return areUReady = true;
  }
};

/*Empeche l'utilisateur de cliquer sur le lien tant que la page n'est pas chargée*/
$('a.signUp').click(function(){
        return areUReady;
   });
$('a.flyLogin').click(function(){
        return areUReady;
   });

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


var rechercheAjax = function(){
    $('.town').change(function(){
        var valInput = "ville="+$('.town').val();
        $("#galerie").load("?controller=ProduitController&action=triVille", valInput);
    });
};

var chiffreA = function(){
    var valInput = $('#annee').val();
    $.get( "index.php?controller=CommandeController&action=CaAdd&year="+valInput, function( data ) {
        $('.result').html(data);
        });
    $('#annee').change(function(){
        var valInput = $('#annee').val();
        $.get( "index.php?controller=CommandeController&action=CaAdd&year="+valInput, function( data ) {
        $('.result').html(data);
        });
    });
};

var montrerLesStats = function(){
    $('.clickable').siblings('table').hide();
    $('.clickable').click(function(){
        var el = $(this).next('table');
        alert($(this));
        check = el.is(':visible') ? el.slideUp() : ($(this).slideUp()) (el.slideDown());
    });
    };
    

var toggleOrders = function(){
    $('.fullDetails').nextAll('table').hide();
    $('.fullDetails').click(function(){
        var el = $(this).nextAll('table');
        check = el.is(':visible') ? el.slideUp() : ($('table').slideUp()) (el.slideDown());
    });
};


var closeMe = function(){
    parent.$.fn.colorbox.close();
};

var colorBoxLogin = function(){
    $('a.flyLogin').colorbox({iframe : true, href:"?controller=MembreController&action=justLogin", height : "335px", width : "315px", scrolling : false, left: "496px", onClosed:function(){ 
            location.reload(true); 
        }, onOpen : function(){
            $('#colorbox,#cboxOverlay,#cboxWrapper').css('z-index', '4000');
            $('body').append('<div class="overlay"></div>');
        }});
    $('form.flyLogin').submit(closeMe());
 };
 
 var colorBoxSignUp = function(){
    $('a.signUp').colorbox({
        iframe : true, 
        href:"?controller=MembreController&action=justSignUp", 
        scrolling : true, 
        left: "496px", 
        top : "7%",
        height : "865px",
        width : "360px",
        onOpen : function(){
            $('#colorbox,#cboxOverlay,#cboxWrapper').css('z-index', '4000');
            $('body').append('<div class="overlay"></div>');
        },
        onClosed:function(){ 
            location.reload(true); 
    }});
    $('form.sign').submit(closeMe());
};


var searchForm = function(){
    $('#loupe').click(function(){
        $('.tripleSearch').toggle("fast", function(){});
    });
};

var carouselArrows = function(){
    var unslider = $('.carousel').unslider({
        speed: 500,          
        delay: 3000
    });
    
    $('.unslider-arrow').click(function() {
        var fn = this.className.split(' ')[1];
        unslider.data('unslider')[fn]();
    });
};

var earlyEaster = function(){
    $(document).keydown(function(e){
    if(e.keyCode === konami_keys[konami_index++]){
        if(konami_index === konami_keys.length){
            $('body').append('<div class="easter"></div>');
            $('.overlay').append(document.createTextNode("WOW SUCH PHP"));
        }
    }
    else{
        konami_index = 0;
    }
});
};

var x = function(){
        tabbedContent();
        colorBoxLogin();
        colorBoxSignUp();
        earlyEaster();
        searchForm();
        $(".dateGen").datetimepicker({format:'d-m-Y H:i:s'});
        rechercheAjax();
        chiffreA();
        toggleOrders();
        carouselArrows();
        initialize();
        codeAddress();
    };




