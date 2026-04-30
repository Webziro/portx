import re

file_path = r'c:\xampp\htdocs\web\portfolio\workdetail-page\index.php'
with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# 1. Replace the top PHP block
top_block = """<?php 
    include "../include/title.php";
    require_once '../include/db.php';
    
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    if (!$id) {
        header("Location: ../work/index.php");
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        header("Location: ../work/index.php");
        exit;
    }
?> """
content = re.sub(r'<\?php.*?require_once \'../include/db.php\';\s*\?>', top_block, content, flags=re.DOTALL)

# 2. Breadcrumb & Main Image
breadcrumb_pattern = r'<p>BRANDING - RAVEN STUDIO</p>.*?<img decoding="async"\s*src="\.\./wp-content/uploads/2023/04/project-dt-1\.php "\s*alt="">'
breadcrumb_replacement = """<p><?php echo htmlspecialchars(strtoupper($project['category'])); ?></p>
                                                    <h1 class="section-heading">

                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                            alt="img">

                                                        <?php echo htmlspecialchars($project['title']); ?>
                                                        <img decoding="async"
                                                            src="../wp-content/themes/gridx/assets/images/star-2.png"
                                                            alt="img">

                                                    </h1>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="project-details-img" data-aos="zoom-in">
                                            <img decoding="async" src="../<?php echo htmlspecialchars($project['image_path']); ?>" alt="">"""
content = re.sub(breadcrumb_pattern, breadcrumb_replacement, content, flags=re.DOTALL)

# 3. Project Name & Description
info_pattern = r'<h4>Raven studio</h4>\s*<p>Sit amet luctussd fav venenatis.*?</div>\s*<div class="project-details-info flex-1">\s*<h4>About</h4>\s*<p>Lorem ipsum dolor sit amet.*?</p>\s*</div>'
info_replacement = """<h4><?php echo htmlspecialchars($project['title']); ?></h4>
                                                    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                                                </div>"""
content = re.sub(info_pattern, info_replacement, content, flags=re.DOTALL)

# 4. Detail Image 1
img2_pattern = r'<div class="project-details-2-img mb-24" data-aos="zoom-in">\s*<img decoding="async" src="\.\./wp-content/uploads/2023/04/project-dt-1\.php "\s*alt="">\s*</div>'
img2_replacement = """<?php if (!empty($project['image2_path'])): ?>
                                        <div class="project-details-2-img mb-24" data-aos="zoom-in">
                                            <img decoding="async" src="../<?php echo htmlspecialchars($project['image2_path']); ?>" alt="">
                                        </div>
                                        <?php endif; ?>"""
content = re.sub(img2_pattern, img2_replacement, content, flags=re.DOTALL)

# 5. Detail Image 2 and 3 
img34_pattern = r'<div class="row mb-24">\s*<div class="col-md-6" data-aos="zoom-in">\s*<div class="project-details-3-img">\s*<img decoding="async"\s*src="\.\./wp-content/uploads/2023/04/project3-1\.php " alt="">\s*</div>\s*</div>\s*<div class="col-md-6" data-aos="zoom-in">\s*<div class="project-details-3-img">\s*<img decoding="async"\s*src="\.\./wp-content/uploads/2023/04/project2\.jpg" alt="">\s*</div>\s*</div>\s*</div>'
img34_replacement = """<div class="row mb-24">
                                            <?php if (!empty($project['image3_path'])): ?>
                                            <div class="col-md-6" data-aos="zoom-in">
                                                <div class="project-details-3-img">
                                                    <img decoding="async" src="../<?php echo htmlspecialchars($project['image3_path']); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (!empty($project['image4_path'])): ?>
                                            <div class="col-md-6" data-aos="zoom-in">
                                                <div class="project-details-3-img">
                                                    <img decoding="async" src="../<?php echo htmlspecialchars($project['image4_path']); ?>" alt="">
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>"""
content = re.sub(img34_pattern, img34_replacement, content, flags=re.DOTALL)

# Remove the extra images block
remove_extra_imgs = r'<section\s*class="elementor-section elementor-top-section elementor-element elementor-element-05c9290.*?</section>'
content = re.sub(remove_extra_imgs, '', content, flags=re.DOTALL)

# 6. About Box (Year, Client, Services, Technologies + Remove Right Description)
about_pattern = r'<ul>\s*<li>\s*<p>Year.*?</div>\s*<div class="right-details">\s*<h4>Description</h4>.*?</div>\s*</div>'
about_replacement = """<ul>
                                                        <li>
                                                            <p>Year</p>
                                                            <h5><?php echo htmlspecialchars($project['year']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Client</p>
                                                            <h5><?php echo htmlspecialchars($project['client']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Services</p>
                                                            <h5><?php echo htmlspecialchars($project['services']); ?></h5>
                                                        </li>
                                                        <li>
                                                            <p>Technologies</p>
                                                            <h5><?php echo htmlspecialchars($project['technologies']); ?></h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>"""
content = re.sub(about_pattern, about_replacement, content, flags=re.DOTALL)

# 7. Next Project Image 
next_proj_pattern = r'<div class="project-details-img" data-aos="zoom-in">\s*<img decoding="async" src="\.\./wp-content/uploads/2023/04/project-dt-1\.php "\s*alt="">\s*</div>'
next_proj_replacement = """
<?php 
// Next project fetch
$nextStmt = $pdo->prepare("SELECT id, image_path FROM projects WHERE id < ? ORDER BY id DESC LIMIT 1");
$nextStmt->execute([$id]);
$nextProj = $nextStmt->fetch(PDO::FETCH_ASSOC);
if (!$nextProj) { // Wrap around
    $nextStmt = $pdo->query("SELECT id, image_path FROM projects ORDER BY id DESC LIMIT 1");
    $nextProj = $nextStmt->fetch(PDO::FETCH_ASSOC);
}
if ($nextProj && !empty($nextProj['image_path'])): 
?>
                                        <div class="project-details-img" data-aos="zoom-in">
                                            <a href="index.php?id=<?php echo $nextProj['id']; ?>">
                                                <img decoding="async" src="../<?php echo htmlspecialchars($nextProj['image_path']); ?>" alt="">
                                            </a>
                                        </div>
<?php endif; ?>
"""
content = re.sub(next_proj_pattern, next_proj_replacement, content, flags=re.DOTALL)

# 8. Next Project Button
btn_pattern = r'<a href="#" class="big-btn shadow-box">\s*Next Project </a>'
btn_replacement = """<?php if ($nextProj): ?>
                                            <a href="index.php?id=<?php echo $nextProj['id']; ?>" class="big-btn shadow-box">
                                                Next Project 
                                            </a>
                                            <?php endif; ?>"""
content = re.sub(btn_pattern, btn_replacement, content, flags=re.DOTALL)

with open(file_path, 'w', encoding='utf-8') as f:
    f.write(content)

print("Done parsing")
