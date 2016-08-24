<?php defined('SYSPATH') or die('No direct script access.');

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
