<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


global $wpdb;

$reserved = $wpdb->get_results( "SELECT `dt_event` FROM `orders` WHERE `status`=0 ORDER BY `dt_event`", ARRAY_A );
$confirm  = $wpdb->get_results( "SELECT `dt_event` FROM `orders` WHERE `status`=1 ORDER BY `dt_event`", ARRAY_A );


$result_reserved = array();

foreach ( $reserved as $key => $res ) {
	$result_reserved[] = date('Y-n-j',$res['dt_event']);
}

$result_confirm = array();

foreach ( $confirm as $key => $ress ) {
	$result_confirm[] = date('Y-n-j',$ress['dt_event']);
}

//fw_print( $return )
?>

<section class="calendar">
    <div class="container">
        <h2>My Busy Calendar</h2>
        <span>Superhero is always busy helping great products with great ideas, here is my calendar:</span>
        <div class="owl-carousel">
			<?php
			$current_year = date( 'Y' );
			for ( $i = 0; $i <= 11; $i ++ ):
                $m = date( 'n' ) + $i;
				?>
                <div class="item">
                    <h4><?php echo date( 'F', strtotime( "$current_year-$m-01" ) ); ?></h4>
					<?php echo draw_calendar( $m, $current_year,$result_reserved, $result_confirm );
					if ( $m == 12 ) {
						$current_year = $current_year + 1;

					}
					?>
                    <!--                <table>-->
                    <!--                    <thead>-->
                    <!--                    <tr>-->
                    <!--                        <th>mo</th>-->
                    <!--                        <th>tue</th>-->
                    <!--                        <th>wed</th>-->
                    <!--                        <th>thu</th>-->
                    <!--                        <th>fri</th>-->
                    <!--                        <th>sat</th>-->
                    <!--                        <th>sun</th>-->
                    <!--                    </tr>-->
                    <!--                    </thead>-->
                    <!--                    <tbody>-->
                    <!--                    <tr >-->
                    <!---->
                    <!--                        <td>30</td>-->
                    <!--                        <td>1-->
                    <!--                            <span class="first-date">November</span></td>-->
                    <!--                        <td>2</td>-->
                    <!--                        <td>3</td>-->
                    <!--                        <td>4</td>-->
                    <!--                        <td>5</td>-->
                    <!--                        <td>6</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr>-->
                    <!---->
                    <!--                        <td>7</td>-->
                    <!--                        <td >8-->
                    <!--                            <span class="day-popup open_modal" href="#modal1" >-->
                    <!---->
                    <!--                  Book 31 November 2016-->
                    <!--                </span>-->
                    <!--                        </td>-->
                    <!--                        <td class="busy_day">9-->
                    <!--                            <span class="day-popup open_modal" href="#modal1" >-->
                    <!---->
                    <!--                  Book <br> 31 November <br>2016-->
                    <!--                </span></td>-->
                    <!--                        <td class="reserved">10-->
                    <!--                            <span class="day-popup open_modal" href="#modal1" >-->
                    <!---->
                    <!--                  Book <br> 31 November<br> 2016-->
                    <!--                </span></td>-->
                    <!--                        <td class="free_day">11-->
                    <!--                            <span class="day-popup-free_day open_modal" href="#modal1" >-->
                    <!---->
                    <!--                  Book a meeting-->
                    <!--                </span></td>-->
                    <!--                        <td class="free_day">12</td>-->
                    <!--                        <td class="free_day">13</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr>-->
                    <!---->
                    <!--                        <td class="active" >14</td>-->
                    <!--                        <td class="active" >15</td>-->
                    <!--                        <td class="active" >16</td>-->
                    <!--                        <td class="active" >17</td>-->
                    <!--                        <td class="active" >18</td>-->
                    <!--                        <td class="active" >19</td>-->
                    <!--                        <td class="active" >20</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr>-->
                    <!---->
                    <!--                        <td class="active">21</td>-->
                    <!--                        <td class="active">22</td>-->
                    <!--                        <td class="active">23</td>-->
                    <!--                        <td class="active">24</td>-->
                    <!--                        <td class="active">25</td>-->
                    <!--                        <td class="active">26</td>-->
                    <!--                        <td class="active">27</td>-->
                    <!--                    </tr>-->
                    <!--                    <tr >-->
                    <!---->
                    <!--                        <td class="active">28</td>-->
                    <!--                        <td class="active">29</td>-->
                    <!--                        <td class="active">30</td>-->
                    <!--                        <td class="active">1-->
                    <!--                            <span class="first-date">December</span>-->
                    <!--                        </td>-->
                    <!--                        <td class="active">2</td>-->
                    <!--                        <td class="active">3</td>-->
                    <!--                        <td class="active">4</td>-->
                    <!--                    </tr>-->
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                    <!---->
                    <!--                    </tbody>-->
                    <!--                </table>-->
                </div>
			<?php endfor; ?>
        </div>
        <div class="calendar-row">
            <p><span class="pink"></span> — Busy day</p>
            <p><span class="yellow"></span> — Reserved but not confirmed</p>
            <p><span class="white"></span> — Feel free to book a meeting</p>
        </div>
    </div>
