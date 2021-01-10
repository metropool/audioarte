<div id="page-wrapper">
  <div id="page" class="container <?php print $classes; ?>">

    <!-- !Leaderboard Region -->
    <?php print render($page['leaderboard']); ?>

    <header<?php print $header_attributes; ?>>

      <?php if ($site_logo || $site_name || $site_slogan): ?>
        <!-- !Branding -->
        <div<?php print $branding_attributes; ?>>

          <?php if ($site_logo): ?>
            <div id="logo">
              <?php //print $site_logo; ?>
            </div>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <!-- !Site name and Slogan -->
            <div<?php print $hgroup_attributes; ?>>

              <?php if ($site_name): ?>
                <h1<?php print $site_name_attributes; ?>><?php print $site_name; ?></h1>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <h2<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
              <?php endif; ?>

            </div>
          <?php endif; ?>

        </div>
      <?php endif; ?>

      <!-- !Header Region -->
      <?php print render($page['header']); ?>

    </header>

    <!-- !Navigation -->
    <?php print render($page['menu_bar']); ?>
    <?php if ($primary_navigation): print $primary_navigation; endif; ?>
    <?php if ($secondary_navigation): print $secondary_navigation; endif; ?>

    <!-- !Breadcrumbs -->
    <?php if ($breadcrumb): print $breadcrumb; endif; ?>

    <!-- !Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- !Secondary Content Region -->
    <?php print render($page['secondary_content']); ?>

    <div id="columns" class="columns clearfix">
      <main id="content-column" class="content-column" role="main">
        <div class="content-inner">

          <!-- !Highlighted region -->
          <?php print render($page['highlighted']); ?>
          <div class="block-prd-col clearfix">
	          <div class="block-prd-row clearfix"><?php print render($page['prd_block 1']); ?><?php print render($page['prd_block 2']); ?><?php print render($page['prd_block 3']); ?></div>
	          <div class="block-prd clearfix"><?php print render($page['prd_block 4']); ?><?php print render($page['prd_block 5']); ?><?php print render($page['prd_block 6']); ?></div>
          </div>

          <<?php print $tag; ?> id="main-content">

            <?php print render($title_prefix); // Does nothing by default in D7 core ?>

            <!-- !Main Content Header -->
            <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
              <header<?php print $content_header_attributes; ?>>

                <?php if ($title): ?>
                  <h2 id="page-title">
                    <?php print $title; ?>
                  </h2>
                <?php endif; ?>

                <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                  <div id="tasks">

                    <?php if ($primary_local_tasks): ?>
                      <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($secondary_local_tasks): ?>
                      <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($action_links = render($action_links)): ?>
                      <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>

              </header>
            <?php endif; ?>

            <!-- !Main Content -->
            <?php if ($content = render($page['content'])): ?>
              <div id="content" class="region">
                <?php print $content; ?>
              </div>
            <?php endif; ?>

            <!-- !Feed Icons -->
            <?php print $feed_icons; ?>

            <?php print render($title_suffix); // Prints page level contextual links ?>

          </<?php print $tag; ?>><!-- /end #main-content -->

          <!-- !Content Aside Region-->
          <?php print render($page['content_aside']); ?>

        </div><!-- /end .content-inner -->
      </main><!-- /end #content-column -->

      <!-- !Sidebar Regions -->
      <?php $sidebar_first = render($page['sidebar_first']); print $sidebar_first; ?>
      <?php $sidebar_second = render($page['sidebar_second']); print $sidebar_second; ?>

    </div><!-- /end #columns -->
    <?php print render($page['reviews']); ?>
    <!-- !Tertiary Content Region -->
    <?php print render($page['tertiary_content']); ?>

    <!-- !Footer -->
    <?php if ($page['footer'] || $attribution): ?>
      <footer<?php print $footer_attributes; ?>>
        <?php print render($page['footer']); ?>
        <?php print $attribution; ?>
      </footer>
    <?php endif; ?>

  </div>
</div>
