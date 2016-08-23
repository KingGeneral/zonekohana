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
        console.log(testArray);

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

    $('#btn-test4').click(function(event){
        event.preventDefault();

        $.ajax({
            type:"POST",
            url: based_url + "jsontest/getjsonmenu",
            dataType:"json",
            success: function(response){

                console.log(response);
            }
        });
    });

    $('#btn-test5').click(function(event){
        event.preventDefault();

        $.ajax({
            type:"POST",
            url: based_url +"jsontest/getjsonlist",
            dataType:"json",
            success: function(response){
                console.log(response);
            }
        });

    });

    //experimental - start
                // var json_objs = $.parseJSON(response);
                // console.log(json_objs);

                // var json_objs = JSON.parse(test);
                // console.log(json_objs);
                //console.log(json_objs);
                //alert(json_objs);

                //var json_objsk = $.parseJSON(response);
                //var  json_yolo = $.parseJSON(response);  


    // var json_objs = 
    // {
    //   menus: [{
    //     "id": 1,
    //     "menu": "Home",
    //     "parents": 0
    //   }, {
    //     "id": 8,
    //     "menu": "teshoho",
    //     "parents": 0
    //   }, {
    //     "id": 3,
    //     "menu": "Support",
    //     "parents": 8
    //   }, {
    //     "id": 5,
    //     "menu": "FAQ",
    //     "parents": 3
    //   }, {
    //     "id": 4,
    //     "menu": "Contact",
    //     "parents": 3
    //   }, {
    //     "id": 6,
    //     "menu": "testme",
    //     "parents": 4
    //   }, {
    //     "id": 7,
    //     "menu": "aaaa",
    //     "parents": 6
    //   }, {
    //     "id": 2,
    //     "menu": "About",
    //     "parents": 3
    //   }]
    // }

                //console.log(json_objs);
                //var x = json_objs.replaceAll("(\\d+)","\"$1\"");
                //console.log(x);

                // var json_objs = {
                //     menus: [
                //     {"id":"1","menu":"Home","orderlist":"0","levels":"0","parents":"0"},
                //     {"id":"8","menu":"teshoho","orderlist":"1","levels":"0","parents":"0"},
                //     {"id":"3","menu":"Support","orderlist":"2","levels":"1","parents":"8"},
                //     {"id":"5","menu":"FAQ","orderlist":"3","levels":"2","parents":"3"},
                //     {"id":"4","menu":"Contact","orderlist":"4","levels":"2","parents":"3"},
                //     {"id":"6","menu":"testme","orderlist":"5","levels":"3","parents":"4"},
                //     {"id":"7","menu":"aaaa","orderlist":"6","levels":"4","parents":"6"},
                //     {"id":"2","menu":"About","orderlist":"7","levels":"2","parents":"3"}]
                // }
 

                //var json_objs = $.parseJSON(response);
                //console.log(json_objs);
                //var json_objs1 = $.parseJSON(json_objs);
                //console.log(json_objs1);

                // var json_objs1 = JSON.stringify(json_objs);
                // console.log(json_objs1);

    // var objDict = json_objs.menus.reduce(function(p,c) {
    //     p[c.id] = c;
    //     c.children = [];
    //     return p;
    // }, {});

    // console.log(objDict);
    // console.log(json_objs);

    // var tree = json_objs.menus.reduce(function(p,c) {
    //     if (!c.parents) {
    //         p = c;
    //     }
    //     else {
    //         objDict[c.parents].children.push(c);
    //     }
    //     return p;
    // }, {});
    // console.log(tree);
//end of


});