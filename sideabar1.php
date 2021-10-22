<div id="sidebar">

	<?php appthemes_before_sidebar_widgets( 'dashboard' ); ?>

	<aside id="dashboard-side-nav">

		<div class="avatar">
			<?php if ( $is_own_dashboard ) {
				echo html_link( va_dashboard_url( 'listings', $dashboard_user->ID, true ), get_avatar( $dashboard_user->ID, 45 ) );
			 } else {
				 echo html_link( va_dashboard_url( 'listings', $dashboard_user->ID ), get_avatar( $dashboard_user->ID, 45 ) );
			 }
			?>
		</div>
		<div class="user_meta">
			<p><?php $is_own_dashboard ? _e( 'Welcome, ' , APP_TD ) : ''; ?><b><?php echo $dashboard_user->display_name; ?></b></p>
			<p class="smaller"><?php _e( 'Member Since: ', APP_TD ); ?><?php echo mysql2date( get_option('date_format'), $dashboard_user->user_registered ); ?></p>
		</div>
		<ul class="links">
			<?php if ( $is_own_dashboard ) {
				echo html( 'li', array( 'class' => 'faves' ), html_link( va_dashboard_url( 'favorites', $dashboard_user->ID, $is_own_dashboard ), __( 'Favorite Listings', APP_TD ) ) );
			} ?>
			<?php echo html( 'li', array( 'class' => 'reviews' ), html_link( va_dashboard_url( 'reviews', $dashboard_user->ID, $is_own_dashboard ), __( 'View Reviews', APP_TD ) ) ); ?>
			<?php echo html( 'li', array( 'class' => 'view-listings' ), html_link( va_dashboard_url( 'listings', $dashboard_user->ID, $is_own_dashboard ), __( 'View Listings', APP_TD ) ) ); ?>

			<?php do_action( 'va_dashboard_sidebar_links', $dashboard_user, $is_own_dashboard ); ?>

			<?php if ( $is_own_dashboard ) { ?>
			<li class="edit-profile"><?php echo html_link( appthemes_get_edit_profile_url(), __( 'Edit Profile', APP_TD ) ); ?></li>
			<li class="add-listings"><?php echo html_link( va_get_listing_create_url(), __( 'New Listing', APP_TD ) ); ?></li>
			<?php if ( $dashboard_user->has_claimed ) { ?>
				<li class="claimed-listings"><?php echo html_link( va_dashboard_url( 'claimed-listings', $dashboard_user->ID, $is_own_dashboard ), __( 'Claimed Listings', APP_TD ) ); ?></li>
			<?php } ?>
			<?php } ?>
		</ul>

	</aside>

	<?php if ( va_dashboard_show_account_info( $dashboard_user, $is_own_dashboard ) ) { ?>

	<aside id="dashboard-acct-info">
		<div class="section-head">
			<h3><?php _e( 'Account Information', APP_TD ); ?></h3>
		</div>

		<ul class="links">
			<?php if ( $is_own_dashboard || ! empty( $dashboard_user->email_public ) ) { ?>
			<li class="email"><a href="mailto:<?php echo $dashboard_user->user_email; ?>"><?php echo $dashboard_user->user_email; ?></a></li>
			<?php } ?>
			<?php if ( ! empty( $dashboard_user->twitter ) && $is_own_dashboard || ! empty( $dashboard_user->twitter ) ) { ?>
			<li class="twitter"><a href="<?php echo $dashboard_user->twitter; ?>" target="_blank"><?php echo $dashboard_user->twitter; ?></a></li>
			<?php } ?>
			<?php if ( ! empty( $dashboard_user->facebook ) && $is_own_dashboard || ! empty( $dashboard_user->facebook ) ) { ?>
			<li class="facebook"><a href="<?php echo $dashboard_user->facebook; ?>" target="_blank"><?php echo $dashboard_user->facebook; ?></a></li>
			<?php } ?>
			<?php if ( ! empty( $dashboard_user->user_url ) && $is_own_dashboard || ! empty( $dashboard_user->user_url ) ) { ?>
			<li class="website"><a href="<?php echo $dashboard_user->user_url; ?>" target="_blank"><?php echo $dashboard_user->user_url; ?></a></li>
			<?php } ?>
		</ul>

		<?php do_action( 'va_dashboard_sidebar_account_info', $dashboard_user, $is_own_dashboard ); ?>

	</aside>

	<?php }

	if ( $is_own_dashboard ) { ?>
	<aside id="dashboard-acct-stats">
		<div class="section-head">
			<h3><?php _e( 'Account Statistics', APP_TD ); ?></h3>
		</div>
		<?php va_dashboard_user_stats_ui( $dashboard_user ); ?>
		<div class="clear"></div>
	</aside>
	<?php } ?>

	<?php dynamic_sidebar( 'dashboard' ); ?>

	<?php appthemes_after_sidebar_widgets( 'dashboard' ); ?>
</div>
