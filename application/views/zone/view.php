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
    </head>
    <body>
    <h1>View</h1>
    	<br/>

        <div id="sort">
            <table>
                <tr>
                    <th>Sort By</th>
                    <th>
                    <?php 
                        $option = array(
                            '' => 'Select a person', 
                            '1' => 'ID',
                            '2' => 'Name',
                            '3' => 'Product',
                            '4' => 'Quantity',
                            '5' => 'Created time',
                            '6' => 'Last Update'
                        );

                        echo form::open('form'); 
                        echo form::select('sort', $option,$sortindex, null);
                        echo form::radio('asc',1,$order,null).'A-Z';
                        echo form::radio('asc',0,$order2,null).'Z-A';
                        echo form::submit('sumbit', 'Sort');
                        echo form::close();
                    ?>
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="txtHint" style="color: #ddd;"><b>Person info will be listed here.</b></div>
                    </td>
                </tr>
            </table>
        
            <table>
                <tr>
                    <td colspan="8">
                        <?php echo HTML::anchor('form/insert','Insert Data');?>
                    </td>
                </tr>
            	<tr>
                	<th>Id</th>
                    <th>Username</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Created</th>
                    <th>Last Update</th>
                    <th colspan="2">Action</th>
                </tr>
            <?php 
    			foreach ($users as $key => $val):
    		?>
            	<tr>
                	<td><?php echo $val['id']; ?></td>
                    <td><?php echo $val['username']; ?></td>
                    <td><?php echo $val['product']; ?></td>
                    <td><?php echo $val['quantity']; ?></td>
                    <td><?php echo $val['created_at']; ?></td>
                    <td><?php echo $val['updated_at']; ?></td>
                    <td><?php echo HTML::anchor('form/update/'.$val['id'],'Update')?></td>
                    <td><?php echo "&nbsp;|&nbsp;".HTML::file_anchor('form/delete/'.$val['id'],'Delete')?></td>
                </tr>
            <?php 
    			endforeach; 
    		?>
            </table>
        </div>

        <div id="footer">
            <p>Login Test</p>
            <?php echo HTML::anchor('form/login','Kohana Login Test')?>
            <p>Download File </p>
            <?php echo HTML::anchor('assets/download/doc/kohanaForm.pdf','Kohana Form')?>
            <?php echo HTML::anchor('assets/download/zip/useradmin-master.zip','Sample Zip')?>
        </div>

        <!--script-->
        <?php echo HTML::script('assets/js/jquery/jquery-3.1.0.min.js') ?>
        <?php echo HTML::script('assets/js/bootstrap-3.3.7-dist/css/bootstrap.js') ?>
    </body>
</html>
