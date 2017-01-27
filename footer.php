<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package product-designer
 */
$services = fw_get_db_customizer_option( 'services' );
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <!--		<div class="site-info">-->
    <!--			<a href="--><?php //echo esc_url( __( 'https://wordpress.org/', 'product-designer' ) ); ?><!--">-->
	<?php //printf( esc_html__( 'Proudly powered by %s', 'product-designer' ), 'WordPress' ); ?><!--</a>-->
    <!--			<span class="sep"> | </span>-->
    <!--			--><?php //printf( esc_html__( 'Theme: %1$s by %2$s.', 'product-designer' ), 'product-designer', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?>
    <!--		</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->
<div class="modal_form modal_div" id="modal1">
    <span class="modal_close"></span>
    <h2>Book a meeting online</h2>
    <span id="date-event-info">November 31, 2016</span>
    <div class="wrap-form">
        <form action="">
            <div class="form_row">
                <label>Hello, Sam. I'm</label><input type="text" class="vItem2 width-dynamic contact_us_js_name2"
                                                     required>
                <label>from</label><input type="text" class="vItem2 contact_us_js_city2 width-dynamic" required>
            </div>
            <div class="form_row">
                <label>we need</label>
                <select name="" id="" class="vItem2 contact_us_js_we_need2" requiredщц>
                    <option value=""></option>
					<?php foreach ( $services as $key=>$service ): ?>
                        <option data-id="<?= $key;?>" value="<?= $service['title'];?>"><?= $service['title'];?></option>
					<?php endforeach; ?>
                </select>
                <label>and our budget is</label><input type="text" class="contact_us_js_budget2"
                                                       placeholder="">
            </div>
            <div class="form_row">
                <label for="v_mail">contact me via mail </label><input id="v_mail2" name="v_mail2" type="text"
                                                                       class="width-dynamic vItem2 contact_us_js_mail2"
                                                                       required>
                <label>or via phone nr. </label><input class="contact_us_js_phone2" type="text">
            </div>
            <button class="send_msg  modal_form-end-btn" id="subm2" href="#modal2" type="submit">Book a meeting</button>
            <input id="date-event" type="hidden">
        </form>
    </div>
</div>
<div class="modal_form modal_div" id="modal2">
    <span class="modal_close"></span>
    <h2>Meeting booked</h2>
    <span>Now it's yellow in my calendar, need to confirm it via phone or mail, with you.</span>
    <div class="thumb">
        <img src="<?= get_template_directory_uri(); ?>/img/success.png" alt="">
    </div>
    <h3 id="text-after-send">November 31, 2016. Meeting with Sam Mountain to discuss Marvel Website design.</h3>
    <a class="send_msg" type="submit">Add to your google calendar</a>
</div>
<div id="overlay"></div>
<?php
wp_footer(); ?>

</body>
</html>
