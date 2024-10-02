<div class="se-saved-con"></div>
<div class="overlay-message">
    <p><?php esc_html_e('Changes Saved..!', 'la-wordsrotator'); ?></p>
</div>
<div class="plugin-title">
    <h2 class="wdo-main-heading">
        <?php esc_html_e('CSS3 Rotating Words - WordPress Plugin'); ?>
        <img src="<?php echo esc_url(plugin_dir_url(__DIR__ ) . '../images/rotating-icon.png'); ?>">
    </h2>
    <h3 class="wdo-sub-heading">
        <?php esc_html_e('Welcome! You are going to create something awesome with this plugin. Add multiple words in sentence with animations which changes after intervals.'); ?>
    </h3>
</div>

<div id="accordion">
    <?php if (isset($savedmeta['rotwords'])) : ?>
        <?php foreach ($savedmeta['rotwords'] as $key => $data) : ?>
            <!-- Iterating through saved data -->
            <?php include 'group-content.php'; ?>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- Default group content -->
        <?php include 'default-group-content.php'; ?>
    <?php endif; ?>
</div>

<hr style="margin-top: 20px;">
<button class="btn btn-success position-fixed save-meta"><?php esc_html_e('Save Changes', 'la-wordsrotator'); ?></button>
<a style="text-decoration:none;" href="https://webdevocean.com/product/css3-rotating-words-wordpress-plugin/" target="_blank">
    <h4 style="padding: 10px;background: #860c4adb;color: #fff;margin-top: 50px;text-align:center;font-size:24px;">
        <?php esc_html_e('Buy Pro Version in $10 To Unlock More Features'); ?>
    </h4>
</a>
