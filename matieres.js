$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel("pause");
  
    // Go to the previous item
    $("#myBtn").click(function(){
      $("#myCarousel").carousel("prev");
    });
  
    // Go to the next item
    $("#myBtn2").click(function(){
      $("#myCarousel").carousel("next");
    });
      
    // Enable Carousel Indicators
    $(".item1").click(function(){
      $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
      $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
      $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
      $("#myCarousel").carousel(3);
    });
    $(".item5").click(function(){
      $("#myCarousel").carousel(4);
    });
    $(".item6").click(function(){
      $("#myCarousel").carousel(5);
    });
      
    // Enable Carousel Controls
    $(".left").click(function(){
      $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
      $("#myCarousel").carousel("next");
    });
  });