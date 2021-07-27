<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="padding-top: 50px;">
        <table class="table table-bordered table-striped table-hover" style="margin-top:50px;">
            <thead>
                <tr>
                    <th class= "text-center">No</th>
                    <th class= "text-center">Nama Service</th>
                    <th class= "text-center">Jumlah</th>
                    <th class= "text-center">Harga</th>
                    <th class= "text-center">Nama Costumers</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i=0;
                    foreach ($this->cart->contents() as $items) : 
                    $i++;
                ?>
                <tr>
                    <td class= "text-center"><?= $i ?></td>
                    <td class= "text-center"><?= $items['name'] ?></td>
                    <td class= "text-center"><?= $items['qty'] ?></td>
                    <td class= "text-center" align="right"><?= number_format($items['price'],0,',','.') ?></td>
                    <td class= "text-center"><?= $users['name'] ?></td>
                    <?php endforeach; ?>
              
                </tr>
                
            </tbody>
        </table>
            <div class="btn btn-sm btn-succes">
                <?php
                $total = 0;
                if($bayar = $this->cart->contents()){
                    foreach ($bayar as $b ){
                        $total = $total + $b['subtotal'];
                    }
                    echo "<h4>Total Pembayaran Anda : Rp. ".number_format($total,0,',','.');
                }?> 
            </div><br><br>
            <a class="btn btn-danger" href="<?= base_url('home/pesan')?>" role="button">back</a>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>