$(document).ready(function(){

    $('#btn-test1').click(function(){
        var test = '{"name":"John Johnson","street":"Oslo West 16","phone":"555 1234567"}'
        var testobj = JSON.parse(test);

        document.getElementById("test1").innerHTML = testobj.name + '-' + testobj.street + '-' + testobj.phone;
    });

    $('#btn-test2').click(function(){
        var testArray = [
            {
            "name" : "John",
            "street" : "Doe",
            "phone" : "555 1234567"
            },
            {
            "name" : "Anna",
            "street" : "Tram",
            "phone" : "532 1233333"
            },
            {
            "name" : "Poet",
            "street" : "Era",
            "phone" : "125 1877977"
            }
        ];

        document.getElementById("test2").innerHTML = 
            testArray[0].name + '-' + testArray[0].street + '-' + testArray[0].phone+ '<br/>'
            +testArray[1].name + '-' + testArray[1].street + '-' + testArray[1].phone+ '<br/>'
            +testArray[2].name + '-' + testArray[2].street + '-' + testArray[2].phone+ '<br/>';
    });

    $('#btn-test3').click(function(event){
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: based_url+'jsontest/getjsonorder',
            success : function(response){
                // alert(data),
                //console.log(response);
                //var json_obj = response;
                //console.log(json_obj);
                //var  json_objs = $.parseJSON(json_obj);
                var  json_objs = $.parseJSON(response);
                console.log(json_objs);
                document.getElementById("test3").innerHTML = 
                json_objs[0].name + '-' + json_objs[0].street + '-' + json_objs[0].phone+ '<br/>'
                +json_objs[1].name + '-' + json_objs[1].street + '-' + json_objs[1].phone+ '<br/>'
                +json_objs[2].name + '-' + json_objs[2].street + '-' + json_objs[2].phone+ '<br/>';
            }
        });
    });

});