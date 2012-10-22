<html>
<body>
<?php 
function cursus($tab,$aux,$i)
{
	if($tab[$i]["annee"] == "L1" || $tab[$i]["annee"] == "l1")
	{
		return (preg_match("#IF1|IS1|IF1|OBi|MM1|BC1|CH1|AR1|TB1|PA1|LM1|SD1|PH1|OP1|DV1|TO2|CI2|IO2|MI2|Anglais#i",$aux['name'],$matches)) ? $matches[0] : False;
	}
	else if($tab[$i]["annee"] == "L2" || $tab[$i]["annee"] == "l2")
	{
		return (preg_match("#OL3|IK3|EC3|MI3|Anglais|PPP|LC4|AF4|EA4|LS4|EP4|MI4#i",$aux['name'],$matches)) ? $matches[0] : False;
	}
	else if($tab[$i]["annee"] == "L3" || $tab[$i]["annee"] == "l3")
	{
		return (preg_match("#PF5|PO5|MD5|SY5|AL5|LO6|BD6|PR6|AS6|Anglais|CN6|GL6|ED6|MV6|TE6|LI6#i",$aux['name'],$matches)) ? $matches[0] : False;
	}
	else if($tab[$i]["annee"] == "M1" || $tab[$i]["annee"] == "m1")
	{
		return False;
	}
	else if($tab[$i]["annee"] == "M2" || $tab[$i]["annee"] == "m2")
	{
		return False;
	}
}

function annee($tab,$aux)
{
	$tab["annee"]=(preg_match("#(L[1-3])|(M[1-2])#i",$aux,$matches)) ? $matches[0] : False ;
	if($matches[0]=='M1' || $matches[0] == "m1" || $matches[0]=='M2' || $matches[0] == "m2")
	{
		$tab['parcours'] = (preg_match("#LC|LP|SRI|MPRI#i",$aux,$matches)) ? $matche[0] : False;
	}
	return $tab;
}

function date_f($tab,$aux)
{
	return (preg_match("#[0-9]{4}-[0-9]{4}#",$aux,$matches)) ? $matches[0] : False;
}

function nom($aux)
{
	substr($aux,0,strpos($aux['name'],' '));
}


//La fonction extrait les fichiers supprime l'archive et renvoit un tableau de toutes les informations d'un fichier, 
//Si un fichier ne fournit pas toutes les informations, on le précise dans un champs du tableau renvoyé. 
//Si il y a eu une erreur on renvoit un numero qui correspond a la condition non respectée
function proposition_par_zip()
{
	if ($_FILES['mon_fichier']['error'] == 0)
	{
		$extensions_valides = array('zip','tar');
		$extension_upload = strtolower( substr( strrchr( $_FILES['mon_fichier']['name'], '.') ,1) );
		if ( in_array($extension_upload,$extensions_valides) ) 
		{
			$resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$_FILES['mon_fichier']['name']);
			if ($resultat)
			{ 
				$zip = new ZipArchive;
				$tab = array();
				if ($zip->open($_FILES['mon_fichier']['name']) === TRUE) {
					for ($i=0; $i<$zip->numFiles;$i++) {
						$aux= $zip->statIndex($i);
						$tab[$i]["nom"] = nom($aux['name']);
						$tab[$i]["correction"]= preg_match("#correction#i",$aux['name']) ? True : False ;
						$tab[$i]['date'] = date_f($tab,$aux['name']);
						$tab[$i] = annee($tab[$i],$aux['name']);
						$tab[$i]['cursus'] = cursus($tab,$aux,$i);
						var_dump($tab[$i]);	
					}
					$zip->extractTo(".");
					//delete($_FILES['mon_fichier']['name']);
					$zip->close();
					return $tab;
				} 
				else {
					return 1;
				}
			}
			else
			{
				return 2;
			}
		}
		else
		{
      		 return 3;
		}
	}
	else
	{
		return 4;
	}
}

/**************************
*        MAIN             *
***************************/
proposition_par_zip();


?>
</body>
</html>
