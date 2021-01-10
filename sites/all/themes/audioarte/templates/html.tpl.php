<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7"<?php print $html_attributes; ?>><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8"<?php print $html_attributes; ?>><![endif]-->
<!--[if IE 8]><html class="lt-ie9"<?php print $html_attributes; ?>><![endif]-->
<!--[if gt IE 8]><!--><html<?php print $html_attributes . $rdf_namespaces; ?>><!--<![endif]-->
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
<meta name="msvalidate.01" content="52396867619CDE32E1E3501985DC01D3" />
<link rel="canonical" href="https://www.audioarte.nl/" />
<?php print $styles; ?>
<?php print $scripts; ?>
<?php print $polyfills; ?>
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
