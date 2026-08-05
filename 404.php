<?php
/**
 * Custom 404 page (wired up by ErrorDocument in .htaccess).
 *
 * Deliberately standalone rather than including header.php: Apache serves this
 * file for any missing URL at any depth, so the page must not rely on relative
 * asset paths. Everything below is root-relative, with the local XAMPP
 * subfolder handled the same way seo-meta.php does it.
 */

http_response_code(404);

$ges_local_base = '/earthabhinaav';
$req   = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$local = ($req === $ges_local_base) || str_starts_with($req, $ges_local_base . '/');
$base  = $local ? $ges_local_base . '/' : '/';

$products = [
    'lightning-arrestor'     => 'Lightning Arrestor',
    'ese-lightning-arrestor' => 'ESE Lightning Arrestor',
    'earthing-systems'       => 'Earthing Systems',
    'chemical-earthing'      => 'Chemical Earthing',
    'copper-bonded-earthing' => 'Copper Bonded Earthing',
    'cable-trays'            => 'Cable Trays',
    'copper-strips'          => 'Copper Strips',
    'gi-strips'              => 'GI Strips',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page Not Found | Gaurav Electromech</title>
<meta name="robots" content="noindex, follow">
<meta name="description" content="The page you requested could not be found. Browse our earthing and lightning protection products instead.">
<link rel="icon" href="<?php echo $base; ?>img/logo.jpg">
<style>
    :root { color-scheme: light dark; }
    * { box-sizing: border-box; }
    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1.25rem;
        font-family: "Roboto", "Segoe UI", system-ui, sans-serif;
        background: #0f1724;
        color: #e6edf6;
        line-height: 1.6;
    }
    .wrap { max-width: 620px; width: 100%; text-align: center; }
    .logo { max-width: 230px; height: auto; margin-bottom: 2.25rem; }
    .code {
        font-size: clamp(3.5rem, 14vw, 6rem);
        font-weight: 700;
        line-height: 1;
        margin: 0;
        color: #4aa3ef;
        letter-spacing: .04em;
    }
    h1 { font-size: clamp(1.25rem, 4vw, 1.6rem); margin: .75rem 0 .5rem; }
    p { margin: 0 auto 2rem; color: #a9b6c8; max-width: 44ch; }
    .actions { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: center; margin-bottom: 2.5rem; }
    .btn {
        display: inline-block;
        padding: .7rem 1.5rem;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 500;
        background: #4aa3ef;
        color: #08111d;
        transition: opacity .2s ease;
    }
    .btn.secondary { background: transparent; color: #e6edf6; border: 1px solid #33445c; }
    .btn:hover { opacity: .85; }
    .links { border-top: 1px solid #22303f; padding-top: 1.75rem; }
    .links h2 { font-size: .8rem; text-transform: uppercase; letter-spacing: .12em; color: #7b8ba0; margin: 0 0 1rem; font-weight: 600; }
    .links ul { list-style: none; padding: 0; margin: 0; display: flex; flex-wrap: wrap; gap: .5rem 1.5rem; justify-content: center; }
    .links a { color: #cfe0f2; text-decoration: none; font-size: .95rem; }
    .links a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="wrap">
    <a href="<?php echo $base; ?>" title="Gaurav Electromech home">
        <img class="logo" src="<?php echo $base; ?>img/logo.avif" alt="Gaurav Electromech" title="Gaurav Electromech">
    </a>

    <p class="code">404</p>
    <h1>We couldn&rsquo;t find that page</h1>
    <p>The page may have been moved or removed. Everything else is still where you left it.</p>

    <div class="actions">
        <a class="btn" href="<?php echo $base; ?>" title="Home">Back to Home</a>
        <a class="btn secondary" href="<?php echo $base; ?>locations.php" title="Locations">Browse Locations</a>
    </div>

    <div class="links">
        <h2>Popular Products</h2>
        <ul>
            <?php foreach ($products as $slug => $name): ?>
            <li><a href="<?php echo $base . $slug; ?>.php" title="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"><?php echo htmlspecialchars($name); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</body>
</html>
