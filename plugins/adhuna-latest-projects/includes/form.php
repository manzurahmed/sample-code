<h4><?php esc_html_e( 'Display Options', 'adhunaa-latpro' ); ?>:</h4>

<p>
    <label for="<?php echo $field_ids[ 'title' ]; ?>"><?php $text = 'Title:'; esc_html_e( $text ); ?></label>
    <input class="widefat" id="<?php echo $field_ids[ 'title' ]; ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<p>
    <label for="<?php echo $field_ids[ 'number_posts' ]; ?>"><?php $text = 'Number of posts to show:'; esc_html_e( $text ); ?></label>
    <input id="<?php echo $field_ids[ 'number_posts' ]; ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" type="text" value="<?php echo $ints[ 'number_posts' ]; ?>" size="3" />
</p>
<!-- Category Select Menu -->
<p><label for="<?php echo $field_ids[ 'category_ids' ];?>"><?php esc_html_e( 'Show posts of selected categories only?', 'adhunaa-latpro' ); ?></label><br />
<?php echo $selection_element; ?><br />
