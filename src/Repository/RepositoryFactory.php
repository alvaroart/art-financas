<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 16/04/2018
 * Time: 11:12
 */

namespace ARTFin\Repository;


class RepositoryFactory
{
    public static function factory(string $modelClass)
    {
        return new DefaultRepository($modelClass);
    }
}