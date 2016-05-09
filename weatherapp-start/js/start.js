/*---------------------WEER GEDEELTE----------------------*/
/*global  $, Skycons*/

//http://www.w3schools.com/html/html5_geolocation.asp

//use strict --> self starting anonymous function (tegen conflicten om wille van de namen van de variabelen en de functienamen)
var date = new Date();
var weekday = new Array(7);

weekday[0] = "Maandag";
weekday[1] = "Dinsdag";
weekday[2] = "Woensdag";
weekday[3] = "Donderdag";
weekday[4] = "Vrijdag";
weekday[5] = "Zaterdag";
weekday[6]=  "Zondag";

var today = weekday[date.getDay()];
       
switch(today) {
                case "Maandag":
                    document.getElementsByClassName("2edag")[0].innerHTML =weekday[1];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("5edag")[0].innerHTML = weekday[4];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[0];
                    break;
                case "Dinsdag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[3];                        document.getElementsByClassName("4edag")[0].innerHTML = weekday[4];                            document.getElementsByClassName("5edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[0];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[1];
                    break;
                case "Woensdag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[4];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("5edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[0];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[1];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[2];
                    break;
                case "Donderdag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[4];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("5edag")[0].innerHTML = weekday[1];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[4];
                    break;
                case "Vrijdag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[0];                        document.getElementsByClassName("5edag")[0].innerHTML = weekday[1];                            document.getElementsByClassName("6edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[4];
                    break;
                case "Zaterdag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[6];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[0];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[1];
                    document.getElementsByClassName("5edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[4];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[5];
                    break;
                case "Zondag":
                    document.getElementsByClassName("2edag")[0].innerHTML = weekday[0];
                    document.getElementsByClassName("3edag")[0].innerHTML = weekday[1];
                    document.getElementsByClassName("4edag")[0].innerHTML = weekday[2];
                    document.getElementsByClassName("5edag")[0].innerHTML = weekday[3];
                    document.getElementsByClassName("6edag")[0].innerHTML = weekday[4];
                    document.getElementsByClassName("7edag")[0].innerHTML = weekday[5];
                    document.getElementsByClassName("8edag")[0].innerHTML = weekday[6];
                    break;
                                
                }

(function () {
    'use strict'; //variabele moeten gedeclareerd worden (niet gewoon "x=3" schrijven, er moet "var" voor staan)
    
    var App = {
        
        //API key via www.developer.forecast.io
    // 43341e06f28a08f06c67ab38bed6ddcb (bijvoobeeld)
    //zelf API bouwen is niet interessant, omdat we dan er voor zorgen dat niet iemand onze API plat legt door deze massaal te gebruiken
        APIKEY: "43341e06f28a08f06c67ab38bed6ddcb",
        lat: "",
        lng: "",
        
        init: function () {
            //kickstart the App!
            App.getLocation();
        },
        getLocation: function () {
            //get the current user position
            navigator.geolocation.getCurrentPosition(App.foundPosition);
        },
        foundPosition: function (pos) {
            //found the current user position
            App.lat = pos.coords.latitude;
            App.lng = pos.coords.longitude;
            App.getWeather();
            
        },
        getWeather: function () {
            //get the current weather for my location
            var url = "https://api.forecast.io/forecast/" + App.APIKEY + "/" + App.lat + "," + App.lng;
            
            //JSONP
            window.jQuery.ajax({
                url: url,
                dataType: "jsonp",
                success: function (data) {
                    console.log(data);
                    $(".weather-summary0").text(data.currently.summary);
                    $(".weather-summary1").text(data.daily.data[1].summary);
                    $(".weather-summary2").text(data.daily.data[2].summary);
                    $(".weather-summary3").text(data.daily.data[3].summary);
                    $(".weather-summary4").text(data.daily.data[4].summary);
                    $(".weather-summary5").text(data.daily.data[5].summary);
                    $(".weather-summary6").text(data.daily.data[6].summary);
                    $(".weather-summary7").text(data.daily.data[7].summary);
                    
                    
                    /*temperaturen toekennen aan verschillende dagen*/ 
                    $(".temp0").text((((data.currently.apparentTemperature)-32)*5/9).toFixed(0)+ " °C") ;
                    $(".temp1").text((((data.daily.data[1].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                            
                    $(".temp2").text((((data.daily.data[2].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                        
                    $(".temp3").text((((data.daily.data[3].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                            
                    $(".temp4").text((((data.daily.data[4].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                            
                    $(".temp5").text((((data.daily.data[5].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                            
                    $(".temp6").text((((data.daily.data[6].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                            
                    $(".temp7").text((((data.daily.data[7].apparentTemperatureMax)-32)*5/9).toFixed(0)+ " °C");
                                                                                
                    
                    
                    
                    var skycons = new Skycons({"color": "Red"});
                    skycons.add("weather-icon", data.currently.icon);
                    skycons.play();
                }
            });
            
        }
    };
    
/*-------------------------Animaties----------------------------*/    
    
    $( document ).ready(function() {
    $(".autokeuze").hover(function() {
        $(this).css('cursor','pointer');
    });
    
    $("#BMW").on("click",function(){
        $(".background").css("background-image", "url(images/BMW.jpg)"); 
        $("#vraag").slideUp();
        $(".autokeuze").slideUp();
        $("nav").slideDown();
        $("#WEER").slideDown();
        App.init();
    });
    
    $("#MERCEDES").on("click",function(){
        $(".background").css("background-image", "url(images/MERCEDES.jpg)");
        $("#vraag").slideUp();
        $(".autokeuze").slideUp();
        $("nav").slideDown();
        $("#WEER").slideDown();
        App.init();
    });
    
    $("#MCLAREN").on("click",function(){
        $(".background").css("background-image", "url(images/MCLAREN.jpg)"); 
        $("#vraag").slideUp();
        $(".autokeuze").slideUp();
        $("nav").slideDown();
        $("#WEER").slideDown();
        App.init();
    });
});
    
    /*App.init();*/
   
    
    
    
}());