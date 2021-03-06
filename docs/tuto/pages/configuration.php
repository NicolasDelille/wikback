<h2>Configurations</h2>

<p>Par sa simplicité, W ne requière pas tellement de configuration pour fonctionner. Le fait d'imposer <a href="?p=conventions" title="Les conventions">certaines conventions</a> aide également à limiter le nombre de réglages à réaliser.</p>

<h3>Le fichier de configuration</h3>

<p>W est livré avec un fichier nommé <span class="code">app/config.dist.php</span>. Ce fichier est destiné à être versionné, et ne doit pas contenir d'informations personnelles ou sensibles. Le fichier lu par défaut par le framework est <span class="code">app/config.php</span>, qui lui, ne doit pas être versionné, il vous est personnel.</p>

<p>Pour démarrer copier-coller y le contenu du fichier <span class="code">app/config.dist.php</span>.

<pre><code>/* app/config.php */

$w_config = [
	//url
	'base_url' => '',								//chemin relatif au domaine, menant à la racine de l'appli

   	//information de connexion à la bdd
	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
    'db_user' => 'root',							//nom d'utilisateur pour la bdd
    'db_pass' => '',								//mot de passe de la bdd
    'db_name' => '',								//nom de la bdd
    'db_table_prefix' => '',						//préfixe ajouté aux noms de table

	//authentification, autorisation
	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
	'security_role_property' => 'role',				//nom de la colonne pour le "role"

	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion
];
</code></pre>

<h4>Valeurs par défaut</h4>
<p>Toutes les valeurs inscrites dans le fichier de base sont les valeurs par défaut. Vous pouvez si vous préférez retirer les clefs de configuration pour lesquelles vous utilisez cette valeur par défaut.</p>
<p>Au besoin, vous pouvez retrouver les valeurs par défaut dans le fichier <span class="code">W/App.php</span></p>

<h4>Les clefs de configuration en détails</h4>
<h5>base_url</h5>
<p>Requise par AltoRouter si votre site est accessible dans un sous-dossier, même si ce celui-ci est <span class="code">public/</span>, la configuration <span class="code">base_url</span> permet de spécifier le chemin relatif à votre domaine, menant à la racine de votre appli. Ainsi, si vous travaillez dans <span class="code">http://localhost/mes-projets/projet-lorem/public/</span>, la valeur de <span class="code">base_url</span> devrait être <span class="code">/mes-projets/projet-lorem/public</span>.</p>
<p>Attention : vous devez inclure le slash initial, et exclure le slash final !</p>
<p>Si votre site est accessible par un domaine pointant directement dans le dossier <span class="code">public/</span>, alors vous pouvez omettre cette clef de configuration.</p>

<h5>db_host, db_user, dp_pass et db_name</h5>
<p>Les informations de connexion à votre base de données.</p>

<h5>db_table_prefix</h5>
<p>Si vous utilisez le même préfixe pour le nom de toutes vos tables, vous pouvez le spécifier dans <span class="code">db_table_prefix</span>. Le préfixe sera ajouté automatiquement lorsque vous réaliserez des requêtes avec <a href="?p=gestionnaires" title="Les gestionnaires">vos gestionnaires</a>.

<h5>security_user_table</h5>
<p>Le nom de la table contenant vos utilisateurs.</p>

<h5>security_username_property, security_email_property, security_password_property et security_role_property</h5>
<p>Le nom des colonnes de votre utilisateur pour les champs qui intéressent W, respectivement : pseudo, email, mot de passe et role.</p>

<h5>security_login_route_name</h5>
<p>Le nom de la route menant à votre page affichant le formulaire de connexion. W redirigera effectivement les utilisateurs non-connectés tentant d'accéder à une ressource protégée vers cette page.</p>