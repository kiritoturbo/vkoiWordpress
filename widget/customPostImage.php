<?php 
// Tạo class widget tùy chỉnh
class Custom_Recent_Posts_Widget extends WP_Widget {

    // Constructor
    public function __construct() {
        parent::__construct(
            'custom_recent_posts_widget',
            'Custom Recent Posts',
            array( 'description' => 'A custom widget to display recent posts with thumbnails.' )
        );
    }

    // Hiển thị widget
    public function widget( $args, $instance ) {
        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $query_args = array(
            'post_type'      => 'post',
            'posts_per_page' => $number,
        );

        $recent_posts = new WP_Query( $query_args );

        if ( $recent_posts->have_posts() ) {
            while ( $recent_posts->have_posts() ) {
                $recent_posts->the_post();
                ?>
                <div class="recent-post d-flex">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo 'No recent posts.';
        }

        echo $args['after_widget'];
    }

    // Form cài đặt widget
    public function form( $instance ) {
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'number' ); ?>">Number of posts to display:</label>
            <input type="number" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $number; ?>" />
        </p>
        <?php
    }
	// Lưu cài đặt widget
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = !empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number'] = !empty( $new_instance['number'] ) ? absint( $new_instance['number'] ) : 5;
		return $instance;
	}
}
?>