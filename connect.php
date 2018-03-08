<?php

function getConnection($dbinfo = 'database.ini') {
        $db = parse_ini_file($dbinfo);

        // read the database properties
        $user  = isset($db['user']) ? $db['user'] : NULL;
        $pass  = isset($db['pass']) ? $db['pass'] : NULL;
        $name  = isset($db['name']) ? $db['name'] : NULL;
        $host  = isset($db['host']) ? $db['host'] : NULL;
        $type  = isset($db['type']) ? $db['type'] : NULL;
        $port  = isset($db['port']) ? $db['port'] : NULL;
        
        // each database driver has a different instantiation process
        switch ($type)
        {
            case 'pgsql':
                $port = $port ? $port : '5432';
                $pdo = new PDO("pgsql:dbname={$name};user={$user}; password={$pass};host=$host;port={$port}");
                break;
            case 'mysql':
                $port = $port ? $port : '3306';
                $pdo = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                break;
            case 'sqlite':
                $pdo = new PDO("sqlite:{$name}");
                $pdo->query('PRAGMA foreign_keys = ON'); // referential integrity must be enabled
                break;
            default:
                throw new Exception("Driver not found ('$type')");
                break;
        }
        
        // define wich way will be used to report errors (EXCEPTION)
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // define default fetch mode
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        
        // return the PDO object
        return $pdo;
}