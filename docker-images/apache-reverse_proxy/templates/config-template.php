<?php
  $dynamic_app = getenv('DYNAMIC_APP');
  $static_app = getenv('STATIC_APP');
  $dynamic_app1 = getenv('DYNAMIC_APP1');
  $static_app1 = getenv('STATIC_APP1');
?>
<VirtualHost *:80>
  ServerName lab.res.ch

  <Proxy balancer://clusterstatic>
    BalancerMember "http://<?php print "$static_app"?>"
    BalancerMember "http://<?php print "$static_app1"?>"
    ProxySet lbmethod=byrequests
  </Proxy>
  <Proxy balancer://clusterdynamic>
    BalancerMember "http://<?php print "$dynamic_app"?>"
    BalancerMember "http://<?php print "$dynamic_app1"?>"
    ProxySet lbmethod=byrequests
  </Proxy>

  ProxyPass "/api/students/" "balancer://clusterdynamic/"
  ProxyPassReverse "/api/students/" "balancer://clusterdynamic/"

  ProxyPass "/" "balancer://clusterstatic/"
  ProxyPassReverse "/" "balancer://clusterstatic/"
</VirtualHost>
