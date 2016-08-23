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
                var json_objs = response;

                $.each(json_objs.menus, function(i, obj) {
                    json_objs["menus"][i].children = []; //push children varArr
                    json_objs["menus"][i]["id"] = parseInt(json_objs["menus"][i]["id"]); //convert String to int
                    json_objs["menus"][i]["parents"] = parseInt(json_objs["menus"][i]["parents"]); //convert String to int
                });

                //nested push children
                var db_id = {}, node, tree = [], list = $('<ol class="sortablemenu ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded"></ol>');
                for (var i = 0; i < json_objs.menus.length; i += 1) {
                    node = json_objs.menus[i]; //path
                    db_id[node.id] = i; // parents
                    if (node.parents !== 0) {
                        json_objs.menus[db_id[node.parents]].children.push(node);
                    } else {
                        tree.push(node);
                    }
                }
                processTree(tree, list);
                list.appendTo(document.getElementById("test5"));
            }
        });
    });//test5

    function processTree(node, list) {
    
        if($.isArray(node)){
            $.each(node, function (key, value) {
                processTree(value, list);
            });
            return;
        }

        if(node){
            var li = $('<li />');
            if(node.menu){
                li.append($('<div class="checkme" id="'+node.menu+'">' + node.menu + '</div>'))
                .attr('id', 'menuItem_'+node.id)
                .addClass( "mjs-nestedSortable-leaf" );
            }
            if(node.children && node.children.length){
                var ol = $("<ol/>");
                processTree(node.children, ol);
                li.append(ol);
            }
            list.append(li);
        }
    }//processTree
});