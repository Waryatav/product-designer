<h1>Заявки</h1>
<?php //fw_print($orders); ?>
<table class="table table-responsive">
    <tr>
        <th>Дата добавления</th>
        <th>Дата события</th>
        <th>Имя</th>
        <th>Город</th>
        <th>Услуга</th>
        <th>Бюджет</th>
        <th>Почта</th>
        <th>Номер телефона</th>
        <th>Статус</th>
    </tr>
    <?php foreach ( $orders as $order ) {
        ?>
        <tr>
            <td><?= date( 'd-m-Y H:i', $order['dt_add'] ); ?></td>
            <td><?= date( 'd-m-Y', $order['dt_event'] ); ?></td>
            <td><?= $order['name']; ?></td>
            <td><?= $order['city']; ?></td>
            <td><?= $order['service']; ?></td>
            <td><?= $order['budget']; ?></td>
            <td><?= $order['mail']; ?></td>
            <td><?= $order['phone']; ?></td>
            <?php if ( $order['status'] == 0 ) : ?>
                <td>На утверждении</td>
            <?php elseif ( $order['status'] == 1 ): ?>
                <td>Подтверждена</td>
            <?php elseif ( $order['status'] == 2 ): ?>
                <td>Отклонена</td>
            <?php endif; ?>
            <td><a class="button action" href="admin.php?page=order&reject=<?= $order['id']; ?>">Отклонить</a></td>
            <td><a class="button action" href="admin.php?page=order&confirm=<?= $order['id']; ?>">Принять</a></td>
        </tr>

    <?php } ?>
</table>
