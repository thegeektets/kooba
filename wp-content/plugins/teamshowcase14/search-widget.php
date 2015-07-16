<?php
/**
 * Widget
 */
class Tshowcase_Search_Widget extends WP_Widget

{
	public

	function __construct()
	{
		$options = get_option( 'tshowcase-settings' );
		$name = $options['tshowcase_name_singular'];
		$nameplural = $options['tshowcase_name_plural'];
		$widgetname = $nameplural." Search Form";
		$widget_ops = array(
			'classname' => 'tshowcase_widget',
			'description' =>  $name . ' Search Form'
		);
		parent::__construct( 'tshowcase_widget', $widgetname, $widget_ops);
	}

	public

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$taxonomies = $instance['taxonomies'];
		$custom_fields = $instance['custom_fields'];
		$url = $instance['url'];
		echo $before_widget;
		if (!empty($title)) echo $before_title . $title . $after_title;
		echo tshowcase_search_form ($title,$taxonomies,$custom_fields,$url);
		echo $after_widget;
	}

	public

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['taxonomies'] = $new_instance['taxonomies'];
		$instance['custom_fields'] = $new_instance['custom_fields'];
		$instance['url'] = strip_tags($new_instance['url']);
		return $instance;
	}

	public

	function form($instance)
	{
		$options = get_option( 'tshowcase-settings' );
		$groups = $options['tshowcase_name_category'];
		global $ts_labels;
		$instance = wp_parse_args((array)$instance, array(
			'title' => '',
			'taxonomies' => '0',
			'custom_fields' => '0',
			'url' => ''
		));
		$title = strip_tags($instance['title']);
		$taxonomies = $instance['taxonomies'];
		$custom_fields = $instance['custom_fields'];
		$url = strip_tags($instance['url']);
		
?>
        <p><label for="<?php
		echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input class="widefat" id="<?php
		echo $this->get_field_id( 'title' ); ?>" name="<?php
		echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php
		echo esc_attr($title); ?>" /></p>

		 <p>
         <label for="<?php
		echo $this->get_field_id( 'taxonomies' ); ?>">Display <?php echo $groups; ?> Filter:<br />
        </label>
        <select id="<?php
		echo $this->get_field_id( 'taxonomies' ); ?>" name="<?php
		echo $this->get_field_name( 'taxonomies' ); ?>">
          <option value="true" <?php
		selected($taxonomies, 'true' ); ?>>Yes</option>
          <option value="false" <?php
		selected($taxonomies, 'false' ); ?>>No</option>
        </select></p>

        <!-- NOT AVAILABLE YET
		<p><label for="<?php
		echo $this->get_field_id( 'custom_fields' ); ?>">Search <?php echo $ts_labels['titles']['info']; ?> Fields:</label>
         <select id="<?php
		echo $this->get_field_id( 'custom_fields' ); ?>" name="<?php
		echo $this->get_field_name( 'custom_fields' ); ?>">
          <option value="true" <?php
		selected($custom_fields, 'true' ); ?>>Yes</option>
          <option value="false" <?php
		selected($custom_fields, 'false' ); ?>>No</option>
        </select>
        <span class="howto">Will slow down search if active</span></p>
    	-->

		<p><label for="<?php
		echo $this->get_field_id( 'url' ); ?>">Results URL:</label>
        <input class="widefat" id="<?php
		echo $this->get_field_id( 'url' ); ?>" name="<?php
		echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php
		echo esc_attr($url); ?>" />
		<span class="howto">Include the URL of the page where you applied a Team Showcase shortcode. If empty it will default to the search results page template of current Theme.</span>
		</p>
       
        <?php
	}
}

add_action( 'widgets_init', 'register_tshowcase_search_widget' );
/**
 * Register widget
 *
 * This functions is attached to the 'widgets_init' action hook.
 */

function register_tshowcase_search_widget()
{
	register_widget( 'Tshowcase_Search_Widget' );
}


function tshowcase_search_form ($title,$taxonomies,$custom_fields,$url) { 


	tshowcase_add_search_css();

	$options = get_option( 'tshowcase-settings' );
	$nameplural = $options['tshowcase_name_plural'];
	$groups = $options['tshowcase_name_category'];
	global $ts_labels;

	$placeholder = $ts_labels['search']['search']." ". $nameplural;

	$value = (isset($_GET['s']) ? $_GET['s'] : '');
	$value = (isset($_GET['search']) ? $_GET['search'] : $value);

	$cat = (isset($_GET['tshowcase-categories']) ? $_GET['tshowcase-categories'] : '');

	$html = '';
	$hiddentype = '';
	$searchstring = 'search';

	if($url == "") {
		$url = site_url('/');
		$hiddentype = '<input type="hidden" name="post_type" value="tshowcase" />';
		$searchstring = 's';
	}


    $html .= '<form role="search" action="'.$url.'" method="get" id="tshowcasesearch">';
    $html .= '<input type="text" name="'.$searchstring.'" placeholder="'.$placeholder.'" class="ts_text_search" value="'.$value.'" />';

   if($taxonomies=="true") { 
     
      $html .= '<select id="tshowcase-categories" name="tshowcase-categories" class="ts_select_categories">';
      $html .= '      <option value="">'.$ts_labels['search']['all-taxonomies'].' '.$groups. '</option>';
            
				 $terms = get_terms("tshowcase-categories");
				 $count = count($terms);
				
				 if ( $count > 0 ){
					 
					 foreach ( $terms as $term ) { 
					 	$selected = '';
					 	if($cat==$term->slug) {
					 		$selected = ' selected ';
					 	}
					    $html .= '<option value="'.$term->slug.'" '.$selected.'>'.$term->name.'</option>';
						}
					 
				 }
		
		
        $html .= '    </select>';
           
     } 

   $html .= $hiddentype;
   $html .= ' <input type="submit" alt="Search" value="Search" />';
   $html .= '	</form>';

   return $html;

}

function tshowcase_add_search_css() {
       		wp_deregister_style( 'tshowcase-search-style' );
		    wp_register_style( 'tshowcase-search-style', plugins_url( '/css/search-forms.css', __FILE__ ),array(),false,'all');
			wp_enqueue_style( 'tshowcase-search-style' );	

    } 


?>