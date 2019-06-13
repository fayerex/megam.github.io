var url = "test.php";
var shipping = 6.99;
var total;
var years = 0.05;
var data = 5.5;
var sms = 5.5;
var quantity = 1; 


$(function() {
  var hash = window.location.hash;
  if(hash == "#buy"){
    ShowForm();
    $('html, body').animate({
      scrollTop: $("#buy").offset().top - 80
    });
  }
});
var input1;
function Slider1(){
 input1 = "10";
 switch($("#years").val()){
  case "1": input1 = "5"; years = 1; break;
  case "2": input1 = "10"; years = 0.05; break;
  case "3": input1 = "15"; years = 0.1; break;
}
$("#yearsLbl").val(input1);
Calculate();
}
var input2;
function Slider2(){
  input2 = "1 GB";
  switch($("#data").val()){
    case "1": input2 = "500 MB"; data =  3.5; break;
    case "2": input2 = "1 GB"; data = 5.5; break;
    case "3": input2 = "2 GB"; data = 8.5; break;
  }
  $("#dataLbl").val(input2);
  Calculate();
}
var input3;
function Slider3(){
  input3 = "500";
  switch($("#sms").val()){
    case "1": input3 = "100"; sms =  3.5; break;
    case "2": input3 = "250"; sms = 5.5; break;
    case "3": input3 = "500"; sms = 8.5; break;
  }
  $("#smsLbl").val(input3);
  Calculate();
}

function changeQuantity(){
  quantity = $("#quantity").val();
  Calculate();
}
var calc;
function Calculate(){
  calc = ((data + sms)*years);
  if (years>=1) {
  calc = (data + sms)*quantity;}
  else{
   calc = (data + sms-calc)*quantity;
  }
  $("#price").html(calc.toFixed(2));
}

function ShowForm(){
  $("#about").slideUp();
  $("#services").slideDown();
}    
function HideForm(){
  $("#services").slideUp();
  $("#about").slideDown();
}

function ShowShipping(){
  Slider1();
  Slider2();
  Slider3();
  $("#Plan").slideUp();
  $("#Shipping").slideDown();
  $("#buy-plan").css("color","#c7c7c7")
  $("#buy-shipping").css("color","black")
}
function BackShipping(){
  $("#Shipping").slideUp();
  $("#Plan").slideDown();
  $("#buy-shipping").css("color","#c7c7c7")
  $("#buy-plan").css("color","black")
}
function ShowCheckout(){
  var isValid = true;
  $('input,textarea,select').filter('[required]:visible').each(function() {
    if ( $(this).val() === '' )
     isValid = false;
 });
  if(isValid){ 
    saveData();
    $("#Shipping").slideUp();
    $("#Checkout").slideDown();
    $("#buy-shipping").css("color","#c7c7c7")
    $("#buy-checkout").css("color","black")
    showData();
  }
}
function BackCheckout(){
  $("#Checkout").slideUp();
  $("#Shipping").slideDown();
  $("#buy-checkout").css("color","#c7c7c7")
  $("#buy-shipping").css("color","black")
}

var company;

var name;
var surname;
var street;
var number;
var address2;
var zip;
var town;
var place;

var total;

function saveData(){
  company = $("#company").val();
  
  name = $("#name").val();
  surname = $("#surname").val();
  street = $("#street").val();
  number = $("#number").val();
  address2 = $("#address2").val();
  zip = $("#zip").val();
  town = $("#city").val();
  place = $("#country").val();
}

function showData(){
  if (quantity>=10) {
  shipping = 0;
  total = calc ;
  var vat = 22 * total / 100;}
  else{
  total = calc + shipping;
  var vat = 22 * total / 100;
}
  $("#Q_Years").html(input1);
  $("#Q_Data").html(input2);
  $("#Q_SMS").html(input3);
  $("#Q_Quantity").html(quantity);
  $("#Q_Price").html(calc.toFixed(2));
  $("#Q_Shipping").html(shipping);

  $("#Q_VAT").html(vat.toFixed(2));

  total += vat;

  $("#Q_Total").html(total.toFixed(2));
  showAddressData();
}

function showAddressData(){
  if(company == "") $(".companyLbl").html("/");
  else $(".companyLbl").html(company);
  
  $(".nameLbl").html(name);
  $(".surnameLbl").html(surname);
  $(".streetLbl").html(street);
  $(".numberLbl").html(number);
  if(address2 == "") $(".address2Lbl").html("/");
  else $(".address2Lbl").html(address2);
  $(".zipLbl").html(zip);
  $(".cityLbl").html(town);
  $(".countryLbl").html(place);
}
function load(){
      window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 1);

        function submitform(){
    vnos();
        document.forms["myForm"].submit();
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 100 );
        }
    }
}
function Purchase(){
  var isValid = true;
  $('input,textarea,select').filter('[required]:visible').each(function() {
    if ( $(this).val() === '' )
     isValid = false;
 });

  if(isValid){
    $.post( url, { 
    //Shipping & Billing info
    
    First_name: name, 
    Last_name: surname,
    Organization: company,
    Address: street,
    St_number: number,
    Address_2: address2,
    Zip_code: zip,
    City: town,
    Country: place,
    //Purchase info
    Years: years,
    Data: data,
    SMS: sms,
    Quantity: quantity,
    Price: total.toFixed(2),
    //Card info
    Card_name: $("#cname").val(),
    Card_num: $("#ccnum").val(),
    Exp_month: $("#expmonth").val(),
    Exp_year: $("#expyear").val(),
    CVV: $("#cvv").val(),

  })
    .done(function(info) {
      alert( "Data returned: " + info );
load();    location.href = "load.php";

    });
  }

}
