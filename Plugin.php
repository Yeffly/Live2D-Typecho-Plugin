<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;?>
<?php
/**
 * 把可爱的 Pio 捉到博客上吧！
 *  
 * 
 * @package Live2D
 * @author 熊猫小A
 * @version 1.1
 * @link https://imalan.cn
 */

define('Live2D_Plugin_VERSION', '1.1');
class Live2D_Plugin implements Typecho_Plugin_Interface
{   
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('Live2D_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('Live2D_Plugin', 'footer');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
   
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
        $homeURL = new Typecho_Widget_Helper_Form_Element_Textarea('homeURL', NULL, '', _t('主页链接'), _t('主页链接，以“/”结尾'));
        $form->addInput($homeURL);
        echo '<p>本插件需要加载jQuery与Font Awesome，如果你的主题没有引用请选择加载。<br />关于提示语的修改，请直接编辑 message.json。</p>';
        $l2dst= new Typecho_Widget_Helper_Form_Element_Checkbox('l2dst',  array(
            'jq' => _t('配置是否加载JQuery：勾选则加载不勾选则不加载'),'fa'=>_t('配置是否加载Font Awesome：勾选则加载不勾选则不加载')
        ),
        array('jq','fa'), _t('基本设置'));
        $form->addInput($l2dst);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 输出头部css
     * 
     * @access public
     * @return void
     */
    public static function header(){
        echo '<link rel="stylesheet" href="/usr/plugins/Live2D/css/live2d.min.css?v='.Live2D_Plugin_VERSION.'" />';
        if (!empty(Helper::options()->plugin('Live2D')->l2dst) && in_array('fa', Helper::options()->plugin('Live2D')->l2dst))
        {
            echo '<link rel="stylesheet" href="/usr/plugins/Live2D/css/font-awesome.min.css?v='.Live2D_Plugin_VERSION.'" />';
        }

    }

    /**
     * 在底部输出所需 JS
     * 
     * @access public
     * @return void
     */
	public static function footer(){
        self::insertLive2D();
        echo '
            <script type="text/javascript" src="/usr/plugins/Live2D/js/live2d.min.js?v='.Live2D_Plugin_VERSION.'"></script>
            <script type="text/javascript" src="/usr/plugins/Live2D/js/initlive2d.min.js?v='.Live2D_Plugin_VERSION.'"></script>
        ';
        if (!empty(Helper::options()->plugin('Live2D')->l2dst) && in_array('jq', Helper::options()->plugin('Live2D')->l2dst)){
            echo '<script  src="'.Helper::options()->pluginUrl . '/Live2D/js/jquery.min.js?v='.Live2D_Plugin_VERSION.'"></script>' . "\n";   }
    }


    /**
     * 在 Body 标签内插入 Live2D 块
     * @access public
     * @return void
     */
    public static function insertLive2D(){
        $html='<canvas id="live2d" class="live2d" width="280" height="250"></canvas>
        <div id="landlord" homeurl="'.Typecho_Widget::widget('Widget_Options')->plugin('Live2D')->homeURL.'">
        <div id="message" class="message"></div>       
        <div id="live2d-tools">
            <a href="/"><span id="live2d-button-home" class="fa fa-home live2d-button"></span></a>
            <span id="live2d-button-change" class="fa fa-refresh live2d-button"></span>
            <span id="live2d-button-comment" class="fa fa-comment live2d-button" style="font-size:18px"></span>
            <span id="live2d-button-photo" class="fa fa-camera live2d-button" style="font-size:17px"></span>
            <span id="live2d-button-hide" class="fa fa-close live2d-button" style="font-size:22px"></span>
        </div>
        </div>';
        echo $html;
    }
}
?>
