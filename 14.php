<pre><?php
/*
  base64
  https://en.wikipedia.org/wiki/Base64
 */
$orig = 'c2VuaWxzJ2RhZHltbm9zcGF0ZXJpd2VodHRjZW5ub2NlcmRuYXNlbGVnbmFzb2xvdHlsZm90ZGFob2h3dG5lZ2F5dGlydWNlc2xsZWJjYXBlaHQ=';
echo strrev(base64_decode($orig));
?></pre>
