<?php
class DatabaseLinker
{
    private  static $url = "mysql:host=localhost;dbname=tp_mathias_khadim_gaspard;charset=utf8;";
    private static $user = "root";
    private static $mdp = "met@nteip@rker3D";
    private static $login;

    public static function getConnexion()
    {
        if (DatabaseLinker::$login == null)
        {
            DatabaseLinker::$login = new PDO (DatabaseLinker::$url, DatabaseLinker::$user, DatabaseLinker::$mdp);
        }
        return DatabaseLinker::$login;
    }
}
