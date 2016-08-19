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
        <h1>Testing Json</h1>
        <hr/>

        <!-- first -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <pre id="test1"></pre>
            <button type="button" class="btn btn-primary" id="btn-test1">Test-1</button>
        </div>

        <!--script-->
        <script type="text/javascript">
            var based_url = '<?php echo URL::base(TRUE); ?>';
        </script>

        <?php echo HTML::script('assets/js/jquery/jquery-1.12.4.js') ?>
        <?php echo HTML::script('assets/js/jquery/jquery-ui.min.js') ?>
        <?php echo HTML::script('assets/js/bootstrap-3.3.7-dist/js/bootstrap.js') ?>
        <?php echo HTML::script('assets/js/testjsonjs.js') ?>
        
    </body>
</html>
