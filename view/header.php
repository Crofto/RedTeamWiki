<html>
	<head>
		<meta charset="utf-8"/>
		<title>Phishing Site Ynav</title>
        <?php
            $onglet =  explode("/", $_SERVER['QUERY_STRING'])[0];
            echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/style.css\" type=\"text/css\">";
            echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/footer.css\" type=\"text/css\">";
            echo "<link rel=\"stylesheet\" href=\"" . base() . "CSS/header.css\" type=\"text/css\">";
        ?>
	</head>
<body>
    
     <header>
		<ul>
			<li>
				<span>
                    <?php
                    echo("<a class ='float_left" . ($onglet == "Wiki Cybersécurité" ? "active" : "") . "' href = '". base() . "Wiki Cybersécurité'>Wiki Cybersécurité</a>");
                    ?>            
				</span>
			</li>
			<li>
                <?php
                    echo("<a class ='float_left" . ($onglet == "Commandes" ? "active" : "") . "' href = '". base() . "Commandes'>Commandes</a>");
                ?>
	    	</li>
			<li>
                <?php
                echo("<a class ='float_left" . ($onglet == "vocabulaire" ? "active" : "") . "'href = '". base() . "vocabulaire'>vocabulaire</a>");
                ?>	
			</li>
			<li>
                <?php
                    echo("<a class ='float_left" . ($onglet == "Outils" ? "active" : "") . "'href = '". base() . "Outils'>Outils</a>");
                ?> 
			</li>
		</ul>
    </header>
	</body>
</html>
