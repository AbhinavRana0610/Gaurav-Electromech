<?php
/**
 * Shared SEO head block, included from every header.php.
 *
 * Emits, for all 144 pages from one place:
 *   - canonical URL, robots, author, publisher
 *   - favicon, font/CDN preconnect hints
 *   - OpenGraph + Twitter Card tags
 *   - GA4 (gtag.js)
 *   - JSON-LD: Organization, WebSite, WebPage, BreadcrumbList, and Product
 *     on the 12 product pages
 *
 * A page can preset $canonical, $page_title or $description before it
 * includes header.php; everything else is derived from the request path.
 */

$ges_site_url   = 'https://www.earthingmanufacturers.com';
$ges_local_base = '/earthabhinaav';   // XAMPP subfolder, stripped so the canonical always points at the live site
$ges_author     = 'Gaurav Electromech';
$ges_publisher  = 'Gaurav Electromech';
$ges_ga4_id     = 'G-7RSVN7T02R';

$ges_phone   = '+918588810844';
$ges_email   = 'ge.gelearthing@gmail.com';
$ges_street  = 'Shop no 412/3 Sukhlal Market, near Shiva Market Main MCD Parking, Pitampura';
$ges_city    = 'Delhi';
$ges_zip     = '110034';
$ges_social  = ['https://www.facebook.com/gauravelectromech/'];

/* ---------- request path ---------------------------------------------- */

$ges_req  = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
$ges_local = ($ges_req === $ges_local_base) || str_starts_with($ges_req, $ges_local_base . '/');

$path = $ges_req;
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

if (!isset($canonical)) {
    $canonical = $ges_site_url . $path;
}

// Root-relative prefix for on-page assets: works on the live root and under the
// local /earthabhinaav subfolder, from any directory depth.
$ges_asset = $ges_local ? $ges_local_base . '/' : '/';

/* ---------- what page is this? ---------------------------------------- */

$ges_cities = [
    'ahmedabad' => 'Ahmedabad', 'bengaluru' => 'Bengaluru', 'chennai' => 'Chennai',
    'hyderabad' => 'Hyderabad', 'jaipur'    => 'Jaipur',    'kanpur'  => 'Kanpur',
    'lucknow'   => 'Lucknow',   'mumbai'    => 'Mumbai',    'navi-mumbai' => 'Navi Mumbai',
    'pune'      => 'Pune',
];

$ges_products = [
    'lightning-arrestor'            => 'Lightning Arrestor',
    'ese-lightning-arrestor'        => 'ESE Lightning Arrestor',
    'earthing-systems'              => 'Earthing Systems',
    'chemical-earthing'             => 'Chemical Earthing',
    'copper-bonded-earthing'        => 'Copper Bonded Earthing',
    'cable-trays'                   => 'Cable Trays',
    'gi-cable-trays'                => 'GI Cable Trays',
    'copper-strips'                 => 'Copper Strips',
    'copper-wires'                  => 'Copper Wires',
    'gi-strips'                     => 'GI Strips',
    'earthing-pit-covers'           => 'Earthing Pit Covers',
    'backfilling-earthing-compund'  => 'Backfilling Earthing Compound',
];

$ges_parts     = array_values(array_filter(explode('/', $path), 'strlen'));
$ges_city_slug = ($ges_parts && isset($ges_cities[$ges_parts[0]])) ? $ges_parts[0] : null;
$ges_city_name = $ges_city_slug ? $ges_cities[$ges_city_slug] : null;
$ges_place     = $ges_city_name ?? 'India';

// A trailing slash means a directory index, so there is no leaf page to name
$ges_leaf         = ($ges_parts && !str_ends_with($path, '/')) ? basename(end($ges_parts), '.php') : '';
$ges_product_name = $ges_products[$ges_leaf] ?? null;

/* ---------- title / description / image ------------------------------- */

$ges_title = trim(isset($page_title) && $page_title !== ''
    ? $page_title
    : 'Gaurav Electromech - Electrical & Safety Solutions');

$ges_desc = trim(isset($description) && $description !== ''
    ? $description
    : 'Gaurav Electromech is one of the top lightning arrestor manufacturers in India, offering ESE lightning arrestors, surge protection and earthing equipment.');

$ges_og_image = $ges_site_url . '/img/og-default.jpg';

/* ---------- JSON-LD ---------------------------------------------------- */

$ges_org_id  = $ges_site_url . '/#organization';
$ges_site_id = $ges_site_url . '/#website';

$ges_graph = [];

