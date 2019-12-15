<?php
                        $dbms = "mysql";
    
                        $host = "localhost";
                        $db = "ImportExport";
                        $user = "root";
                        $pass = "codingmafia@8187";
                        $dsn = "$dbms:host=$host;dbname=$db";
                    
                        $cn = new PDO($dsn,$user,$pass);
                    
                        $q = $cn->exec('call countSupplier(@count)');
                        $res = $cn->query('select @count')->fetchAll();
                        print_r($res);
                        print_r($q);
                        
    
?>
                       
