<!-- News -->
<div class="container-main">
  <div class="news">

    <!-- Phần 1: Danh sách bài viết chính -->
    <div class="news__main">
      <div class="news__list grid-2">
        <?php foreach (array_slice($allNews, 0, 5) as $index => $news): ?>
          <article class="news__item flex flex-col gap-8 <?php echo ($index == 4) ? 'news__item--large' : ''; ?>">
            <img class="news__img" src="<?= $baseUrl ?>img/new/<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh bài viết" />
            <a class="news__link" href="<?php echo htmlspecialchars($news['link']); ?>">
              <h2 class="news__title"><?php echo htmlspecialchars($news['title']); ?></h2>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Phần 2: Danh sách bài viết tiếp theo -->
    <div class="news__main">
      <div class="news__list grid-2">
        <?php foreach (array_slice($allNews, 5, 5) as $index => $news): ?>
          <article class="news__item flex flex-col gap-8 <?php echo ($index == 0) ? 'news__item--large' : ''; ?>">
            <img class="news__img" src="<?= $baseUrl ?>img/new/<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh bài viết" />
            <a class="news__link" href="<?php echo htmlspecialchars($news['link']); ?>">
              <h2 class="news__title"><?php echo htmlspecialchars($news['title']); ?></h2>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Phần 3: Sidebar danh sách bài viết nổi bật -->
    <aside class="news__sidebar">
      <div class="news__list flex flex-col gap-10">
        <?php foreach ($featuredNews as $news): ?>
          <article class="news__item flex-center gap-10">
            <img class="news__img" src="<?= $baseUrl ?>img/new/<?php echo htmlspecialchars($news['image']); ?>" alt="Hình ảnh bài viết" />
            <a class="news__link" href="<?php echo htmlspecialchars($news['link']); ?>">
              <h2 class="news__title"><?php echo htmlspecialchars($news['title']); ?></h2>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    </aside>

  </div>
</div>