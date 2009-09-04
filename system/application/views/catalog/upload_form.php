    <div id="maincolumn">
        <!-- content -->
            <?php echo $error;?>
            <?php
                echo '<b>Серійний номер: </b>'.$product[0]->serialnum.'<br><br>';
                echo '<b>Описание: </b>'.$product[0]->description.'<br><br>';
                echo '<b>Цена: </b>'.$product[0]->price.'<br><br><hr>';
            ?>
            Добовляем к продукту фотографию: 
            <?php echo form_open_multipart('catalog/do_upload/'.$this->uri->segment(3));?>
            <input type="file" name="userfile" size="20" />
            <?php echo form_hidden('product_id',$this->uri->segment(3))?>
            <br><br><input type="submit" name ="do" value="Загрузить" /> 
            <?php echo anchor('catalog/index/-1','Оставить без фотографий', 'style="color:black;"')?>
            </form>
        <!-- content -->
    </div>