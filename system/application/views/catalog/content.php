        <!-- content -->
        <div id="main">
        <table border="0" align="center" cellpadding="0" cellspacing="5 px" class="pl">
        <?php
            $i=1;$j=1;
            foreach($query->result() as $row){
                if ($i==6){echo '</tr><tr valign="middle">';$i=1;}
                echo '<td height="150" align="center" valign="middle" style="width: 100px;background-color: #CCCCCC;">';
                echo '<a class="info" target="_new" href="'.$this->config->site_url().'/../uploads/'.$row->photo.'">';
                echo '<img src="'.$this->config->site_url().'/../uploads/'.$row->photo.'" width="150" height="100"></a><br>';
                echo $row->serialnum;
                if (!$row->status) echo '&nbsp;&nbsp;<a href="'.base_url().'index.php/bascet/new_list/'.$j.'"><img src="'.base_url().'images/basket.png"></a>';
                 echo '</td>';
                $i++;$j++;
            }
            $query->free_result();
        ?>
        </table>
        </div>
        <!-- content -->