<?php

class afMetaDb {
    private static
        $dbschema;

    /**
     * Returns a method name to get the object referenced
     * by the given foreign key column.
     */
    public static function getRelatedMethodName($colMap) {
        $class = $colMap->getTable()->getPhpName();
        $dbName = constant($class.'Peer::DATABASE_NAME');
        $foreignClass = self::getPhpName($dbName,
            $colMap->getRelatedTableName());

        $methodName = 'get'.$foreignClass;
        if(!method_exists($class, $methodName)) {
            $methodName = 'get'.$foreignClass.'RelatedBy'.$colMap->getPhpName();
        }
        return $methodName;
    }

    public static function getRelatedAffix($colMap) {
        return preg_replace('/^get/', '', self::getRelatedMethodName($colMap));
    }

    /**
     * Returns the table map for the given PHP table name.
     */
    public static function getTableMap($class) {
        $peer = constant($class.'::PEER');
        return call_user_func(array($peer, 'getTableMap'));
    }

    /**
     * Returns the matching PhpName.
     * Don't use this method directly.
     * Use the getRelatedMethodName() instead.
     *
     * @deprecated
     */
    public static function getPhpName($dbName, $tableName) {
        return PublicCache::cache(array('afMetaDb', '_getPhpName'), array($dbName, $tableName));
    }

    public static function _getPhpName($dbName, $tableName) {
        if(!isset(self::$dbschema)) {
            $root = sfConfig::get("sf_root_dir");
            self::$dbschema = sfYaml::load($root.'/config/schema.yml');
        }
        if(isset(self::$dbschema[$dbName][$tableName]['_attributes']['phpName'])) {
            $phpName = self::$dbschema[$dbName][$tableName]['_attributes']['phpName'];
        } else {
            $phpName = sfInflector::camelize($tableName);
        }
        return $phpName;
    }
}

