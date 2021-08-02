<table class="table table-bordered table-striped table-hover" style="margin-top:50px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Service</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i=0;
                    foreach ($this->cart->contents() as $items) : 
                    $i++;
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $items['name'] ?></td>
                    <td><?= $items['qty'] ?></td>
                    <td align="right"><?= number_format($items['price'],0,',','.') ?></td>
                    <td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td align="right" colspan="4">Total </td>
                    <td align="right"><?= number_format($this->cart->total(),0,',','.'); ?></td>
                </tr>
            </tfoot>
        </table>
        <div align="center">
            <?= anchor('home/clear_cart','Hapus Pesanan',['class'=>'btn btn-danger']) ?>         
            <?= anchor('home/pembayaran','Check Out',['class'=>'btn btn-success']) ?>
            <?= anchor('home/shop','Back',['class'=>'btn btn-primary']) ?>
        </div>