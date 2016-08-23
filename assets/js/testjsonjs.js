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

    $('#btn-test5').one("click",function(event){
        event.preventDefault();

        $.ajax({
            type:"POST",
            url: based_url +"jsontest/getjsonlist",
            dataType:"json",
            success: function(response){
                //console.log(response);
                
                //to make it json again
                // var json_object = response['menus'];
                // console.log(json_object);

                //to make it still array
                var json_objs = response;
                console.log(json_objs);

                // individual parse Int
                // json_objs["menus"][0]["parents"] = parseInt(json_objs["menus"][0]["parents"]);
                $.each(json_objs.menus, function(i, obj) { 
                    json_objs["menus"][i]["parents"] = parseInt(json_objs["menus"][i]["parents"]);
                });

                //add children
                var objDict = json_objs.menus.reduce(function(p,c) {
                    p[c.id] = c;
                    c.children = [];
                    return p;
                }, {});

                //push children from 2 json
                var tree = json_objs.menus.reduce(function(p,c) {
                    if (!c.parents) {
                        p = c;
                    }
                    else {
                        objDict[c.parents].children.push(c);
                    }
                    return p;
                }, {});

                console.log(tree);
                processTree(tree, document.getElementById("test5"),0);
            }
        });
    });//test5

    function processTree(node, element , index) {
        //element inside li
        var div = document.createElement('div');
            div.className = "checkme"; //for checking depth
            div.id = node.menu; //json var
            div.innerHTML = node.menu; //json var

        //li
        var li = document.createElement('li');
            li.className = "mjs-nestedSortable-leaf"; //sortable plugin
            li.id = "menuItem_"+node.id; //json var
            li.appendChild(div);

        element.appendChild(li);

        if (node.children.length) {
            var ol = document.createElement('ol');
            li.appendChild(ol);
            for (var i = 0; i < node.children.length; i++) {
              processTree(node.children[i], ol);
            }
        }

        //kesalahan di tree bkn disini
        // if (node.children.length === 0) {
        //     console.log('a');
        // }
    }

});