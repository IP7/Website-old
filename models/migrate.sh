#! /bin/bash
#
# This script is used to generate DB migration SQL code. If an argument is
# given, it is used as a migration number. If there is no argument, the last
# migration number is used.
#
# The script must be executed in the `models` directory. It creates a
# 'migration.sql' file if it succeeds.
#

function _migrate() {

if [ $# -lt 2 ]; then
    files=$(\ls -1 ./build/migrations/PropelMigration_*php 2> /dev/null);
    if [ $? -ne 0 ]; then
        echo "error, no migration file found."
        return 1
    fi
    f=${files##*/}
else
    f="PropelMigration_$1.php"
fi

echo "Using '$f'."

# extract SQL migration code
php --run "
include './build/migrations/$f';
\$p = new ${f%%.php}();
\$u = \$p->getUpSQL();
file_put_contents('${f%%php}sql', \$u['infop7db']);"

# Add the DB name
echo "USE infop7db;" > migration.sql
cat ${f%%php}sql >> migration.sql
rm ${f%%php}sql

# remove the migration PHP file (keep a backup)
mv ./build/migrations/$f{,.done}

echo "SQL migration code is in 'migration.sql'."

}

_migrate
