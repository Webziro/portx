<?php
require_once 'include/db.php';

$blogs_to_migrate = [
    [
        'title' => 'Consulted admitting is power acuteness.',
        'image_path' => 'wp-content/uploads/2023/06/blog1.jpeg',
        'blog_url' => 'consulted-admitting-is-power-acuteness',
        'content' => '<p>Sit amet luctussd fav venenatis, lectus magna fringilla inis urna, porttitor rhoncus dolor purus non enim praesent in elementum sahas facilisis leo, vel fringilla est ullamcorper eget nulla facilisi etisam dignissim diam quis enim lobortis viverra orci sagittis eu volutpat odio facilisis mauris sit.</p>
<p>Give lady of they such they sure it. Me contained explained my education. Vulgar as hearts by garret. Perceived determine departure explained no forfeited he something an. Contrasted dissimilar get joy you instrument out reasonably. Again keeps at no meant stuff. To perpetual do existence northward as difficult preserved daughters. Continued at up to zealously necessary breakfast. Surrounded sir motionless she end literature. Giy direction neglected but supported yet her.</p>
<p>New had happen unable uneasy. Drawings can followed improved out sociable not. Earnestly so do instantly pretended. See general few civilly amiable pleased account carried. Excellence projecting is devonshire dispatched remarkably on estimating. Side in so life past. Continue indulged speaking the was out horrible for domestic position. Seeing rather her you not esteem men settle genius excuse. Deal say over you age from. Comparison new ham melancholy son themselves.</p>
<ul class="list">
<li>– Pretty merits waited six</li>
<li>– General few civilly amiable pleased account carried.</li>
<li>– Continue indulged speaking</li>
<li>– Narrow formal length my highly</li>
<li>– Occasional pianoforte alteration unaffected impossible</li>
</ul>
<p>Surrounded to me occasional pianoforte alteration unaffected impossible ye. For saw half than cold. Pretty merits waited.</p>',
        'excerpt' => 'Sit amet luctussd fav venenatis, lectus magna fringilla inis urna, porttitor rhoncus dolor purus non enim praesent in elementum sahas facilisis leo...',
        'author_name' => 'Stanley Amaziro',
        'category' => 'Uncategorized',
        'tags' => 'Developement, SASS',
        'display_order' => 1
    ]
];

try {
    // Clear old sample blogs if any (to avoid duplicates during migration)
    $pdo->exec("DELETE FROM blogs");

    $stmt = $pdo->prepare("INSERT INTO blogs (title, image_path, blog_url, content, excerpt, author_name, category, tags, display_order) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    foreach ($blogs_to_migrate as $b) {
        $stmt->execute([
            $b['title'],
            $b['image_path'],
            $b['blog_url'],
            $b['content'],
            $b['excerpt'],
            $b['author_name'],
            $b['category'],
            $b['tags'],
            $b['display_order']
        ]);
    }
    echo "Content migrated successfully!";
} catch (Exception $e) {
    echo "Migration failed: " . $e->getMessage();
}
?>
