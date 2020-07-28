<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="Test Page">
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
                <link rel="stylesheet" rev="stylesheet" type="text/css" href="public/css/main.css" />
                <link rel="stylesheet" rev="stylesheet" type="text/css" href="../../css/custom-theme/jquery-ui-1.8.23.custom.css" />
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>

                <title>Test Page</title>
                </head>
                <body>
                    <div class="main-container">
                        <div class="ui-widget ui-corner-all vert-aligned">
                            <div class="website-logo"></div>

                            {if $messagen}<div class="">{$messagen}</div>
                                {if $runsql}
                                        <button type="submit" class="runsql" onclick="window.location.href = './run_sql.php'">Run SQL import for test</button> 
                                {/if} 

                            {else}
                                <form action="./testpage.php" method="GET" enctype="multipart/form-data">
                                    <div class="login-container">

                                        <p><label for="parameter" style="float:left">Enter a value
                                                <br>
                                                (if you imported a_table from sql folder, you can test select statement by entering <b>ok</b>): </label></p>

                                        <p><input type="parameter" id="parameter" name="parameter" /></p>
                                    </div>
                                    <div style="dispaly: block; padding: 5px 10px;">
                                        <button type="submit" class="runsubmit">OK</button></div>

                                </form>
                            {/if}  
                        </div>
                    </div>
                </body>
                </html>