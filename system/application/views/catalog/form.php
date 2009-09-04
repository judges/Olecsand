<!-- content -->
<div id="main">
        <?php echo form_open('catalog/new_product');?>
        Серійний номер: <input type="text" name="serialnum" size="10" /><br><br>
        Опис продукту: <input type="text" name="description" size="50" /><br><br>
        Ціна: <input type="text" name="price" size="6" /><br><br>
        Наявність продукту:  <input type="checkbox" name="status" checked/><br><br>
        В каком магазине его можно найти 
        <select name="type_id">
            <?php
                foreach ($production->result() as $type) {
                    echo '<option value="'.$type->id.'">'.$type->name.'</option>';
            }
            ?>
        </select> <br><br>
        <input type="submit" value="Добавить продукт" />
        </form>
        <!-- content -->
</div>