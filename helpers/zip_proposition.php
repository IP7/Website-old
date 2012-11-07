<?php
require_once('Spyc.php');
 
//La fonction extrait les fichiers supprime l'archive et renvoit un tableau de toutes les informations d'un fichier,
//Si un fichier ne fournit pas toutes les informations, on le précise dans un champs du tableau renvoyé.
//Si il y a eu une erreur on renvoit un numero qui correspond a la condition non respectée
function zip_tmp()
{
        if ($_FILES['mon_fichier']['error'] != 0)
        {
                        return 1;
                }
                $extensions_valides = array('zip');
                $extension_upload = strtolower( substr( strrchr( $_FILES['mon_fichier']['name'], '.') ,1) );
                if (! in_array($extension_upload,$extensions_valides) )
                {
                        return 2;
                }
               
                $zip = new ZipArchive;
               
                if ($zip->open($_FILES['mon_fichier']['tmp_name']) === FALSE)
                {
                        return 3;
                }
                $zip->ExtractTo("zip/");
                $zip->close();         
                $yaml = Spyc::YAMLLoad('zip/config.txt');
                return $yaml;
}
 
function proposition_par_zip()
{
        $resultat_reception = zip_tmp();
        foreach($resultat_reception as $k => $v) // pour toutes les propositions
        {
                if(is_array($v))
                {
                        if(!(array_key_exists("Annee",$v) && array_key_exists("Correction",$v) && array_key_exists("Matiere",$v) && array_key_exists("Titre",$v) && array_key_exists("Description",$v) && is_array($v["Description"])))
                        {
                                return null;
                        }
                        foreach($v as $a => $b)
                        {
                                if(!(is_string($b) && file_exists("zip/$b")))
                                {
                                        continue;
                                }
                                echo("$b<br>");
                                $aux = substr($b,strpos($b,".")+1);
                                if(!strcmp($aux,"html") || !strcmp($aux,"php"))
                                {
                                        echo("aux = $aux<br>");
                                        rename("zip/".$b,$b.".txt");
                                }
                                else
                                {
                                        rename("zip/".$b,$b);
                                }
                        }
                        array_map('unlink', glob("zip/*"));
                        rmdir("zip");
                        return $resultat_reception;
                }
                else
                {
                        return null;
                }
        }
        return null;
}
?>
