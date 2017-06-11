<?php
  $dynamic_app = getenv('DYNAMIC_APP');
  $static_app = getenv('STATIC_APP');
?>
<VirtualHost *:80>
  ServerName lab.res.ch

  ProxyPass '/api/students/' 'http://<?php print "$dynamic_app"?>/'
  ProxyPassReverse '/api/students/' 'http://<?php print "$dynamic_app"?>/'

  ProxyPass '/' 'http://<?php print "$static_app"?>/'
  ProxyPassReverse '/' '<?php print "$static_app"?>/'
</VirtualHost>
