<?php 

$ldapHost = "dir.lcv-group.net";
$ldapport = 636;

$ldaprdn = 'wli';
$ldapPass = '';

$ldapConn = ldap_connect($ldapHost, $ldapport) or die("Impossible de se connecter au serveur $ldapHost");

if ($ldapConn) {
	$ldapBind = ldap_bind($ldapConn, $ldaprdn, $ldapPass);

	if ($ldapBind) {
		echo "Connexion LDAP réussie ...";
	}else{
		echo "Connexion LDAP échouée ...";
	}
}

?>