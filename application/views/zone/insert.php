<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<html>
    <head>
        <?php echo HTML::style('assets/css/style.css');?>
        <title>CD Collection !!</title>
    </head>
    <body>
    <?php 
        var_dump($posted);
    ?>
        <h2>Insert</h2>
        <?php 
			echo HTML::anchor('form','View Data');
			echo Form::open('form/insert');
			echo Form::label('username','Username : ');
			echo Form::input('username', $posted['username'], array('type' => 'text')).'<br />';
			echo Form::label('product','Product : ');
			echo Form::input('product', $posted['product'], array('type'=>'text')).'<br />';
            echo Form::label('quantity','Quantity : ');
            echo Form::input('quantity', $posted['quantity'], array('type'=>'text')).'<br />';
            echo Form::submit('submit','Insert');
            echo Form::close();
		?>
	</body>
</html>