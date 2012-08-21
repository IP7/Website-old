#! /bin/bash
#
# This is script is used to generate DB migration SQL code.
# If an argument is given, it is used as a migration number. If there
# is no argument, the last migration number is used.
#
# The script must be executed in the `models` directory. It creates a
# 'migration.sql' file if it succeeds.
#


if [ $# -lt 2 ]; then
    f=$(\ls -1 ./build/migrations/PropelMigration_* | tail -1)
    f=${f##*/}
else
    f="PropelMigration_$1.php"
fi

echo "Using '$f'."

php --run "
include './build/migrations/$f';
\$p = new ${f%%.php}();
\$u = \$p->getUpSQL();
file_put_contents('${f%%php}sql', \$u['infop7db']);"
echo "USE infop7db;" > migration.sql
cat ${f%%php}sql >> migration.sql
rm ${f%%php}sql
echo "SQL migration code is in 'migration.sql'."