$ges_graph[] = [
    '@type'       => ['Organization', 'LocalBusiness'],
    '@id'         => $ges_org_id,
    'name'        => 'Gaurav Electromech',
    'url'         => $ges_site_url . '/',
    'description' => 'Manufacturer and supplier of lightning arrestors, earthing systems, cable trays, copper strips and allied electrical safety products.',
    'logo'        => [
        '@type'  => 'ImageObject',
        'url'    => $ges_site_url . '/img/logo.jpg',
        'width'  => 200,
        'height' => 200,
    ],
    'image'       => $ges_og_image,
    'telephone'   => $ges_phone,
    'email'       => $ges_email,
    'address'     => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $ges_street,
        'addressLocality' => $ges_city,
        'postalCode'      => $ges_zip,
        'addressRegion'   => 'Delhi',
        'addressCountry'  => 'IN',
    ],
    'areaServed'  => array_merge(
        [['@type' => 'Country', 'name' => 'India']],
        array_map(fn($c) => ['@type' => 'City', 'name' => $c], array_values($ges_cities))
    ),
    'sameAs'      => $ges_social,
];

$ges_graph[] = [
    '@type'      => 'WebSite',
    '@id'        => $ges_site_id,
    'url'        => $ges_site_url . '/',
    'name'       => 'Gaurav Electromech',
    'publisher'  => ['@id' => $ges_org_id],
    'inLanguage' => 'en',
];

$ges_graph[] = [
    '@type'              => 'WebPage',
    '@id'                => $canonical . '#webpage',
    'url'                => $canonical,
    'name'               => $ges_title,
    'description'        => $ges_desc,
    'isPartOf'           => ['@id' => $ges_site_id],
    'about'              => ['@id' => $ges_org_id],
    'primaryImageOfPage' => $ges_og_image,
    'inLanguage'         => 'en',
];

// Breadcrumbs: Home > [City] > [Page]
$ges_crumbs = [['name' => 'Home', 'item' => $ges_site_url . '/']];
if ($ges_city_slug) {
    $ges_crumbs[] = ['name' => $ges_city_name, 'item' => $ges_site_url . '/' . $ges_city_slug . '/'];
}
if ($ges_leaf !== '' && $ges_leaf !== 'index') {
    $ges_crumbs[] = [
        'name' => $ges_product_name ?? ucwords(str_replace('-', ' ', $ges_leaf)),
        'item' => $canonical,
    ];
}
if (count($ges_crumbs) > 1) {
    $ges_graph[] = [
        '@type'           => 'BreadcrumbList',
        '@id'             => $canonical . '#breadcrumb',
        'itemListElement' => array_map(fn($i, $c) => [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $c['name'],
            'item'     => $c['item'],
        ], array_keys($ges_crumbs), $ges_crumbs),
    ];
}

if ($ges_product_name !== null) {
    $ges_graph[] = [
        '@type'        => 'Product',
        '@id'          => $canonical . '#product',
        'name'         => $ges_product_name . ' in ' . $ges_place,
        'description'  => $ges_desc,
        'image'        => $ges_og_image,
        'category'     => 'Electrical Safety Equipment',
        'brand'        => ['@type' => 'Brand', 'name' => 'Gaurav Electromech'],
        'manufacturer' => ['@id' => $ges_org_id],
    ];
}

$ges_jsonld = json_encode(
    ['@context' => 'https://schema.org', '@graph' => $ges_graph],
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_PRETTY_PRINT
);

$e = fn($s) => htmlspecialchars($s, ENT_QUOTES);
?>
<link rel="canonical" href="<?php echo $e($canonical); ?>">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="author" content="<?php echo $e($ges_author); ?>">
<meta name="publisher" content="<?php echo $e($ges_publisher); ?>">

<link rel="icon" href="<?php echo $e($ges_asset); ?>img/logo.jpg">
<link rel="apple-touch-icon" href="<?php echo $e($ges_asset); ?>img/logo.jpg">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
<link rel="dns-prefetch" href="https://www.googletagmanager.com">

<meta property="og:type" content="<?php echo $ges_product_name !== null ? 'product' : 'website'; ?>">
<meta property="og:site_name" content="Gaurav Electromech">
<meta property="og:locale" content="en_IN">
<meta property="og:title" content="<?php echo $e($ges_title); ?>">
<meta property="og:description" content="<?php echo $e($ges_desc); ?>">
<meta property="og:url" content="<?php echo $e($canonical); ?>">
<meta property="og:image" content="<?php echo $e($ges_og_image); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Gaurav Electromech - lightning protection and earthing systems">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $e($ges_title); ?>">
<meta name="twitter:description" content="<?php echo $e($ges_desc); ?>">
<meta name="twitter:image" content="<?php echo $e($ges_og_image); ?>">

<script type="application/ld+json"><?php echo $ges_jsonld; ?></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $e($ges_ga4_id); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo $e($ges_ga4_id); ?>');
</script>
