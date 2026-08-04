<?php
/**
 * Shared SEO meta tags: canonical URL, robots directive, author and publisher.
 * Included from every header.php, so the values below are set in one place.
 *
 * A page can override the auto-detected canonical by setting $canonical
 * before it includes header.php.
 */

$ges_site_url   = 'https://www.earthingmanufacturers.com';
$ges_local_base = '/earthabhinaav';   // XAMPP subfolder, stripped so the canonical always points at the live site
$ges_author     = 'Gaurav Electromech';
$ges_publisher  = 'Gaurav Electromech';

if (!isset($canonical)) {
    $path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');

    // running from the local /earthabhinaav subfolder
    if ($path === $ges_local_base) {
        $path = '/';
    } elseif (str_starts_with($path, $ges_local_base . '/')) {
        $path = substr($path, strlen($ges_local_base));
    }

    // /index.php and / are the same page - always canonicalise to the directory form
    $path = preg_replace('#(^|/)index\.php$#', '$1', $path);
    if ($path === '') {
        $path = '/';
    }

    $canonical = $ges_site_url . $path;
}
?>
<link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES); ?>">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="author" content="<?php echo htmlspecialchars($ges_author, ENT_QUOTES); ?>">
<meta name="publisher" content="<?php echo htmlspecialchars($ges_publisher, ENT_QUOTES); ?>">
