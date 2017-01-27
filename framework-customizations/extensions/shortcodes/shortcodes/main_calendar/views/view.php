<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


$dt             = new DateTime( 'December 28th' );
$recurrences    = $dt->format( 'W' ); # 52
$interval       = new DateInterval( 'P1W' );
$interval_month = new DateInterval( 'P1M' );


$curr_date = time();

$curr_year        = date( 'Y' );
$prev_week_monday = new DateTime( date( 'Y-m-d', strtotime( '-1 week last Monday' ) ) );

$return = array();
foreach ( new DatePeriod( $prev_week_monday, $interval_month, $recurrences ) as $month ) {
	$return[ $month->format( 'F' ) ] = array();

	foreach ( new DatePeriod( $prev_week_monday, $interval, $recurrences ) as $date ) {

		if ( $date->format( 'Y' ) == $curr_year ) {

			$return[ $date->format( 'F' ) ][ $date->format( 'W' ) ] = array();
			foreach ( new DatePeriod( $date, new DateInterval( 'P1D' ), 6 ) as $day ) {

				$return[ $date->format( 'F' ) ][ $date->format( 'W' ) ][] = strtotime( $day->format( 'd-m-Y' ) );

			}
		}
	}
}
//foreach ( new DatePeriod( $prev_week_monday, $interval, $recurrences ) as $date ) {
//
//	if ( $date->format( 'Y' ) == $curr_year ) {
//		$return[ $date->format( 'W' ) ] = array();
//		foreach ( new DatePeriod( $date, new DateInterval( 'P1D' ), 6 ) as $day ) {
//
//			$return[ $date->format( 'W' ) ][] = strtotime( $day->format( 'd-m-Y' ) );
//
//		}
//	}
//
//
//}
global $wpdb;

$reserved = $wpdb->get_results( "SELECT `dt_event` FROM `orders` WHERE `status`=0 ORDER BY `dt_event`", ARRAY_A );
$confirm  = $wpdb->get_results( "SELECT `dt_event` FROM `orders` WHERE `status`=1 ORDER BY `dt_event`", ARRAY_A );


$result_reserved = array();

foreach ( $reserved as $key => $res ) {
	$result_reserved[] = $res['dt_event'];
}

$result_confirm = array();

foreach ( $confirm as $key => $ress ) {
	$result_confirm[] = $ress['dt_event'];
}

//fw_print( $return )
?>
<!-- start calendar.html-->

<section class="calendar">
    <div class="container">
        <h2>My Busy Calendar</h2>
        <span>Superhero is always busy helping great products with great ideas, here is my calendar:</span>
        <div class="owl-carousel">
			<?php foreach ( $return as $month => $weeks ): ?>
                <div class="item">
                    <h4><?= $month;?></h4>
                    <table>
                        <thead>
                        <tr>
                            <th></th>
                            <th>mo</th>
                            <th>tue</th>
                            <th>wed</th>
                            <th>thu</th>
                            <th>fri</th>
                            <th>sat</th>
                            <th>sun</th>
                        </tr>
                        </thead>
                        <tbody>
						<?php
						$active_week = '';
						foreach ( $weeks as $key => $value ): ?>
                            <tr>
								<?php foreach ( $value as $day ): ?>
									<?php if ( date( 'Y-m-d', $day ) < date( 'Y-m-d', time() ) ): ?>

                                        <td><?= date( 'd', $day ); ?>
											<?php if ( date( 'd', $day ) == '01' ): ?>
                                                <span class="first-date"><?= date( 'M', $day ); ?></span>
											<?php endif; ?>
                                        </td>

									<?php else:

										$active_week = 'active';

										?>
										<?php if ( array_search( $day, $result_reserved ) ): ?>
                                        <td class="reserved"><?= date( 'd', $day ); ?>
											<?php if ( date( 'd', $day ) == '01' ): ?>
                                                <span class="first-date"><?= date( 'F', $day ); ?></span>
											<?php endif; ?>
                                            <span class="day-popup">
                                    Reserved <br> <?= date( 'd F', $day ); ?><br><?= date( 'Y', $day ); ?>
                                </span>
                                        </td>
									<?php elseif ( array_search( $day, $result_confirm ) ): ?>
                                        <td class="busy_day"><?= date( 'd', $day ); ?>
											<?php if ( date( 'd', $day ) == '01' ): ?>
                                                <span class="first-date"><?= date( 'F', $day ); ?></span>
											<?php endif; ?>
                                            <span class="day-popup">
                                    Busy day <br> <?= date( 'd F', $day ); ?><br><?= date( 'Y', $day ); ?>
                                </span>
                                        </td>
									<?php else: ?>
                                        <td class="free_day open_modal" data-time="<?= $day; ?>"
                                            href="#modal1"><?= date( 'd', $day ); ?>
											<?php if ( date( 'd', $day ) == '01' ): ?>
                                                <span class="first-date"><?= date( 'F', $day ); ?></span>
											<?php endif; ?>
                                            <span class="day-popup-free_day">
                                    Book a meeting
                                </span>
                                        </td>
									<?php endif; ?>
									<?php endif; ?>

								<?php endforeach; ?>
                            </tr>
						<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
			<?php endforeach; ?>
        </div>
        <div class="calendar-row">
            <p><span class="pink"></span> — Busy day</p>
            <p><span class="yellow"></span> — Reserved but not confirmed</p>
            <p><span class="white"></span> — Feel free to book a meeting</p>
        </div>
    </div>
