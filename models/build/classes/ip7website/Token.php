<?php



/**
 * Skeleton subclass for representing a row from the 'tokens' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ip7website
 */
class Token extends BaseToken
{

    // if a const is > 64 (except for 'size'), the field size MUST be
    // changed in the schema, from TINYINT to INTEGER.
    const canConnect           = 1;
    const canChangeUsername    = 2;
    const canChangeName        = 4;
    const canChangeEmail       = 8;
    const canChangeTel         = 16;
    const canChangeWholeProfil = 32;

    // can make post requests
    const canPost = 64;

    const size = 64;
}
