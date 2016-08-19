$(document).ready(function(){
  //hide information message
  $('#message').hide();

  $('ol.sortablemenu').nestedSortable({
    //forcePlaceholderSize: true,
    handle: 'div',
    helper: 'clone',
    items: 'li',
    opacity: .6,
    placeholder: 'placeholder',
    //revert: 250,
    //tabSize: 25,
    tolerance: 'pointer',
    toleranceElement: '> div',
    maxLevels: 0,
    isTree: true,
    rootID: '0',
    //expandOnHover: 700,
    //startCollapsed: false,
    // handle: 'div',
    // items: 'li',
    // toleranceElement: '> div',
    update: function(){
      $('#message').html('Order Changed')
        .removeClass("alert-success")
        .addClass("alert-info")
        .show();
    }
  });

  //button
  $('#savedata').click(function(event) {
    //blocking next page
    event.preventDefault();

    // //detect parent / root
    // $('ol#sortablemenu > li > div').css({
    //   color: 'green'
    // });

    // //detect child until end
    // $('ol#sortablemenu li ol').children('li').css({
    //   color: 'blue'
    // });

    //check depth
    var levels = [];
    var menuname = [];
    $('.checkme').each(function()
    {
        levels.push(($(this).parents("ol").length)-1);
        menuname.push($(this).attr('id'));
    });
    console.log(levels);
    console.log(menuname);

    serialized = $('ol.sortablemenu').nestedSortable('serialize');
    $("#serializeOutput").html(JSON.stringify(serialized));

    hiered = $('ol.sortablemenu').nestedSortable('toHierarchy', {startDepthCount: 0});
    $("#HierarchyOutput").html(JSON.stringify(hiered));
console.log(hiered);

    arraied = $('ol.sortablemenu').nestedSortable('toArray', {startDepthCount: 0});
    $("#ArraiedOutput").html(JSON.stringify(arraied));
    arraiedjson = JSON.stringify(arraied);

    $.ajax({
        type: "POST",
        url: based_url+'menu/updatemenuorder',
        data: {levels:levels,menuname:menuname, jsonparent: arraiedjson},
        success: function(data) {
          //refresh table-menu after update
          $("#table-menu").load(location.href + " #table-menu");
          //info
          alert(data);
        }
    });

    //success then change css to green
    $('#message').show().html("Saved to DB").removeClass("alert-info").addClass("alert-success"); 
  });

});