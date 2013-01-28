<?php



/**
 * Skeleton subclass for representing a row from the 'files' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.ip7website
 */
class File extends BaseFile {

    public function incrementDownloadsCount() {

        $this->setDownloadsCount($this->getDownloadsCount()+1);

    }

    public function isDeleted() {

        return $this->getDeleted();
    
    }

} // File