</section>
<!--<section class="calendar">-->
<!--    <div class="container">-->
<!--        <h2>My Busy Calendar</h2>-->
<!--        <span>Superhero is always busy helping great products with great ideas, here is my calendar:</span>-->
<!--        <table>-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th></th>-->
<!--                <th>mo</th>-->
<!--                <th>tue</th>-->
<!--                <th>wed</th>-->
<!--                <th>thu</th>-->
<!--                <th>fri</th>-->
<!--                <th>sat</th>-->
<!--                <th>sun</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--			--><?php
//			$active_week = '';
//			foreach ( $return as $key => $value ): ?>
<!--                <tr>-->
<!--                    <td class="--><? //= $active_week; ?><!--">Week --><? //= $key; ?><!--</td>-->
<!--					--><?php //foreach ( $value as $day ): ?>
<!--						--><?php //if ( date( 'Y-m-d', $day ) < date( 'Y-m-d', time() ) ): ?>
<!---->
<!--                            <td>--><? //= date( 'd', $day ); ?>
<!--								--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                    <span class="first-date">--><? //= date( 'M', $day ); ?><!--</span>-->
<!--								--><?php //endif; ?>
<!--                            </td>-->
<!---->
<!--						--><?php //else:
//
//							$active_week = 'active';
//
//							?>
<!--							--><?php //if ( array_search( $day, $result_reserved ) ): ?>
<!--                            <td class="reserved">--><? //= date( 'd', $day ); ?>
<!--								--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                    <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--								--><?php //endif; ?>
<!--                                <span class="day-popup">-->
<!--                                    Reserved <br> --><? //= date( 'd F', $day ); ?><!--<br>--><? //= date( 'Y', $day ); ?>
<!--                                </span>-->
<!--                            </td>-->
<!--						--><?php //elseif ( array_search( $day, $result_confirm ) ): ?>
<!--                            <td class="busy_day">--><? //= date( 'd', $day ); ?>
<!--								--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                    <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--								--><?php //endif; ?>
<!--                                <span class="day-popup">-->
<!--                                    Busy day <br> --><? //= date( 'd F', $day ); ?><!--<br>--><? //= date( 'Y', $day ); ?>
<!--                                </span>-->
<!--                            </td>-->
<!--						--><?php //else: ?>
<!--                            <td class="free_day open_modal" data-time="--><? //= $day; ?><!--"-->
<!--                                href="#modal1">--><? //= date( 'd', $day ); ?>
<!--								--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                    <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--								--><?php //endif; ?>
<!--                                <span class="day-popup-free_day">-->
<!--                                    Book a meeting-->
<!--                                </span>-->
<!--                            </td>-->
<!--						--><?php //endif; ?>
<!--						--><?php //endif; ?>
<!---->
<!--					--><?php //endforeach; ?>
<!--                </tr>-->
<!--			--><?php //endforeach; ?>
<!--            </tbody>-->
<!--        </table>-->
<!--        <div class="calendar-row">-->
<!--            <p><span class="pink"></span> — Busy day</p>-->
<!--            <p><span class="yellow"></span> — Reserved but not confirmed</p>-->
<!--            <p><span class="white"></span> — Feel free to book a meeting</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->