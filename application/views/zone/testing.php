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

        <!-- //experimental works\\ -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Menu Order</h2>

            <?php 
                $levelnext = [];
                foreach( $menuorder as $key => $val) {
                    array_push($levelnext,$val['levels']);
                }

                $loop = 0;
                $depthmenu = 0;
                $flaging=1;

                echo "<ol class='sortablemenu ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded'>";
                foreach( $menuorder as $key => $val) {
                    $plues = $key;
                    //start <ol> if have branch 
                    if ( $val['levels'] > $depthmenu ){
                        echo str_repeat( '<ol>', ( $val['levels'] - $depthmenu ) );
                    }

                    if ( $val['levels'] < $depthmenu ){
                        $x = $depthmenu - $val['levels'];
                        do{
                            if( $x == 1){
                                echo str_repeat( '</ol>', $x );
                                if($flaging==1 || ($val['levels']==0)){
                                    echo str_repeat( '</li>', $x );
                                    if(($plues < sizeof($levelnext)-1) && $levelnext[$plues+1] > $val['levels']) {
                                        $loop++;
                                        $flaging=1;
                                    }
                                    else{
                                        //maintaining </li> to close branch
                                        $flaging=0;
                                        if($loop < 1)
                                            $flaging=1;
                                        else if (($plues < sizeof($levelnext)-1) && $levelnext[$plues+1] == 0)
                                            $loop=0;
                                    }
                                }
                            }
                            else{
                                echo str_repeat( '</ol></li>', ($x-1) );
                                $x=2; //to loop 1 more time
                            }
                            $x--;
                        }while($x!=0);
                    }
                    
                    $depthmenu = $val['levels'];

                    if ( $val['levels'] == 0 && $depthmenu ==0 && $val['levels'] < $depthmenu){
                        echo '</li>';
                    }

                    //litext r1
                    echo '<li class="mjs-nestedSortable-leaf" id="menuItem_'.$val['id'].'" >
                            <div class="checkme" id="'.$val['menu'].'">'.$val['menu']."</div>";

                    if ($depthmenu == 0){
                        //litext reduced linked to r1
                        if(($plues < sizeof($levelnext)-1) && $levelnext[$plues+1] == 0){
                            echo '</li>';
                        }
                    }
                    else{
                        //litext reduced linked to r1
                        if(($plues < sizeof($levelnext)-1) && $val['levels'] < $levelnext[$plues+1] ){
                            $flaging=1;
                        }
                        else{
                            echo '</li>';
                        }
                    }
                }
                //FINAL closing <li> and <ol> based on depth
                if($depthmenu > 1){
                    echo str_repeat( '</ol></li>', $depthmenu-1 );
                    echo '</ol>';
                }else{ //for 0 and 1
                    echo str_repeat( '</ol>', $depthmenu );
                }
                echo '</li></ol>';
            ?>
        </div>
        <!-- \\experimental works// -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="results">
                    <a href="javascript:;" id="savedata">Save changes </a>
                    <p>Serialized</p>
                    <pre id="serializeOutput"></pre>
                    <p>Json - Hierarcy</p>
                    <pre id="HierarchyOutput"></pre>
                    <p>Json - Arraied - used in kohana</p>
                    <pre id="ArraiedOutput"></pre>
                    <div id="message" class="alert alert-info"> </div>
                </div> 
            </div>
        </div>

        <!--script-->
        <script type="text/javascript">
            var based_url = '<?php echo URL::base(TRUE); ?>';
        </script>

        <?php echo HTML::script('assets/js/jquery/jquery-1.12.4.js') ?>
        <?php echo HTML::script('assets/js/jquery/jquery-ui.min.js') ?>
        <?php echo HTML::script('assets/js/bootstrap-3.3.7-dist/js/bootstrap.js') ?>
        <?php echo HTML::script('assets/js/jquery.mjs.nestedSortable.js') ?>
        <?php echo HTML::script('assets/js/testsend.js') ?>
        
    </body>
</html>
