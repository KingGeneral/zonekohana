$(document).ready(function(){

$('#btn-test1').click(function(event) {
    var test = '{"name":"John Johnson","street":"Oslo West 16","phone":"555 1234567"}'
    var testobj = JSON.parse(test);

    document.getElementById("test1").innerHTML = testobj.name + '-' + testobj.street + '-' + testobj.phone;
});


});