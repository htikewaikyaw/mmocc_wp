<?php
	class TranslatepressAutomaticTranslateAddonFree {
        public $plugin_file=__FILE__;
        public $slug="translatepress-tpap-register";
        function __construct() {
    	    add_action( 'admin_enqueue_scripts', [ $this, 'SetAdminStyle' ] );
    	    add_action( 'admin_menu', [$this,'TpaFreeActiveAdminMenu'],11);
        }
        function SetAdminStyle() {
            wp_enqueue_style('tpap-free-editor-styles', TPA_URL . 'assets/css/tpa-admin-style.css', null, TPA_VERSION, 'all');
        }
        function TpaFreeActiveAdminMenu(){
            add_options_page(
            __( 'TranslatePress - Auto Translate Addon', 'tpap' ),
            __( 'TranslatePress - Auto Translate Addon', 'tpap' ),
            'manage_options',
            $this->slug,
            array(
                $this,
                'TpaFreeLicenseForm'
            ));
        }
        function TpaFreeLicenseForm() {
        ?>
        <form method="post">
            <input type="hidden" name="action">
        <div class="tpa-license-container">
        <h3 class="tpa-license-title"><i class="dashicons-before dashicons-translation"></i> <?php _e("Automatic Translate Addon For TranslatePress",$this->slug);?></h3>
        <div class="tpa-license-content">
            <div class="tpa-license-form">
               
                <?php
            
                $site_url = get_site_url();
               
                ?>

                <p>Thanks for using automatic translate addon free version that support Yandex page translate widget for unlimited translations. You can also use <b>Google page translate widget</b> in our pro version for a better translation experience.</p>
                <a class="button button-primary" href='https://coolplugins.net/product/automatic-translate-addon-for-translatepress-pro/?utm_source=plugin_dashboard&utm_medium=button' target='_blank'>✅ Buy Pro Plugin</a>
                <a class="button button-secondary" href="<?php echo $site_url;?>/?trp-edit-translation=true" target='_blank'>Auto Translate Site</a>
                <a class="button button-secondary" href="https://wordpress.org/support/plugin/automatic-translate-addon-for-translatepress/reviews/#new-post" target="_blank">🌟 Submit Review</a>

                <h3>Compare Free vs Pro</h3>
                <table class="tp-addon-license">           
                <tr>
                <th>Features</th>
                <th>Free License</th>
                <th>Premium License</th>
                </tr>
                <tr>
                <td>Yandex Translate Widget Support<br/><img style="border: 1px solid;" src="<?php echo TPA_URL.'/assets/images/powered-by-yandex.png' ?>"/></td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available</td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available</td>
                </tr>
                <tr style="background:#fffb7a;font-weight: bold;">
                <td>Google Translate Widget Support<br/><img style="border: 1px solid;" src="<?php echo TPA_URL.'/assets/images/powered-by-google.png' ?>"/></td>
                <td>❌ Not Available</td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available<br/><span style="font-size:11px;font-weight:bold;">(Better than Yandex)</span></td>
                </tr>
                <tr>
                <td>Unlimited Translations</td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available<br/><span style="font-size:11px;font-weight:bold;">(Via Yandex Only)</span></td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available<br/><span style="font-size:11px;font-weight:bold;">(Via Yandex, Google)</td>
                </tr>
                <tr>
                <td>No API Key Required</td>
                <td><span style="color:green;font-size:1.4em;">✅</span> API Not Required<br/><span style="font-size:11px;font-weight:bold;">(Only Yandex Support)</span></td>
                <td><span style="color:green;font-size:1.4em;">✅</span> API Not Required<br/><span style="font-size:11px;font-weight:bold;">(Yandex, Google)</span></td>
                </tr>
                <tr>
                <td><strong>Premium Support</strong></td>
                <td>❌ Not Available<br/><strong>(Support Time: 7 – 10 days)</strong></td>
                <td><span style="color:green;font-size:1.4em;">✅</span> Available<br/><strong>(Support Time: 24 - 48 Hrs)</strong></td>
                </tr>
                </table>
            </div>
            
            <div class="tpa-license-textbox">
                <strong style="color:#e00b0b;">*Important Points</strong>
                <ol>
                    <li><b>1)</b> Automatic translate providers do not support HTML and special characters translations. So plugin will not translate any string that contains HTML or special characters.</li>
                    <li><b>2)</b> If any auto-translation provider stops any of its free translation service then plugin will not support that translation service provider.</li>
                    <li><b>3)</b> Translate plugins and themes internal strings using <a href="https://wordpress.org/plugins/automatic-translator-addon-for-loco-translate/" target="_blank">Automatic Translate Addon For Loco Translate</a>.</li>
                </ol>
                <div class="tpa-pluginby">
                    Plugin by<br/>
                    <a href="https://coolplugins.net/?utm_source=plugin_dashboard&utm_medium=image" target="_blank"><img src="<?php echo TPA_URL.'/assets/images/coolplugins-logo.png' ?>"/></a>
                </div>
            </div>
        </div>
        </div>
    </form>
    <?php
}
}
new TranslatepressAutomaticTranslateAddonFree();