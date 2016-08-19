<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<html>
    <head>
    	
		<link rel="stylesheet" type="text/css" href="<?php echo url::base() ?>assets/css/style.css" />
      	<!--atau--> 
        <?php echo HTML::style('assets/css/style.css');?>
        <title>CD Collection !!</title>
    </head>
    <body>
        <h2>Update</h2>
        <?php 
			foreach( $users as $u): 
				echo HTML::anchor('form','View Data');
				echo HTML::anchor('form/insert','Insert Data');
				echo Form::open('form/update');
				echo Form::label('username','Username : ');
				echo Form::input('username', $u->username, array('type' => 'text')).'<br />';
				echo Form::label('product','Product : ');
				echo Form::input('product', $u->product, array('type'=>'text')).'<br />';
				echo Form::label('quantity','Quantity : ');
				echo Form::input('quantity', $u->quantity, array('type'=>'text')).'<br />';
				echo Form::hidden('id',$u->id);
				echo Form::submit('submit','Update');
				echo Form::close();
			endforeach; 
		?>
	</body>
</html>