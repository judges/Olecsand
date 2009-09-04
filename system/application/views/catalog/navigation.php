 <div id="sections">
     <h2><?php echo anchor('magazin/index','НА ГЛАВНУЮ')?></h2>
     <hr>
     <p class="rMenuActiv" style="padding-left:10px;">
         <?php 
            if ($this->dx_auth->is_admin()) {
                echo anchor('catalog/new_product','Добавить товар').'<br>';
            }
            if ($this->session->userdata('bascet')){
            //echo anchor('bascet/ceck_out', 'У ваc - '.count($this->session->userdata('bascet')).' продуктов в корзине<br><br>');
            echo anchor('bascet/ceck_out', 'Оформить заказ').'<br><br>';
            }
            echo anchor('auth/logout', 'Виход с каталога').'<br>';
         ?>
     </p>
     <hr>
     <h2><?php echo anchor('catalog/index/-1','Все продукты')?></h2>
     <?php
        foreach ($production->result() as $type) {
                echo '<h2>'.anchor("catalog/index/".$type->id, $type->name).'</h2>';
        }
     ?>
    <!--
    <h2><?php echo anchor('catalog/index/0','Основные ткани')?></h2>
    <ul>
        <li>Тафта</li>
        <li>Атлас</li>
        <li>Сатин</li>
        <li>Фатин</li>
        <li>Жаккард</li>
        <li>Кристаллин</li>
    </ul>
    <h2><?php echo anchor('catalog/index/1','Акссесуары для шитья')?></h2>
    <ul>
        <li>Клей</li>
        <li>Нитки</li>
        <li>Шнурки</li>
        <li>Молнии</li>
        <li>Регилин</li>
        <li>Косая бейка</li>
        <li>Камни-пластик</li>
    </ul>
    <h2><?php echo anchor('catalog/index/2','Воздушно-прозрачные ткани')?></h2>
    <ul>
        <li>Вуаль</li>
        <li>Креш</li>
        <li>Гофре</li>
        <li>Органза</li>
        <li>Плиссиры</li>
    </ul>
    <h2><?php echo anchor('catalog/index/3','Изысканные ткани')?></h2>
    <ul>
        <li>Фата</li>
        <li>Шелк</li>
        <li>Гипюр</li>
        <li>Дюпон</li>
        <li>Шифон</li>
        <li>Макраме</li>
        <li>Шантунг</li>
        <li>Шантилье</li>
        <li>Расшитые кружева</li>
    </ul>
    <h2><?php echo anchor('catalog/index/4','Хрустальные компоненты')?></h2>
    <ul>
        <li>Cваровски</li>
        <li>Бусины</li>
        <li>Подвески</li>
        <li>Пуговицы</li>
        <li>Клеевые стразы</li>
        <li>Пришивные стразы</li>
        <li>Хрустальный жемчуг</li>
        <li>Термоклеевые стразы</li>
    </ul>
    <h2><?php echo anchor('catalog/index/5','Аппликации и кружева')?></h2>
    <ul>
        <li>Тесьма</li>
        <li>Модули</li>
        <li>Кружева</li>
        <li>Бордюры</li>
        <li>Аппликации</li>
    </ul>
    <h2><?php echo anchor('catalog/index/6','ТЦ «Добробут»')?></h2>
    <ul>
        <li>Галерея №1</li>
    </ul>
    -->
 </div>

</div>
