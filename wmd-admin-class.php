<?php
    /*
    Copyright (c) 2010 Thomas Pelletier

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
    */
    $root = dirname(dirname(dirname(dirname(__FILE__))));
    if (file_exists($root.'/wp-load.php')) {
	    // WP 2.6
	    require_once($root.'/wp-load.php');
    }

    class wmd_admin {
        var $version = '1.0';
        var $wmd_admin_path = "";
        
        function trailingslashit($string) {
            if ( '/' != substr($string, -1)) {
                $string .= '/';
            }
            return $string;
        }
        
    	function deactivate()
    	{}

    	function activate()
    	{
    		global $current_user;
    		update_user_option($current_user->id, 'rich_editing', 'false', true);
    	}
        
        function wmd_admin() {
            $plugin_dir = basename(dirname(__FILE__));
    		$this->siteurl = $this->trailingslashit(get_option('siteurl'));;
    		$this->wmd_admin_path =  $this->siteurl .'wp-content/plugins/' . basename(dirname(__FILE__)) .'/wmd/';
        }
        
        function add_admin_footer() {
            ?>
                <script type="text/javascript">
                
                    var $j = jQuery.noConflict();
                    
                    $j('textarea').addClass('wmd-ignore');
                    $j('#editorcontainer textarea').removeClass('wmd-ignore');
                    $j('#post-status-info').after('<div class="wmd-preview"></div>');
                    $j('#quicktags #ed_toolbar').hide();
                    
                </script>
            <script type="text/javascript" src="<?php echo $this->wmd_admin_path; ?>wmd.js"></script>
            <?php
        }
    }
    $wmd_admin = new wmd_admin();
?>