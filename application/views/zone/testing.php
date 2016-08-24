<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<html>
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap -->
        <?php echo HTML::style('assets/js/bootstrap-3.3.7-dist/css/bootstrap.css') ?>
        <!-- css -->
        <?php echo HTML::style('assets/css/style.css');?>
        <title>CD Collection !!</title>
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.js"></script>
    </head>
    <body>
        <h1>Testing Menu</h1>

        <div id="add">
        <?php
            echo Form::open('menu');
            echo Form::label('Menu','Menu : ');
            echo Form::input('menuadd',$posted['menuadd'], array('type' => 'text'));
            echo Form::submit('submit','Add');
            echo Form::close();
        ?>
        </div>

        <div id="menu" class="wrapper">
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <table id="table-menu" class="table">
                    <thead>
                        <tr>
                            <th>ID-Menu</th>
                            <th>Order</th>
                            <th>Levels</th>
                            <th>Parents</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach ($menuorder as $key => $val) :
                    ?>
                        <tr>
                            <td><?php echo '['.$val['id'].']-'.$val['menu'] ?></td>
                            <td><?php echo $val['orderlist'] ?></td>
                            <td><?php echo $val['levels'] ?></td>
                            <td><?php echo $val['parents'] ?></td>
                        </tr>
                    <?php
                        endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <table id="table-parent-detail" class="table md-2" >
                    <thead>
                        <tr>
                            <th colspan="2" class="center" >INFO</th>
                        </tr>
                        <tr>
                            <th class="center">id</th>
                            <th class="center">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="center">
                    <?php 
                        foreach ($menuid as $key => $val) :
                    ?>
                        <tr>
                            <td><?php echo $val['id'] ?></td>
                            <td><?php echo $val['menu'] ?></td>
                        </tr>
                    <?php
                        endforeach;
                    ?>
                    </tbody>
                </table>
            </div>


        <!-- // experimental works - list from if else PHP\\ -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 10px;background-color: #ECF0F1;">
            <h2>Menu Order - Sort Menu</h2>
            <?php 
                echo $calllist;
            ?>
            <button type="button" class="btn btn-primary" id="savedata">Save Changes</button>
            <div id="message" class="alert alert-info"> </div>
        </div>
        <!-- \\ end experimental works // -->

        <!-- // experimental works version 2 - list from json \\-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: 10px;">
            <button type="button" class="btn btn-primary" id="btn-test5" >JSON Call</button> <!-- style="display: none;" -->
            <span>Json - call (from jsontest.js)</span>
            <pre id="test5"></pre>
        </div>
        <!-- \\ end experimental works // -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="results">
                    <!-- <a href="javascript:;" id="savedata">Save changes </a> -->
                    <p>Serialized</p>
                    <pre id="serializeOutput"></pre>
                    <p>Json - Hierarcy</p>
                    <pre id="HierarchyOutput"></pre>
                    <p>Json - Arraied - used in kohana</p>
                    <pre id="ArraiedOutput"></pre>
                </div> 
            </div>
        </div>

        <!--script-->
        <?php echo HTML::script('assets/js/jquery/jquery-1.12.4.js') ?>
        <?php echo HTML::script('assets/js/jquery/jquery-ui.min.js') ?>
        <?php echo HTML::script('assets/js/bootstrap-3.3.7-dist/js/bootstrap.js') ?>
        <script type="text/javascript">
            var based_url = '<?php echo URL::base(TRUE); ?>';
        </script>
        <?php echo HTML::script('assets/js/jquery.mjs.nestedSortable.js') ?>
        <?php echo HTML::script('assets/js/testsend.js') ?>
        <?php echo HTML::script('assets/js/testjsonjs.js') ?>

<!--         <script type="text/javascript">
        $(document).ready(function(){
            $("#savedata").click(function(){
                //$("").trigger( "click" );
                $("#btn-test5").trigger( "click" );
            });
        });
        </script> -->

        
    </body>
</html>