</section>

<? //
//	echo draw_calendar(1,2016);
//	?>

<!--<section class="calendar">-->
<!--    <div class="container">-->
<!--        <h2>My Busy Calendar</h2>-->
<!--        <span>Superhero is always busy helping great products with great ideas, here is my calendar:</span>-->
<!--        <div class="owl-carousel">-->
<!--			--><?php //foreach ( $return as $month => $weeks ): ?>
<!--                <div class="item">-->
<!--                    <h4>--><? //= $month; ?><!--</h4>-->
<!--                    <table>-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th></th>-->
<!--                            <th>mo</th>-->
<!--                            <th>tue</th>-->
<!--                            <th>wed</th>-->
<!--                            <th>thu</th>-->
<!--                            <th>fri</th>-->
<!--                            <th>sat</th>-->
<!--                            <th>sun</th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!--						--><?php
//						$active_week = '';
//						foreach ( $weeks as $key => $value ): ?>
<!--                            <tr>-->
<!--								--><?php //foreach ( $value as $day ):
//									if ( ! empty( $day ) ):
//										?>
<!--										--><?php //if ( date( 'Y-m-d', $day ) < date( 'Y-m-d', time() ) ): ?>
<!---->
<!--                                        <td>--><? //= date( 'd', $day ); ?>
<!--											--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                                <span class="first-date">--><? //= date( 'M', $day ); ?><!--</span>-->
<!--											--><?php //endif; ?>
<!--                                        </td>-->
<!---->
<!--									--><?php //else:
//
//										$active_week = 'active';
//
//										?>
<!--										--><?php //if ( array_search( $day, $result_reserved ) ): ?>
<!--                                        <td class="reserved">--><? //= date( 'd', $day ); ?>
<!--											--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                                <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--											--><?php //endif; ?>
<!--                                            <span class="day-popup">-->
<!--                                    Reserved <br> --><? //= date( 'd F', $day ); ?><!--<br>--><? //= date( 'Y', $day ); ?>
<!--                                </span>-->
<!--                                        </td>-->
<!--									--><?php //elseif ( array_search( $day, $result_confirm ) ): ?>
<!--                                        <td class="busy_day">--><? //= date( 'd', $day ); ?>
<!--											--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                                <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--											--><?php //endif; ?>
<!--                                            <span class="day-popup">-->
<!--                                    Busy day <br> --><? //= date( 'd F', $day ); ?><!--<br>--><? //= date( 'Y', $day ); ?>
<!--                                </span>-->
<!--                                        </td>-->
<!--									--><?php //else: ?>
<!--                                        <td class="free_day open_modal" data-time="--><? //= $day; ?><!--"-->
<!--                                            href="#modal1">--><? //= date( 'd', $day ); ?>
<!--											--><?php //if ( date( 'd', $day ) == '01' ): ?>
<!--                                                <span class="first-date">--><? //= date( 'F', $day ); ?><!--</span>-->
<!--											--><?php //endif; ?>
<!--                                            <span class="day-popup-free_day">-->
<!--                                    Book a meeting-->
<!--                                </span>-->
<!--                                        </td>-->
<!--									--><?php //endif; ?>
<!--									--><?php //endif; ?>
<!---->
<!--										--><?php
//									else:?>
<!--                                        <td></td>-->
<!--										--><?php
//									endif;
//								endforeach; ?>
<!--                            </tr>-->
<!--						--><?php //endforeach; ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!--                </div>-->
<!--			--><?php //endforeach; ?>
<!--        </div>-->
<!--        <div class="calendar-row">-->
<!--            <p><span class="pink"></span> — Busy day</p>-->
<!--            <p><span class="yellow"></span> — Reserved but not confirmed</p>-->
<!--            <p><span class="white"></span> — Feel free to book a meeting</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
