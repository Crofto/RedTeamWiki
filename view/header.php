<html>
	<head>
		<meta charset="utf-8"/>
		<title>Site Wiki</title>
        <?php
            $onglet =  explode("/", $_SERVER['QUERY_STRING'])[0];
            echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/header.css\" type=\"text/css\">";
        ?>
	</head>
<body>
    <header>
		<ul>
			<li>
                <?php
                    echo("<a class ='float_left' href = '". base() . "'>Wiki Cybersécurité</a>");
                ?>     
			</li>
			<li>
                <?php
                    echo("<a class ='float_right menu " . ($onglet == "vocabulaire" ? "active" : "") . "'href = '". base() . "vocabulaire'>vocabulaire</a>");
                ?>
			</li>
			<li>
                <?php 
                    echo("<a class ='float_right menu " . ($onglet == "Outils" ? "active" : "") . "'href = '". base() . "Outils'>Outils</a>");
                ?> 
			</li>
            <li>
                <?php
                    echo("<a class ='float_right menu " . ($onglet == "Commandes" ? "active" : "") . "' href = '". base() . "Commandes'>Commandes</a>");
                ?>
	    	</li>
		</ul>
    </header>
</body>
</html>
