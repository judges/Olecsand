<?php
echo form_open('bascet/send_reguest');
echo '<table>';
echo '<thead>Оформление заказа</thead>';
echo '<tbody>';
echo '<th></th>';
echo '<th>Серийной номер</th>';
echo '<th>Описание</th>';
echo '<th>Цена</th>';
echo '<th>Количество</th>';
echo '</tbody>';
$j=0;
foreach ($query as $product => $details) {
    foreach ($details as $keys) {
    echo '<tr>';
        echo '<td><a class="info" target="_new" href="'.$this->config->site_url().'/../uploads/'.$keys->photo.'">';
        echo '<img src="'.$this->config->site_url().'/../uploads/'.$keys->photo.'" width="150" height="100"></a></td>';
        echo '<td>'.$keys->serialnum;
        echo '<input type="hidden" name="product['.$j.']" value="'.$keys->id.'"></td>';
        echo '<td>'.$keys->description.'</td>';
        echo '<td>'.$keys->price.'</td>';
        echo '<td><input type="text" size="3" value="1" name="count['.$j.']"></td>';
    echo '</tr>';
    }
    $j++;
}
echo '</table>';
echo '<input type="submit" value="Отправить запрос" /></form>';

?>